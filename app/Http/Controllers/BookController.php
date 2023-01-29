<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;
use App\Models\Subjects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;

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
public function TeacherDashboard($id, $subjectID){
    $chapterData = DB::table('chapters')->where('id', $id)->first();
    $lastChapter = Chapter::join('books', 'chapters.book_id', '=', 'books.id')
    ->join('subjects', 'books.subject_id', '=', 'subjects.id')
    ->where('subjects.id', $subjectID)
    ->select('chapters.chapter_number as chapter_id')
    ->orderBy('chapters.chapter_number', 'desc')
    ->first();
    $lastChapterId = $lastChapter->chapter_id;
    $firstChapter = Chapter::join('books', 'chapters.book_id', '=', 'books.id')
    ->join('subjects', 'books.subject_id', '=', 'subjects.id')
    ->where('subjects.id', $subjectID)
    ->select('chapters.chapter_number as chapter_id')
    ->orderBy('chapters.chapter_number', 'asc')
    ->first();
    $firstChapterId = $firstChapter->chapter_id;
    $subjectName = DB::table('subjects')->where('id', $subjectID)->first();
    $name = $subjectName->subject_name;
    return view('teacher.chapter_content', compact('chapterData', 'lastChapterId', 'subjectID', 'name', 'firstChapterId'));

}//end method

public function TeacherUpdateChapter(Request $request, $id, $subjectID)
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
    ->select('chapters.chapter_number as chapter_id')
    ->orderBy('chapters.chapter_number', 'desc')
    ->first();
    $lastChapterId = $lastChapter->chapter_id;
    $firstChapter = Chapter::join('books', 'chapters.book_id', '=', 'books.id')
    ->join('subjects', 'books.subject_id', '=', 'subjects.id')
    ->where('subjects.id', $subjectID)
    ->select('chapters.chapter_number as chapter_id')
    ->orderBy('chapters.chapter_number', 'asc')
    ->first();
    $firstChapterId = $firstChapter->chapter_id;
    $subjectName = DB::table('subjects')->where('id', $subjectID)->first();
    $name = $subjectName->subject_name;
// Update the chapter data
return view('teacher.chapter_content', compact('chapterData', 'lastChapterId', 'subjectID', 'name', 'firstChapterId'));
}

//Admin panel books
public function AllBooks(){
    $books = Book::join('subjects', 'books.subject_id', '=', 'subjects.id')
                ->get(['books.*', 'subjects.subject_name', 'subjects.study_year']);
    return view('admin.books.books_all',compact('books'));
}//end method

public function AddBooks(){
    $subjects = Subjects::orderBy('id','ASC')->get();
    return view('admin.books.books_add',compact('subjects'));
} // End Method


public function StoreBooks(Request $request){
    $request->validate([
        'book_name' => 'required',
        'subject_id' => 'required',

    ],[

        'book_name.required' => 'Zgjidhni emrin e librit',
        'subject_id.required' => 'Zgjidhni emrin e lëndës',
    ]);


        Book::insert([
            'book_name' => $request->book_name,
            'subject_id' => $request->subject_id,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
        'message' => 'Libri u shtua me sukses',
        'alert-type' => 'success'
    );

    return redirect()->route('all.books')->with($notification);
}// End Method

public function EditBooks($id){
    $books = Book::findOrFail($id);
    $subjects = Subjects::orderBy('id','ASC')->get();
    return view('admin.books.books_edit',compact('subjects', 'books'));
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

