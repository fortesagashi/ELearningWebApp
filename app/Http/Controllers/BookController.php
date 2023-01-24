<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function Dashboard(){
        return view('student.chapter_content');
    }//end method
}
