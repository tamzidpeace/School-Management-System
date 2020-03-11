<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;

class SessionController extends Controller
{
    //
    public function index()
    {
        $sessions = Session::all();
        return view('admin.session.sessions', compact('sessions'));
    }

    public function store(Request $request)
    {
        $session = new Session;

        $session->name = $request->name;
        $session->year = $request->year;

        $session->save();

        return back()->with('success', 'New Session Added');
    }

    public function changeStatus($id)
    {
        $session = Session::find($id);

        if ($session->status == 1) {
            $session->status = 0;
            $session->save();
            return back()->with('success', 'Session Deactivated');
        } else {
            $session->status = 1;
            $session->save();
            return back()->with('info', 'Session Activated');
        }
    }

    public function updateSessionView($id) {
        $session = Session::find($id);

        return view('admin.session.session_update', compact('session'));        
    }

    public function updateSession(Request $request) {
        $session = Session::find($request->id);

        $session->name = $request->name;
        $session->year = $request->year;

        $session->save();

        return back()->with('success', 'Session Info Updated');        
    }
}
