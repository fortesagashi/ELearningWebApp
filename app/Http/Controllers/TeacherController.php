<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TeacherController extends Controller
{
    public function Index(){
        return view('teacher.teacher_login');
    }//end method

    public function Dashboard(){
        return view('teacher.index');
    }//end method

    public function Login(Request $request){
        $check = $request->all();
        if (Auth::guard('teacher')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('teacher.dashboard')->with('error', 'Jeni kyqur me sukses!');
        }else{
            return back()->with('error', 'Emaili ose fjalekalimi te pasakte!');
        }
    }//end method

    public function TeacherLogout(){

        Auth::guard('teacher')->logout();
        return redirect()->route('login_form')->with('error', 'Jeni shkyqur me sukses!');


    }//end method

    public function TeacherRegister(){
        return view('teacher.teacher_register');
    }//end method
}
