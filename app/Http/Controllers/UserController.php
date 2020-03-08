<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accountant;
use App\Staff;
use App\User;

class UserController extends Controller
{
    //
    public function staffs() {
        $staffs = Staff::all();
        return view('users.staffs', compact('staffs'));
    }

    public function accountants() {
        $accountants = Accountant::all();
        return view('users.accountants', compact('accountants'));
    }

    public function addStaff() {
        
        return view('users.add_staff');
    }

    public function addAccountant() {
        
        return view('users.add_accountant');
    }

    public function addStaffSave(Request $get) {
        
        
        $user = new User;
        $ac = new Staff;

        $user->name = $get->name;
        $user->email = $get->email;
        $user->role_id = 4;

        if ($get->password == $get->con_pass) {
            $password = bcrypt($get->password);
        }

        $user->password = $password;
        $user->save();

        // image file processing
        $file = $get->file('image');
        $profile_picture = time() . '_' . $file->getClientOriginalName();
        $file->move('image/staff', $profile_picture);

        $user_info = User::where('email', $get->email)->first();

        $ac->user_id = $user_info->id;
        $ac->name = $get->name;
        $ac->email = $get->email;
        $ac->phone = $get->phone;
        $ac->address = $get->address;
        $ac->designation = $get->designation;
        $ac->profile_picture = $profile_picture;

        $ac->save();

        return back()->with('success', 'Accountant Added');
    }

    public function addAccountantSave(Request $get) {
        
        $user = new User;
        $ac = new Accountant;

        $user->name = $get->name;
        $user->email = $get->email;
        $user->role_id = 3;

        if ($get->password == $get->con_pass) {
            $password = bcrypt($get->password);
        }

        $user->password = $password;
        $user->save();

        // image file processing
        $file = $get->file('image');
        $profile_picture = time() . '_' . $file->getClientOriginalName();
        $file->move('image/accountant', $profile_picture);

        $user_info = User::where('email', $get->email)->first();

        $ac->user_id = $user_info->id;
        $ac->name = $get->name;
        $ac->email = $get->email;
        $ac->phone = $get->phone;
        $ac->address = $get->address;
        $ac->designation = $get->designation;
        $ac->profile_picture = $profile_picture;

        $ac->save();

        return back()->with('success', 'Accountant Added');
 
    }
}
