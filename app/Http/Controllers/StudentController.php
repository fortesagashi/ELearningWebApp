<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{
    public function Index(){
        return view('student.student_login');
    }//end method

    public function Dashboard(){
        return view('student.index');
    }//end method

    public function Login(Request $request){
        $check = $request->all();
        if (Auth::guard('student')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('student.dashboard')->with('error', 'Jeni kyqur me sukses!');
        }else{
            return back()->with('error', 'Emaili ose fjalekalimi te pasakte!');
        }
    }//end method

    public function StudentLogout(){

        Auth::guard('student')->logout();
        return redirect()->route('login_form')->with('error', 'Jeni shkyqur me sukses!');


    }//end method

    public function StudentRegister(){
        return view('student.student_register');
    }//end method
}
