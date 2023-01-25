<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function Dashboard($id, $subjectID){
        $chapterData = DB::table('chapters')->where('id', $id)->first();
        $lastChapter = Chapter::join('books', 'chapters.book_id', '=', 'books.id')
        ->join('subjects', 'books.subject_id', '=', 'subjects.id')
        ->where('subjects.id', $subjectID)
        ->select('chapters.id as chapter_id')
        ->orderBy('chapters.id', 'desc')
        ->first();
        $lastChapterId = $lastChapter->chapter_id;
        $firstChapter = Chapter::join('books', 'chapters.book_id', '=', 'books.id')
        ->join('subjects', 'books.subject_id', '=', 'subjects.id')
        ->where('subjects.id', $subjectID)
        ->select('chapters.id as chapter_id')
        ->orderBy('chapters.id', 'asc')
        ->first();
        $firstChapterId = $firstChapter->chapter_id;
        $subjectName = DB::table('subjects')->where('id', $subjectID)->first();
        $name = $subjectName->subject_name;
        return view('student.chapter_content', compact('chapterData', 'lastChapterId', 'subjectID', 'name', 'firstChapterId'));

  }//end method

    public function updateChapter(Request $request, $id, $subjectID)
{
    $chapterData = DB::table('chapters')->where('id', $id)->first();
    if($request->has('next')){
        $chapterData = DB::table('chapters')->where('id', $id+1)->first();
    }elseif($request->has('previous')){
        $chapterData = DB::table('chapters')->where('id', $id-1)->first();
    }
    $lastChapter = Chapter::join('books', 'chapters.book_id', '=', 'books.id')
        ->join('subjects', 'books.subject_id', '=', 'subjects.id')
        ->where('subjects.id', $subjectID)
        ->select('chapters.id as chapter_id')
        ->orderBy('chapters.id', 'desc')
        ->first();
        $lastChapterId = $lastChapter->chapter_id;
        $firstChapter = Chapter::join('books', 'chapters.book_id', '=', 'books.id')
        ->join('subjects', 'books.subject_id', '=', 'subjects.id')
        ->where('subjects.id', $subjectID)
        ->select('chapters.id as chapter_id')
        ->orderBy('chapters.id', 'asc')
        ->first();
        $firstChapterId = $firstChapter->chapter_id;
        $subjectName = DB::table('subjects')->where('id', $subjectID)->first();
        $name = $subjectName->subject_name;
    // Update the chapter data
    return view('student.chapter_content', compact('chapterData', 'lastChapterId', 'subjectID', 'name', 'firstChapterId'));
}


}
