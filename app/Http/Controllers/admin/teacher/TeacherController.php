<?php

namespace App\Http\Controllers\admin\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;

class TeacherController extends Controller
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
        $teachers = Teacher::all();
        return view('admin.teacher.teacher', compact('teachers'));
    }

    /**
     * Show the application Section.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addTeacher(Request $request)
    {
        $Messages = [
            'teacherName.required' => 'Teacher Name is required',
            'teacherDesignation.required' => 'Teacher Designation is required',
        ];

        $validatedData = $request->validate([
            'teacherName' => 'required',
            'teacherDesignation' => 'required',
            'teacherMobile' => 'nullable',
        ],$Messages);

        // $nameCode = "test";

        $expr = '/(?<=\s|^)[a-z]/i';
        preg_match_all($expr, request('teacherName'), $matches);
        $result = implode('', $matches[0]);
        $nameCode = strtoupper($result);

        $teacher = new Teacher;
        $teacher->teacher_name = request('teacherName');
        $teacher->name_code = $nameCode;
        $teacher->designation = request('teacherDesignation');
        $teacher->contact_number = request('teacherMobile');

        if ($teacher->save()) {
            return redirect()->route('teacher',session()->getId())->with('success', 'Teacher information has been added');
        }
    }

    /**
     * update teacher information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $Messages = [
            'teacherName.required' => 'Teacher Name is required',
            'teacherDesignation.required' => 'Teacher Designation is required',
        ];

        $validatedData = $request->validate([
            'teacherName' => 'required',
            'teacherDesignation' => 'required',
            'teacherMobile' => 'nullable',
        ],$Messages);

        $teacher=Teacher::find(request('teacherId'));
        $teacher->update([
            'teacher_name' => request('teacherName'),
            'designation' => request('teacherDesignation'),
            'contact_number' => request('teacherMobile'),
        ]);
        if ($teacher) {
            $teachers = Teacher::orderBy('entity_id', 'asc')->get();
            return redirect()->route('teacher',session()->getId())->with('success', 'Teacher information has been Updated');
        }
    }

    /**
     * Remove Teacher information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
        $teacher=Teacher::find(request('teacherId'));
        if ($teacher->delete()) {
            $teachers=Teacher::all();
            return view('admin.teacher.ajaxTeacherTable',compact('teachers'))->with('success','Item has been removed');
        }
    }
}
