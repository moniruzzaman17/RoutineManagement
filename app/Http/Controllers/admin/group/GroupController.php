<?php

namespace App\Http\Controllers\admin\group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
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
     * Show the application group.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $groups = Group::orderBy('entity_id', 'asc')->get();
        return view('admin.group.group', compact('groups'));
    }

    /**
     * Show the application Group.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addGroup(Request $request)
    {
        $Messages = [
            'groupName.required' => 'Group Name is required',
        ];

        $validatedData = $request->validate([
            'groupName' => 'required',
        ],$Messages);

        $group = new Group;
        $group->group_name = request('groupName');

        if ($group->save()) {
            return redirect()->route('group',session()->getId())->with('success', 'Group has been Added');
        }
    }

    /**
     * update group information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $group=Group::find(request('groupId'));
        $group->update([
            'group_name' => request('groupName'),
        ]);
        if ($group) {
            $groups = Group::orderBy('entity_id', 'asc')->get();
            return redirect()->route('group',session()->getId())->with('success', 'Group has been Updated');
        }
    }

    /**
     * Remove group information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
        $group=Group::find(request('groupId'));
        if ($group->delete()) {
            $groups = Group::orderBy('entity_id', 'asc')->get();
            return view('admin.group.ajaxGroupTable',compact('groups'))->with('success','Item has been removed');
        }
    }
}
