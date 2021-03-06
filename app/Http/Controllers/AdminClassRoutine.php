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

    public function updateRoutine($id)
    {
        $routine = ClassRoutine::find($id);
        return view('admin.class_section.update_routine', compact('routine'));
    }

    public function updateRoutineSave(Request $request, $id)
    {
        $routine = ClassRoutine::find($id);
        $routine->max_period = $request->max_period;
        $routine->save();

        return \redirect('/admin/class/section/class-routine')
        ->with('success', 'Routine Updated');
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

    public function updatePeriod($id)
    {
        $period = Period::where('id', $id)->first();

        return view('admin.class_section.update_period', compact('period'));
    }

    public function updatePeriodSave(Request $request, $id)
    {
        $period = Period::find($id);
        $period->order = $request->order;
        $period->name = $request->name;
        $period->time = $request->time;

        $period->save();
        return \redirect('/admin/class/section/class-routine/periods/'
        .$period->class_routine_id)->with('success', 'period info updated!');
    }

    public function periodDetails($id)
    {
        $periods = Period::where('class_routine_id', $id)->pluck('name', 'id');
        $days = Day::pluck('day', 'id')->all();
        $teachers = Teacher::pluck('name', 'id')->all();
        $subjects = Subject::pluck('subject', 'id')->all();

        $routine = ClassRoutine::find($id);
        $max_period = $routine->max_period;

        $pd = PeriodsDetail::select(['id', 'period_id', 'day_id', 'subject_id', 'teacher_id'])
        ->where('day_id', 1)->orderBy('period_id')->get();
        $pd2 = PeriodsDetail::select(['id', 'period_id', 'day_id', 'subject_id', 'teacher_id'])
        ->where('day_id', 2)->orderBy('period_id')->get();
        //day 1
        for ($i=1; $i<=$max_period; $i++) {
            $data[$i] = ['id'=> 0, 'period_id' => $i, 'day_id'=> 1,
            'subject_id'=> 0, 'teacher_id' => 0];
        }

        //day 2
        for ($i=1; $i<=$max_period; $i++) {
            $data2[$i] = ['id'=> 0, 'period_id' => $i, 'day_id'=> 2,
            'subject_id'=> 0, 'teacher_id' => 0];
        }

        $i = 1;
        $ar;
        foreach ($pd as $p) {
            $ar[$i++] = $p;
        }
        $count = count($ar);

        //
        $i = 1;
        $ar2;
        foreach ($pd2 as $p) {
            $ar2[$i++] = $p;
        }
        $count2 = count($ar2);
       
        for ($i=1; $i<=$count; $i++) {            
            $data[$ar[$i]->period_id] = 
            ['id'=> $ar[$i]->id, 'period_id' => $i,
            'day_id'=> 1, 'subject_id'=> $ar[$i]->subject_id,
            'teacher_id' => $ar[$i]->teacher_id];                                   
        }

        for ($i=1; $i<=$count2; $i++) {            
            $data2[$ar2[$i]->period_id] = 
            ['id'=> $ar2[$i]->id, 'period_id' => $i,
            'day_id'=> 1, 'subject_id'=> $ar2[$i]->subject_id,
            'teacher_id' => $ar2[$i]->teacher_id];                                   
        }

        return view(
            'admin.class_section.period_details',
            \compact('id', 'periods', 'teachers', 'subjects', 'days', 'max_period',
             'pd', 'data', 'data2')
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
