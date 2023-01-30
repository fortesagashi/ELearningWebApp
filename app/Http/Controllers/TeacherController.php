<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subjects;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Hash;
use Auth;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;

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

    public function AllTeachers(){
        $teachers = Teacher::orderBy('id','ASC')->get();
        return view('admin.teachers.teachers_all',compact('teachers'));
    }//end method

    public function AddTeachers(){
        return view('admin.teachers.teachers_add');
    } // End Method


    public function StoreTeachers(Request $request){
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'personal_id' => ['required', 'integer', 'unique:teachers'],
            'date_of_birth' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'username' => ['required', 'string', 'max:255', 'unique:teachers'],
            'email' => ['required', 'string', 'max:255', 'unique:teachers'],
            'photo' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ],[
            'name.required' => 'Shkruani emrin',
            'lastname.required' => 'Shkruani mbiemrin',
            'personal_id.required' => 'Shkruani ID-në personale',
            'date_of_birth.required' => 'Shkruani datëlindjen',
            'gender.required' => 'Shkruani gjininë',
            'phone_number.required' => 'Shkruani numrin e telefonit',
            'username.required' => 'Shkruani emrin e përdoruesit',
            'email.required' => 'Shkruani emailin',
            'password.required' => 'Shkruani fjalëkalimin',
        ]);

        $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(1020,519)->save('upload/teacher_images/'.$name_gen);
            $save_url = $name_gen;

            Teacher::insert([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'personal_id' => $request->personal_id,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'email' => $request->email,
                'photo' => $save_url,
                'created_at' => Carbon::now(),

            ]);
            $notification = array(
            'message' => 'Mësimdhënësi u shtua me sukses',
            'alert-type' => 'success'
        );

        return redirect()->route('all.teachers')->with($notification);
    }// End Method

    public function EditTeachers($id){

        $teacher = Teacher::findOrFail($id);
        return view('admin.teachers.teachers_edit',compact('teacher'));
    }// End Method


   public function UpdateTeachers(Request $request){

        $teacher_id = $request->id;
        if ($request->file('photo')) {
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(1020,519)->save('upload/teacher_images/'.$name_gen);
            $save_url = $name_gen;

            Teacher::where('id', $teacher_id)->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'personal_id' => $request->personal_id,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'email' => $request->email,
                'photo' => $save_url,
                'created_at' => Carbon::now(),

            ]);
            $notification = array(
            'message' => 'Të dhënat e mësimdhënësit u ndryshuan me sukses',
            'alert-type' => 'success'
        );

        return redirect()->route('all.teachers')->with($notification);

        } else{

            Teacher::where('id', $teacher_id)->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'personal_id' => $request->personal_id,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'email' => $request->email,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
            'message' => 'Të dhënat e mësimdhënësit u ndryshuan me sukses',
            'alert-type' => 'success'
        );

       return redirect()->route('all.teachers')->with($notification);

        } // end Else

     } // End Method

     public function DeleteTeachers($id){

        $teacher = Teacher::findOrFail($id);
        $img = 'upload/teacher_images/'.$teacher->photo;
        unlink($img);

        Teacher::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Mësimdhënësi u fshi me sukses',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// End Method

     //Teachers_Subjects data
     public function AllTeachersSubjects($id) {
        $teacher = Teacher::find($id);
        $subjects = Subjects::join('teachers_subjects', 'subjects.id', '=', 'teachers_subjects.subject_id')
                  ->join('teachers', 'teachers_subjects.teacher_id', '=', 'teachers.id')
                  ->where('teachers.id', $id)
                  ->orderBy('subjects.study_year','ASC')->get();


        return view('admin.teachers_subjects.teachers_subjects_all',compact('subjects', 'teacher'));
    }
    public function AddTeachersSubjects($id){
        $teacher_id = $id;
        $subjects = Subjects::orderBy('subject_name','ASC')->get();
        return view('admin.teachers_subjects.teachers_subjects_add',compact('subjects', 'teacher_id'));
    } // End Method

    public function StoreTeachersSubjects(Request $request, $id){
        $request->validate([
            'subject_id' => 'required',

        ],[

            'subject_id.required' => 'Zgjidhni emrin e librit',
        ]);


            DB::table('teachers_subjects')->insert([
                'subject_id' => $request->subject_id,
                'teacher_id' => $id,
                'created_at' => Carbon::now(),

            ]);
            $notification = array(
            'message' => 'Lënda u shtua me sukses',
            'alert-type' => 'success'
        );

        return redirect()->route('all.teachers_subjects', $id)->with($notification);
    }// End Method


    public function EditTeachersSubjects($subject_id, $teacher_id){
        $teacher_id = $id;
        $subjects = Subjects::orderBy('subject_name','ASC')::orderBy('subject_name','ASC')->get();
        return view('admin.teachers_subjects.teachers_subjects_edit',compact('subjects', 'teacher_id'));
    }// End Method


    public function UpdateBooks(Request $request){

        $book_id = $request->id;

            Book::findOrFail($book_id)->update([
                'book_name' => $request->book_name,
                'subject_id' => $request->subject_id,
                'updated_at' => Carbon::now(),


            ]);
            $notification = array(
            'message' => 'Libri u ndryshua me sukses',
            'alert-type' => 'success'
        );

       return redirect()->route('all.books')->with($notification);


     } // End Method

     public function DeleteBooks($id){

        $books = Book::findOrFail($id);

        Book::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Libri u fshi me sukses',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// End Method
    }


