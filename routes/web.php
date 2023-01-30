<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\BookController;
// use App\Http\Controllers\DropdownController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin Route
Route::prefix('admin')->group(function (){
    Route::get('/login', [AdminController::class, 'Index'])->name('admin_login_form');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
//middleware('admin) helps not to access /dashboard page without logging in
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/admin/profile', [AdminController::class,'Profile'])->name('admin.profile')->middleware('admin');
    Route::get('/edit/profile', [AdminController::class,'EditProfile'])->name('edit.profile')->middleware('admin');
    Route::post('/store/profile', [AdminController::class,'StoreProfile'])->name('store.profile')->middleware('admin');
    Route::get('/change/password',  [AdminController::class,'ChangePassword'])->name('admin.change.password')->middleware('admin');
    Route::post('/update/password',  [AdminController::class,'UpdatePassword'])->name('admin.update.password')->middleware('admin');
});
//End Admin Route
// Route::prefix('dropdown')->group(function (){

//     Route::get('/data', [DropdownController::class, 'Index']);
//     Route::post('/school', [DropdownController::class, 'FetchSchool'])->name('fetch.school');
//     Route::post('/country', [DropdownController::class, 'FetchCountry'])->name('fetch.country');
// });

//Teacher Route
Route::prefix('teacher')->group(function (){
    Route::get('/login', [TeacherController::class, 'Index'])->name('teacher_login_form');
    Route::post('/login/owner', [TeacherController::class, 'Login'])->name('teacher.login');
//middleware('teacher) helps not to access /dashboard page without logging in
   Route::get('/logout', [TeacherController::class, 'TeacherLogout'])->name('teacher.logout')->middleware('teacher');
    Route::get('/teacher/profile', [TeacherController::class,'Profile'])->name('teacher.profile')->middleware('teacher');
    Route::get('/edit/profile', [TeacherController::class,'EditProfile'])->name('teacher.edit.profile')->middleware('teacher');
    Route::post('/store/profile', [TeacherController::class,'StoreProfile'])->name('teacher.store.profile')->middleware('teacher');
    Route::get('/change/password',  [TeacherController::class,'ChangePassword'])->name('change.password')->middleware('teacher');
    Route::post('/update/password',  [TeacherController::class,'UpdatePassword'])->name('update.password')->middleware('teacher');
    Route::get('/dashboard', [TeacherController::class, 'Dashboard'])->name('teacher.dashboard')->middleware('teacher');
     Route::get('/dashboard/chapter/{id}/{subjectID}', [BookController::class, 'TeacherDashboard'])->name('teacher.content.dashboard')->middleware('teacher');
    Route::post('/dashboard/updatechapter/{id}/{subjectID}', [BookController::class, 'TeacherUpdateChapter'])->name('teacher.update.chapter')->middleware('teacher');

});
//End Teacher Route
//Student Route
Route::prefix('student')->group(function (){
    Route::get('/login', [StudentController::class, 'Index'])->name('student_login_form');
    Route::post('/login/owner', [StudentController::class, 'Login'])->name('student.login');
    Route::get('/profile', [StudentController::class,'Profile'])->name('student.profile')->middleware('student');
    Route::get('/edit/profile', [StudentController::class,'EditProfile'])->name('student.edit.profile')->middleware('student');
    Route::post('/store/profile', [StudentController::class,'StoreProfile'])->name('student.store.profile')->middleware('student');
//middleware('student) helps not to access /dashboard page without logging in
    Route::get('/logout', [StudentController::class, 'StudentLogout'])->name('student.logout')->middleware('student');
    Route::get('/dashboard', [StudentController::class, 'Dashboard'])->name('student.dashboard')->middleware('student');
    Route::get('/dashboard/chapter/{id}/{subjectID}', [BookController::class, 'Dashboard'])->name('content.dashboard')->middleware('student');
    Route::post('/dashboard/updatechapter/{id}/{subjectID}', [BookController::class, 'UpdateChapter'])->name('update.chapter')->middleware('student');
});
//End Student Route


