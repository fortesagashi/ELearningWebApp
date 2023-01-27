<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
Use Illuminate\Support\Facades\Hash;
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
            return redirect()->route('teacher.dashboard');
        }else{
            return back()->with('error', 'Emaili ose fjalekalimi te pasakte!');
        }
    }//end method

    public function TeacherLogout(){

        Auth::guard('teacher')->logout();
        return redirect()->route('teacher_login_form')->with('error', 'Jeni shkyqur me sukses!');


    }//end method
    public function Profile(){
        $id = Auth::guard('teacher')->user()->id;
        //The User Model we access our database
        $teacherData = Teacher::find($id);
        return view('teacher.teacher_profile_view', compact('teacherData'));

    } //end method

    public function EditProfile(){
        $id = Auth::guard('teacher')->user()->id;
        //The User Model we access our database
        $editData = Teacher::find($id);
        return view('teacher.teacher_profile_edit', compact('editData'));

    }//end method

    public function StoreProfile(Request $request){
        $id = Auth::guard('teacher')->user()->id;
        $data = Teacher::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('photo')) {
           $file = $request->file('photo');
           @unlink(public_path('upload/teacher_images/'.$data->photo));
           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/teacher_images'),$filename);
           $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'teacher Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.profile')->with($notification);
    }//end method
}

