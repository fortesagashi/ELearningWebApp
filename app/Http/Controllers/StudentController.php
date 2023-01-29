<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
Use Illuminate\Support\Facades\Hash;
use Auth;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;

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
            return redirect()->route('student.dashboard');
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



    public function AllStudents(){
        $student = Student::get();
        return view('admin.students.students_all',compact('student'));
    }//end method

    public function AddStudents(){
        return view('admin.students.students_add');
    } // End Method


    public function StoreStudents(Request $request){
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'student_id' => ['required', 'integer'],
            'personal_id' => ['required', 'integer', 'unique:students'],
            'date_of_birth' => 'required',
            'gender' => 'required',
            'parent_phone_number' => 'required',
            'study_year' => ['required', 'integer'],
            'class_identifier' => 'required',
            'username' => ['required', 'string', 'max:255', 'unique:students'],
            'email' => ['required', 'string', 'max:255', 'unique:students'],
            'photo' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ],[
            'name.required' => 'Shkruani emrin',
            'lastname.required' => 'Shkruani mbiemrin',
            'student_id.required' => 'Shkruani ID-në e nxënësit',
            'personal_id.required' => 'Shkruani ID-në personale',
            'date_of_birth.required' => 'Shkruani datëlindjen',
            'gender.required' => 'Shkruani gjininë',
            'parent_phone_number.required' => 'Shkruani numrin e telefonit',
            'study_year.required' => 'Shkruani klasën',
            'class_identifier.required' => 'Shkruani paralelen',
            'username.required' => 'Shkruani emrin e përdoruesit',
            'email.required' => 'Shkruani emailin',
            'password.required' => 'Shkruani fjalëkalimin',
        ]);

        $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(1020,519)->save('upload/student_images/'.$name_gen);
            $save_url = $name_gen;

            Student::insert([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'student_id' => $request->student_id,
                'personal_id' => $request->personal_id,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'parent_phone_number' => $request->parent_phone_number,
                'study_year' => $request->study_year,
                'class_identifier' => $request->class_identifier,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'email' => $request->email,
                'photo' => $save_url,
                'created_at' => Carbon::now(),

            ]);
            $notification = array(
            'message' => 'Nxënësi u shtua me sukses',
            'alert-type' => 'success'
        );

        return redirect()->route('all.students')->with($notification);
    }// End Method

    public function EditStudents($id){

        $student = Student::findOrFail($id);
        return view('admin.students.students_edit',compact('student'));
    }// End Method


   public function UpdateStudents(Request $request){

        $student_id = $request->id;

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(1020,519)->save('upload/student_images/'.$name_gen);
            $save_url = $name_gen;

            Student::findOrFail($student_id)->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'student_id' => $request->student_id,
                'personal_id' => $request->personal_id,
                'date_of_birth' => $request->date_of_birth,
                'parent_phone_number' => $request->parent_phone_number,
                'study_year' => $request->study_year,
                'class_identifier' => $request->class_identifier,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'email' => $request->email,
                'photo' => $save_url,
                'updated_at' => Carbon::now(),

            ]);
            $notification = array(
            'message' => 'Të dhënat e studentit u ndryshuan me sukses',
            'alert-type' => 'success'
        );

        return redirect()->route('all.students')->with($notification);

        } else{

            Student::findOrFail($student_id)->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'student_id' => $request->student_id,
                'personal_id' => $request->personal_id,
                'date_of_birth' => $request->date_of_birth,
                'parent_phone_number' => $request->parent_phone_number,
                'study_year' => $request->study_year,
                'class_identifier' => $request->class_identifier,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'email' => $request->email,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
            'message' => 'Të dhënat e studentit u ndryshuan me sukses',
            'alert-type' => 'success'
        );

       return redirect()->route('all.students')->with($notification);

        } // end Else

     } // End Method

     public function DeleteStudents($id){

        $student = Student::findOrFail($id);
        $img = 'upload/student_images/'.$student->photo;
        unlink($img);

        Student::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Nxënësi u fshi me sukses',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// End Method

}
