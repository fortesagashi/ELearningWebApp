<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }//end method

    public function Dashboard(){
        return view('admin.index');
    }//end method

    public function Login(Request $request){
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('error', 'Jeni kyqur me sukses!');
        }else{
            return back()->with('error', 'Emaili ose fjalekalimi te pasakte!');
        }
    }//end method

    public function AdminLogout(){

        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error', 'Jeni shkyqur me sukses!');


    }//end method

    public function AdminRegister(){
        return view('admin.admin_register');
    }//end method
}
