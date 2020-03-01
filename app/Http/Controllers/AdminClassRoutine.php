<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\SchoolClass;
use App\ClassRoutine;
use App\Section;
use App\Day;
use App\Period;
use DB;

class AdminClassRoutine extends Controller
{
    //
    public function subjects()
    {
        $subjects = Subject::all();
        $classes = SchoolClass::all();
        return view('admin.class_section.subject', compact('subjects', 'classes'));
    }

    public function addSubject(Request $request)
    {
        $subject = new Subject;

        $sub = $request->subject;
        $class_id = $request->class;

        $subject->subject = $sub;
        $subject->school_class_id = $class_id;

        $subject->save();
        
        return back()->with('success', 'Subject added');
    }

    public function classRoutines(Request $request)
    {
        $routines = ClassRoutine::all();

        $classes = SchoolClass::all()->pluck('name', 'id');
        //$sections = section::pluck('section_name', 'id')->all();

        //
        
        return view('admin.class_section.class_routine', compact('routines', 'classes'));
    }

    public function getSections($id) {
        $sections = Section::where('school_class_id', $id)->pluck('section_name', 'id');
        return json_encode($sections);
    }

    public function addRoutine(Request $request)
    {
        $routine = new ClassRoutine;

        $routine->section_id = $request->section;
        $routine->school_class_id = $request->class;

        
        //

    
        //$routine->save();
        //return back()->with('success', 'Class Added');
    }

    public function classRoutineDetails($id)
    {
        $days = Day::pluck('day', 'id')->all();
        $periods = Period::pluck('name', 'id')->all();
        $subjects = Subject::pluck('subject', 'subject')->all();
        $teachers = Subject::pluck('subject', 'subject')->all();

        
        return view(
            'admin.class_section.class_routine_details',
            compact('days', 'periods', 'subjects', 'teachers', 'id')
        );
    
    }

    public function addClassRoutineDetails(Request $request) {

        return $request;
    }
}
