<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
Use Illuminate\Support\Facades\Hash;
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
        return redirect()->route('admin_login_form')->with('error', 'Jeni shkyqur me sukses!');


    }//end method

    public function Profile(){
        $id = Auth::guard('admin')->user()->id;
        //The User Model we access our database
        $adminData = Admin::find($id);
        return view('admin.admin_profile_view', compact('adminData'));

    } //end method

    public function EditProfile(){
        $id = Auth::guard('admin')->user()->id;
        //The User Model we access our database
        $editData = Admin::find($id);
        return view('admin.admin_profile_edit', compact('editData'));

    }//end method

    public function StoreProfile(Request $request){
        $id = Auth::guard('admin')->user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('photo')) {
           $file = $request->file('photo');
           @unlink(public_path('upload/admin_images/'.$data->photo));
           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }//end method
}