//Subjects All Route
Route::controller(SubjectsController::class)->group(function (){
    Route::get('/all/subjects', 'AllSubjects')->name('all.subjects')->middleware('admin');
    Route::get('/add/subjects', 'AddSubjects')->name('add.subjects')->middleware('admin');
    Route::post('/store/subjects', 'StoreSubjects')->name('store.subjects')->middleware('admin');
    Route::get('/edit/subjects/{id}', 'EditSubjects')->name('edit.subjects')->middleware('admin');
    Route::post('/update/subjects', 'UpdateSubjects')->name('update.subjects')->middleware('admin');
    Route::get('/delete/subjects/{id}', 'DeleteSubjects')->name('delete.subjects')->middleware('admin');
});

//Books All Route
Route::controller(BookController::class)->group(function (){
    Route::get('/all/books', 'AllBooks')->name('all.books')->middleware('admin');
    Route::get('/add/books', 'AddBooks')->name('add.books')->middleware('admin');
    Route::post('/store/books', 'StoreBooks')->name('store.books')->middleware('admin');
    Route::get('/edit/books/{id}', 'EditBooks')->name('edit.books')->middleware('admin');
    Route::post('/update/books', 'UpdateBooks')->name('update.books')->middleware('admin');
    Route::get('/delete/books/{id}', 'DeleteBooks')->name('delete.books')->middleware('admin');
});

//Chapters All Route
Route::controller(ChapterController::class)->group(function (){
    Route::get('/all/chapters', 'AllChapters')->name('all.chapters')->middleware('admin');
    Route::get('/add/chapters', 'AddChapters')->name('add.chapters')->middleware('admin');
    Route::post('/store/chapters', 'StoreChapters')->name('store.chapters')->middleware('admin');
    Route::get('/edit/chapters/{id}', 'EditChapters')->name('edit.chapters')->middleware('admin');
    Route::post('/update/chapters', 'UpdateChapters')->name('update.chapters')->middleware('admin');
    Route::get('/delete/chapters/{id}', 'DeleteChapters')->name('delete.chapters')->middleware('admin');
});

//Students All Route
Route::controller(StudentController::class)->group(function (){
    Route::get('/all/students', 'AllStudents')->name('all.students')->middleware('admin');
    Route::get('/add/students', 'AddStudents')->name('add.students')->middleware('admin');
    Route::post('/store/students', 'StoreStudents')->name('store.students')->middleware('admin');
    Route::get('/edit/students/{id}', 'EditStudents')->name('edit.students')->middleware('admin');
    Route::post('/update/students', 'UpdateStudents')->name('update.students')->middleware('admin');
    Route::get('/delete/students/{id}', 'DeleteStudents')->name('delete.students')->middleware('admin');
});

//Teachers All Route
Route::controller(TeacherController::class)->group(function (){
    Route::get('/all/teachers', 'AllTeachers')->name('all.teachers')->middleware('admin');
    Route::get('/add/teachers', 'AddTeachers')->name('add.teachers')->middleware('admin');
    Route::post('/store/teachers', 'StoreTeachers')->name('store.teachers')->middleware('admin');
    Route::get('/edit/teachers/{id}', 'EditTeachers')->name('edit.teachers')->middleware('admin');
    Route::post('/update/teachers', 'UpdateTeachers')->name('update.teachers')->middleware('admin');
    Route::get('/delete/teachers/{id}', 'DeleteTeachers')->name('delete.teachers')->middleware('admin');
    //teachers_subjects data
    Route::get('/all/teachers_subjects/{id}', 'AllTeachersSubjects')->name('all.teachers_subjects')->middleware('admin');
    Route::get('/add/teachers_subjects/{id}', 'AddTeachersSubjects')->name('add.teachers_subjects')->middleware('admin');
    Route::post('/store/teachers_subjects/{id}', 'StoreTeachersSubjects')->name('store.teachers_subjects')->middleware('admin');
    Route::get('/edit/teachers_subjects/{subject_id}/{teacher_id}', 'EditTeachersSubjects')->name('edit.teachers_subjects')->middleware('admin');
    Route::post('/update/teachers_subjects', 'UpdateTeachersSubjects')->name('update.teachers_subjects')->middleware('admin');
    Route::get('/delete/teachers_subjects/{subject_id}/{teacher_id}', 'DeleteTeachersSubjects')->name('delete.teachers_subjects')->middleware('admin');

});




Route::get('/', function () {
    return view('student.student_login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
