<?php

namespace App\Http\Controllers\admin\shift;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shift;

class ShiftController extends Controller
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
     * Show the application shift.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shifts = Shift::orderBy('entity_id', 'asc')->get();
        return view('admin.shift.shift', compact('shifts'));
    }

    /**
     * Insert shift information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addShift(Request $request)
    {
        $Messages = [
            'shiftName.required' => 'Shift Name is required',
        ];

        $validatedData = $request->validate([
            'shiftName' => 'required',
        ],$Messages);

        $shift = new Shift;
        $shift->shift_name = request('shiftName');

        if ($shift->save()) {
            return redirect()->route('shift',session()->getId())->with('success', 'Shift has been Added');
        }
    }

    /**
     * update shift information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $shift=Shift::find(request('shiftId'));
        $shift->update([
            'shift_name' => request('shiftName'),
        ]);
        if ($shift) {
            $shifts = Shift::orderBy('entity_id', 'asc')->get();
            return redirect()->route('shift',session()->getId())->with('success', 'Shift has been Updated');
        }
    }

    /**
     * Remove shift information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
        $shift=Shift::find(request('shiftId'));
        if ($shift->delete()) {
            $shifts = Shift::orderBy('entity_id', 'asc')->get();
            return view('admin.shift.ajaxtable',compact('shifts'))->with('success','Item has been removed');
        }
    }
}
