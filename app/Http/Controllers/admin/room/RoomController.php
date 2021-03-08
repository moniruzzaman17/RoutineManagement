<?php

namespace App\Http\Controllers\admin\room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClassRoom;

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application section.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = ClassRoom::orderBy('entity_id', 'asc')->get();
        return view('admin.room.room', compact('rooms'));
    }

    /**
     * Show the application ClassRoom.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addRoom(Request $request)
    {
        $Messages = [
            'roomNo.required' => 'ClassRoom Number is required',
            'roomNo.numeric' => 'ClassRoom Number must be a number',
            'roomNo.min' => 'ClassRoom Number cannot be less than or equal to 0',
            'roomFloor.required' => 'Floor is required',
            'roomBuilding.required' => 'Building Name is required',
        ];

        $validatedData = $request->validate([
            'roomNo' => 'required|numeric|min:1',
            'roomFloor' => 'required',
            'roomBuilding' => 'required',
            'roomRemarks' => 'nullable',
        ],$Messages);

        $room = new ClassRoom;
        $room->room_no = request('roomNo');
        $room->floor = request('roomFloor');
        $room->building = request('roomBuilding');
        $room->remarks = request('roomRemarks');

        if ($room->save()) {
            return redirect()->route('room',session()->getId())->with('success', 'ClassRoom has been Added');
        }
    }

    /**
     * update Class Room information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $room=ClassRoom::find(request('roomId'));
        $room->update([
            'room_no' => request('roomNo'),
            'floor' => request('roomFloor'),
            'building' => request('roomBuilding'),
            'remarks' => request('roomRemarks'),
        ]);
        if ($room) {
            $rooms = ClassRoom::orderBy('entity_id', 'asc')->get();
            return redirect()->route('room',session()->getId())->with('success', 'ClassRoom has been Updated');
        }
    }

    /**
     * Remove Class Room information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
        $room=ClassRoom::find(request('roomId'));
        if ($room->delete()) {
            $rooms = ClassRoom::orderBy('entity_id', 'asc')->get();
            return view('admin.room.ajaxRoomTable',compact('rooms'))->with('success','Item has been removed');
        }
    }
}
