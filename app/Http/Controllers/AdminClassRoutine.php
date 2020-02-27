<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\SchoolClass;

class AdminClassRoutine extends Controller
{
    //
    public function subjects() {
        $subjects = Subject::all();
        $classes = SchoolClass::all();
        return view('admin.class_section.subject', compact('subjects', 'classes'));
    }

    public function addSubject(Request $request) {
        
        $subject = new Subject;

        $sub = $request->subject;
        $class_id = $request->class;

        $subject->subject = $sub;
        $subject->school_class_id = $class_id;

        $subject->save();
        
        return back()->with('success', 'Subject added');
    }
}
