<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use Illuminate\Support\Carbon;

class SubjectsController extends Controller
{
    public function Index(){
        return view('student.index');
    }//end method

    public function AllSubjects(){
        $subjects = Subjects::get();
        return view('admin.subjects.subjects_all',compact('subjects'));
    }//end method

    public function AddSubjects(){
        return view('admin.subjects.subjects_add');
    } // End Method


    public function StoreSubjects(Request $request){
        $request->validate([
            'subject_name' => 'required',
            'study_year' => 'required',

        ],[

            'subject_name.required' => 'Shkruani emrin e lëndës',
            'study_year.required' => 'Shkruani vitin e lëndës',
        ]);


            Subjects::insert([
                'subject_name' => $request->subject_name,
                'study_year' => $request->study_year,
                'created_at' => Carbon::now(),

            ]);
            $notification = array(
            'message' => 'Lënda u shtua me sukses',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subjects')->with($notification);
    }// End Method

    public function EditSubjects($id){

        $subjects = Subjects::findOrFail($id);
        return view('admin.subjects.subjects_edit',compact('subjects'));
    }// End Method


   public function UpdateSubjects(Request $request){

        $subjects_id = $request->id;

            Subjects::findOrFail($subjects_id)->update([
                'subject_name' => $request->subject_name,
                'study_year' => $request->study_year,


            ]);
            $notification = array(
            'message' => 'Lënda u ndryshua me sukses',
            'alert-type' => 'success'
        );

       return redirect()->route('all.subjects')->with($notification);


     } // End Method

     public function DeleteSubjects($id){

        $subjects = Subjects::findOrFail($id);

        Subjects::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Lënda u fshi me sukses',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// End Method
}
