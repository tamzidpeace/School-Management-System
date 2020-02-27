<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Teacher;
use App\SchoolClass;
use App\Section;
use App\Student;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Syllabus;
use App\Syllabuss;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function teacherRegistration()
    {
        Auth::logout();
        return redirect('/register');
    }

    public function allTeachers()
    {
        $teachers = User::where('role_id', 2)->get();
        return view('admin.teacher.all_teachers', compact('teachers'));
    }

    public function addNewTeacher()
    {
        return view('admin.teacher.add_new_teacher');
    }

    public function saveTeacher(Request $request)
    {
        $user = new User;
        $teacher = new Teacher;

        $name = $request->name;
        $email = $request->email;

        if ($request->password == $request->con_pass) {
            $password = bcrypt($request->password);
        }

        // user table info part
        $user->name = $name;
        $user->role_id = 2;
        $user->email = $email;
        $user->password = $password;

        $user->save();

        //teacher table info part
        $user_info = User::where('email', $email)->first();

        // image file processing
        $file = $request->file('image');
        $profile_picture = time() . '_' . $file->getClientOriginalName();
        $file->move('image/teacher', $profile_picture);

        $teacher->user_id = $user_info->id;
        $teacher->name = $name;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->phone = $request->phone;
        $teacher->designation = $request->designation;
        $teacher->pro_pic = $profile_picture;

        $teacher->save();

        return redirect()->back()->with('success', 'Teacher information added');
    }

    public function class()
    {
        $classes = SchoolClass::all();

        return view('admin.class_section.class', compact('classes'));
    }

    public function saveClass(Request $request)
    {
        $class = new SchoolClass;
        $class->name = $request->name;
        $class->save();
        return redirect()->back()->with('success', 'Class added');
    }

    public function section()
    {
        $sections = Section::all();
        $classes = SchoolClass::pluck('name', 'id')->all();
        return view('admin.class_section.section', compact('sections', 'classes'));
    }

    public function saveSection(Request $request)
    {
        $section = new Section;
        $section->section_name = strtoupper($request->name);
        
        $section->school_class_id = $request->class;

        

        $check = Section::where([['section_name', $request->name],
         ['school_class_id', $request->class]])->first();

        

        if ($check) {
            return back()->with('warning', 'This section has already added!');
        } else {
            $section->save();
            return redirect()->back()->with('success', 'Section added');
        }
    }

    public function selectClass()
    {
        $classes = SchoolClass::all();

        return view('admin.student.select_class', compact('classes'));
    }

    public function addNewStudent($id)
    {
        $sections = Section::where('school_class_id', $id)->pluck('section_name', 'id')->all();

        $class = SchoolClass::find($id);
        
        return view('admin.student.add_new_student', compact('id', 'sections', 'class'));
    }

    public function addNewStudentSave(Request $req)
    {
        $student = new Student;

        // image processing
        $file = $req->file('image');
        $profile_picture = time() . '_' . $file->getClientOriginalName();
        $file->move('image/student', $profile_picture);

        $student->school_class_id = $req->class_id;
        $student->section_id = $req->section;
        $student->name = $req->name;
        $student->roll = $req->roll;
        $student->email = $req->email;
        $student->phone = $req->phone;
        $student->address = $req->address;
        $student->image = $profile_picture;

        $student->save();

        return redirect()->back()->with('success', 'Student information added');
    }

    public function studentInfo()
    {
        $students = Student::all();
        return view('admin.student.student_info', compact('students'));
    }

    // excel import & download
    public function excelImport()
    {
        return view('admin.student.excel_import');
    }

    public function excelImportSave(Request $request)
    {
        Excel::import(new StudentsImport, request()->file('excel'));

        return redirect()->back()->with('success', 'Import Complete.');
    }

    public function excelDownload()
    {
        return response()
        ->download(public_path('excel/student_data.xlsx'));
    }

    // end of excel import & download

    // syllabus
    public function syllabus()
    {
        $classes = SchoolClass::all();
        $syllabuses = Syllabuss::all();
        
        return view('admin.class_section.syllabus', compact('classes', 'syllabuses'));
    }

    public function syllabusSave(Request $request)
    {
        $syllabus = new Syllabuss;
        
        $syllabus->school_class_id = $request->class;
        $syllabus->year = $request->year;

        // file processing
        $file = $request->file('syllabus');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('syllabus/', $file_name);

        $syllabus->syllabus = $file_name;

        $syllabus->save();

        return back()->with('success', 'Syllabus Upload');
    }

    public function downloadSyllabus($id)
    {
        $syllabus = Syllabuss::find($id);
        
        return response()
         ->download(public_path('syllabus/' . $syllabus->syllabus));
    }

    // end of syllabus
}
