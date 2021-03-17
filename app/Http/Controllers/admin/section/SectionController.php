<?php

namespace App\Http\Controllers\admin\section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\ClassInfo;

class SectionController extends Controller
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
        $sections = Section::with('class')->orderBy('entity_id', 'asc')->get();
        $sectionsDistinct = Section::with('class')->orderBy('class_id', 'asc')->distinct()->get(['class_id']);
        $classes = ClassInfo::with('sections')->orderBy('entity_id', 'asc')->get();
        return view('admin.section.section', compact('sections','sectionsDistinct','classes'));
    }

    /**
     * Show the application Section.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addSection(Request $request)
    {
        $Messages = [
            'sectionName.required' => 'Section Name is required',
            'sectionName.regex' => 'Section Name may not be grater than 1 character',
            'sectionName.max' => 'Section must be capital letter',
            'class.required' => 'Class Selection is required',
        ];

        $validatedData = $request->validate([
            'sectionName' => 'required||regex:/^[A-Z]+$/|max:1',
            'class' => 'required',
        ],$Messages);

        $sectionAssigned = Section::with('class')->where('class_id', request('class'))->where('section_name',request('sectionName'))->get();
        if(count($sectionAssigned) > 0)
        {
            // dd($sectionAssigned);
            return redirect()->route('section',session()->getId())->with('error', 'Section "'.request('sectionName').'" already assigned to class "'.$sectionAssigned[0]->class->class_name.'"');
        }
        $section = new Section;
        $section->section_name = request('sectionName');
        $section->class_id = request('class');

        if ($section->save()) {
            return redirect()->route('section',session()->getId())->with('success', 'Section has been assigned to class');
        }
    }

    /**
     * update section information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $section=Section::find(request('sectionId'));
        $section->update([
            'section_name' => request('sectionName'),
        ]);
        if ($section) {
            $sections = Section::orderBy('entity_id', 'asc')->get();
            return redirect()->route('section',session()->getId())->with('success', 'Section has been Updated');
        }
    }

    /**
     * Remove section information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
        $section=Section::find(request('sectionId'));
        if ($section->delete()) {
            $sections = Section::orderBy('entity_id', 'asc')->get();
            return view('admin.section.ajaxSectionTable',compact('sections'))->with('success','Item has been removed');
        }
    }

    /**
     * Class wise section information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function classWiseSection(Request $request)
    {
        if (request('classId') == 0) {
            $sections=Section::with('class')->get();
        }
        else{
            $sections=Section::with('class')->where('class_id', request('classId'))->get();
        }
        return view('admin.section.ajaxSectionTable',compact('sections'));
    }
}
