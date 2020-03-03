<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\SchoolClass;
use App\ClassRoutine;
use App\Section;
use App\Day;
use App\Period;
use App\Teacher;
use App\PeriodsDetail;
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

    public function periodDetails($id)
    {
        $periods = Period::where('class_routine_id', $id)->pluck('name', 'id');
        $days = Day::pluck('day', 'id')->all();
        $teachers = Teacher::pluck('name', 'id')->all();
        $subjects = Subject::pluck('subject', 'id')->all();

        $routine = ClassRoutine::find($id);
        $max_period = $routine->max_period;

        $pd = PeriodsDetail::where('day_id', 1)->orderBy('period_id')->get();
        //return $pd;
        
        // for ($i=1; $i <= $max_period; $i++) { 
        //     $pd[$i] = PeriodsDetail::where('period_id', $i)->get();
        // }

        // for ($i=1; $i <= $max_period; $i++) { 
        //    foreach ($pd[$i] as $key => $value) {
        //        echo $value;
        //    }
        // }


        // return $pd;        

        return view(
            'admin.class_section.period_details',
            \compact('id', 'periods', 'teachers', 'subjects', 'days', 'max_period', 'pd')
        );
    }
    
    public function savePeriodDetails(Request $request)
    {
        $pd = new PeriodsDetail;

        //return $request;

        $period_id = $request->period;
        $day_id = $request->day;
        $subject_id = $request->subject;
        $teacher_id = $request->teacher;

        $details = PeriodsDetail::where(
            [ ['period_id', $period_id], ['day_id', $day_id], ]
        )->first();

        if ($details) {
            $details->period_id = $period_id;
            $details->day_id = $day_id;
            $details->subject_id = $subject_id;
            $details->teacher_id = $teacher_id;

            $details->save();

            return back()->with('success', 'period info updated');
        } else {
            $pd->period_id = $period_id;
            $pd->day_id = $day_id;
            $pd->subject_id = $subject_id;
            $pd->teacher_id = $teacher_id;

            $pd->save();

            return back()->with('success', 'new period info added');
        }
    }
}
