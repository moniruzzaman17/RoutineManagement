<?php

namespace App\Http\Controllers\admin\section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;

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
        $sections = Section::orderBy('entity_id', 'asc')->get();
        return view('admin.section.section', compact('sections'));
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
        ];

        $validatedData = $request->validate([
            'sectionName' => 'required',
        ],$Messages);

        $section = new Section;
        $section->section_name = request('sectionName');

        if ($section->save()) {
            return redirect()->route('section',session()->getId())->with('success', 'Section has been Added');
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
}
