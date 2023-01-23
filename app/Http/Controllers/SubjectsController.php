<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function Index(){
        return view('student.index');
    }//end method

}
