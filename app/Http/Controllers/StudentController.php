<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
Use Illuminate\Support\Facades\Hash;
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
        return redirect()->route('student_login_form')->with('error', 'Jeni shkyqur me sukses!');


    }//end method
    public function Profile(){
        $id = Auth::guard('student')->user()->id;
        //The User Model we access our database
        $studentData = Student::find($id);
        return view('student.student_profile_view', compact('studentData'));

    } //end method

    public function EditProfile(){
        $id = Auth::guard('student')->user()->id;
        //The User Model we access our database
        $editData = Student::find($id);
        return view('student.student_profile_edit', compact('editData'));

    }//end method

    public function StoreProfile(Request $request){
        $id = Auth::guard('student')->user()->id;
        $data = Student::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('photo')) {
           $file = $request->file('photo');
           @unlink(public_path('upload/student_images/'.$data->photo));
           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/student_images'),$filename);
           $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profili u ndryshua me sukses!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.profile')->with($notification);
    }//end method

}
