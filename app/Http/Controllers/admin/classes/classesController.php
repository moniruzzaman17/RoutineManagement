<?php

namespace App\Http\Controllers\admin\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClassInfo;

class classesController extends Controller
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
     * Show the application Class.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $classes = ClassInfo::orderBy('entity_id', 'asc')->get();
        return view('admin.classes.classes', compact('classes'));
    }

    /**
     * Show the application Class.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addClass(Request $request)
    {
        $Messages = [
            'className.required' => 'Class Name is required',
        ];

        $validatedData = $request->validate([
            'className' => 'required',
        ],$Messages);

        $class = new ClassInfo;
        $class->class_name = request('className');

        if ($class->save()) {
            return redirect()->route('class',session()->getId())->with('success', 'Class has been Added');
        }
    }

    /**
     * update class information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $class=ClassInfo::find(request('classId'));
        $class->update([
            'class_name' => request('className'),
        ]);
        if ($class) {
            $classes = ClassInfo::orderBy('entity_id', 'asc')->get();
            return redirect()->route('class',session()->getId())->with('success', 'Class has been Updated');
        }
    }

    /**
     * Remove class information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
        $class=ClassInfo::find(request('classId'));
        if ($class->delete()) {
            $classes = ClassInfo::orderBy('entity_id', 'asc')->get();
            return view('admin.classes.ajaxClassTable',compact('classes'))->with('success','Item has been removed');
        }
    }
}
