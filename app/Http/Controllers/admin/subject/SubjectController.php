<?php

namespace App\Http\Controllers\admin\subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subject;
use App\Group;

class SubjectController extends Controller
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
     * Show the application subject.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subjects = Subject::with('group')->orderBy('entity_id', 'asc')->get();
        $groups = Group::all();
        return view('admin.subject.subject', compact('subjects','groups'));
    }

    /**
     * Show the application Subject.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addSubject(Request $request)
    {
        $Messages = [
            'subjectName.required' => 'Subject Name is required',
        ];

        $validatedData = $request->validate([
            'subjectCode' => 'nullable',
            'subjectName' => 'required',
            'subjectDesc' => 'nullable',
            'group' => 'required',
        ],$Messages);

        $subject = new Subject;
        $subject->group_id = request('group');
        $subject->subject_code = request('subjectCode');
        $subject->subject_name = request('subjectName');
        $subject->subject_description = request('subjectDesc');

        if ($subject->save()) {
            return redirect()->route('subject',session()->getId())->with('success', 'Subject has been Added');
        }
    }

    /**
     * update subject information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $subject=Subject::find(request('subjectId'));
        $subject->update([
            'subject_code' => request('subjectCode'),
            'subject_name' => request('subjectName'),
            'group_id' => request('groupU'),
            'subject_description' => request('subjectDesc'),
        ]);
        if ($subject) {
            $subjects = Subject::orderBy('entity_id', 'asc')->get();
            return redirect()->route('subject',session()->getId())->with('success', 'Subject has been Updated');
        }
    }

    /**
     * Remove subject information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
        $subject=Subject::find(request('subjectId'));
        if ($subject->delete()) {
            $subjects = Subject::orderBy('entity_id', 'asc')->get();
            return view('admin.subject.ajaxSubjectTable',compact('subjects'))->with('success','Item has been removed');
        }
    }
}
