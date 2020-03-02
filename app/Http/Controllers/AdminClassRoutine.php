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

    public function getSections($id)
    {
        $sections = Section::where('school_class_id', $id)->pluck('section_name', 'id');
        return json_encode($sections);
    }

    public function addRoutine(Request $request)
    {
        $routine = new ClassRoutine;

        $routine->section_id = $request->section;
        $routine->school_class_id = $request->class;
        $routine->max_period = $request->max_period;

        $routine->save();
        return back()->with('success', 'Routine Added');
    }

    public function periods($id)
    {
        $routine = ClassRoutine::find($id);
        $class = $routine->schoolClass->name;
        $section = $routine->section->section_name;
        $periods = Period::orderBy('order', 'asc')->get();

        return view(
            'admin.class_section.periods',
            compact('id', 'class', 'section', 'routine', 'periods')
        );
    }

    public function savePeriodInfo(Request $request, $id)
    {
        $period = new Period;

        $check_order = Period::where('order', $request->order)->first();

        if ($check_order) {
            return back()->with('warning', 'Period order already exist!');
        } elseif ($request->order > $request->max_period) {
            return back()->with('warning', 'Period Limit exceeds!');
        } else {
            $period->order = $request->order;
            $period->class_routine_id = $id;
            $period->name = $request->name;
            $period->time = $request->time;

            $period->save();
            return back()->with('success', 'Period Added');
        }
    }
}
