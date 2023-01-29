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
        return view('admin.admin_index');
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

    public function ChangePassword(){
        return view('admin.admin_change_password');
    }//end method

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword'
        ]);

        $hashedPassword = Auth::guard('admin')->user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $id = Auth::guard('admin')->user()->id;
            $users = Admin::find($id);
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message', 'Fjalëkalimi u ndryshua me sukses');
            return redirect()->back();
        } else {
            session()->flash('message', 'Fjalëkalimi i vjetër nuk është i saktë');
            return redirect()->back();
        }
    }//end method
}
