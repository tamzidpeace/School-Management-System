<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolClass;
use App\Teacher;
use App\AssignTeacherIntoSection;
use App\Subject;
use App\SubjectAssign;

class AdminAssignTeacher extends Controller
{
    //
    public function sectionAssign() {
        $classes = SchoolClass::all()->pluck('name', 'id');
        $teachers = Teacher::all()->pluck('name', 'id');
        return view('admin.teacher_assign.assign_in_section', compact('classes', 'teachers'));
    }

    public function sectionAssignSave(Request $request) {
        $assign = new AssignTeacherIntoSection;

        $assign->school_class_id = $request->class;
        $assign->section_id = $request->section;
        $assign->teacher_id = $request->teacher;

        $check = AssignTeacherIntoSection::where([['school_class_id', $assign->school_class_id],
        ['section_id', $assign->section_id],
        ['teacher_id', $assign->teacher_id]
        ])->first();

        if($check) {
            return back()->with('warning', 'Already assigned!');
        } else {
            $assign->save();
            return back()->with('success', 'Teacher assigned');
        }        
    }

    public function subjectAssign() {
        $subjects = Subject::all()->pluck('name', 'id');
        $teachers = Teacher::all()->pluck('name', 'id');
        return view('admin.teacher_assign.assign_in_subject', compact('subjects', 'teachers'));
    }

    public function subjectAssignSave(Request $request) {
        
        $subject_id = $request->subject;
        $teacher_id = $request->teacher;

        $assign = new SubjectAssign;

        $check = SubjectAssign::where([['subject_id', $subject_id],
        ['teacher_id', $teacher_id]])->first();

        if($check) {
            return back()->with('warning', 'Already assigned');
        } else {
            $assign->subject_id = $subject_id;
            $assign->teacher_id = $teacher_id;
    
            $assign->save();
            return back()->with('success', 'teacher assigned to the subject');
        }

    }
}
