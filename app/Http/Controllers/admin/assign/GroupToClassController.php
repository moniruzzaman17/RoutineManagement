<?php

namespace App\Http\Controllers\admin\assign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClassGroup;
use App\ClassInfo;
use App\Group;

class GroupToClassController extends Controller
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
        $classgroups = ClassGroup::with('class','group')->get();
        $groups = Group::all();
        $classes = ClassInfo::all();
        // dd($classgroups);
        return view('admin.assign.grouptoclass', compact('classgroups','groups','classes'));
    }
    /**
     * Show the dependent group.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dependentGroup()
    {
        // $classgroups = ClassGroup::with('class','group')->get();
        $groups = Group::all();
        $selectedClassId = request('selectedClassId');
        $groupExists = array();
        $classgroups = ClassGroup::with('class','group')->where('class_id',$selectedClassId)->get();
        foreach ($classgroups as $key => $classgroup) {
            $groupExists[] = $classgroup->group_id;
        }
        // dd($classgroups);
        // dd($classgroups);
        return view('admin.assign.dependentGroup', compact('groupExists','groups'));
    }

    /**
     * Show the application Group assigning.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function assignGroupToClass(Request $request)
    {
    	$Messages = [
    		'class_id.required' => 'Class Name is required',
            'group_id.required' => 'Group Name is required',
        ];

        $validatedData = $request->validate([
          'class_id' => 'required',
          'group_id' => 'required',
      ],$Messages);

        $classgroups = ClassGroup::with('class','group')->where('class_id',request('class_id'))->where('group_id',request('group_id'))->get();
        // dd($classgroups[0]->group->group_name);
        if (count($classgroups)>0) {
            return redirect()->route('assign.group.class',session()->getId())->with('failed', 'Group "'.$classgroups[0]->group->group_name.'" has already been assigned to class "'.$classgroups[0]->class->class_name.'"');
        }

        $classGroup = new ClassGroup;
        $classGroup->class_id = request('class_id');
        $classGroup->group_id = request('group_id');

        if ($classGroup->save()) {
          return redirect()->route('assign.group.class',session()->getId())->with('success', 'Group has been assigned');
      }
  }

    /**
     * update group information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $Messages = [
            'class_idUP.required' => 'Class Name is required',
            'group_idUP.required' => 'Group Name is required',
        ];

        $validatedData = $request->validate([
            'class_idUP' => 'required',
            'group_idUP' => 'required',
        ],$Messages);

        $classgroups = ClassGroup::with('class','group')->where('class_id',request('class_idUP'))->where('group_id',request('group_idUP'))->get();
        // dd($classgroups[0]->group->group_name);
        if (count($classgroups)>0) {
            return redirect()->route('assign.group.class',session()->getId())->with('failed', 'Group "'.$classgroups[0]->group->group_name.'" has already been assigned to class "'.$classgroups[0]->class->class_name.'"');
        }

        $classgroup=ClassGroup::find(request('classgroupId'));
        $classgroup->update([
            'class_id' => request('class_idUP'),
            'group_id' => request('group_idUP'),
        ]);

        if ($classGroup->save()) {
            return redirect()->route('assign.group.class',session()->getId())->with('success', 'Group has been assigned');
        }
    }

    /**
     * Remove group information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
    	$classgroup=ClassGroup::find(request('assigngrouptoclassId'));
    	if ($classgroup->delete()) {
    		$classgroups = ClassGroup::with('class','group')->get();
            $groups = Group::all();
            $classes = ClassInfo::all();
            return view('admin.assign.ajaxGrouptoclass',compact('classgroups','classes','groups'))->with('success','Item has been removed');
        }
    }
}
