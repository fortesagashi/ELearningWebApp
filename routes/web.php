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
    Route::get('/admin/profile', [AdminController::class,'Profile'])->name('admin.profile');
    Route::get('/edit/profile', [AdminController::class,'EditProfile'])->name('edit.profile');
    Route::post('/store/profile', [AdminController::class,'StoreProfile'])->name('store.profile');
    Route::get('/change/password',  [AdminController::class,'ChangePassword'])->name('change.password');
    Route::post('/update/password',  [AdminController::class,'UpdatePassword'])->name('update.password');
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
    Route::get('/dashboard', [TeacherController::class, 'Dashboard'])->name('teacher.dashboard')->middleware('teacher');
    Route::get('/logout', [TeacherController::class, 'TeacherLogout'])->name('teacher.logout')->middleware('teacher');
    Route::get('/teacher/profile', [TeacherController::class,'Profile'])->name('teacher.profile');
    Route::get('/edit/profile', [TeacherController::class,'EditProfile'])->name('edit.profile');
    Route::post('/store/profile', [TeacherController::class,'StoreProfile'])->name('store.profile');
    Route::get('/change/password',  [TeacherController::class,'ChangePassword'])->name('change.password');
    Route::post('/update/password',  [TeacherController::class,'UpdatePassword'])->name('update.password');
});
//End Teacher Route
//Student Route
Route::prefix('student')->group(function (){
    Route::get('/login', [StudentController::class, 'Index'])->name('student_login_form');
    Route::post('/login/owner', [StudentController::class, 'Login'])->name('student.login');
//middleware('student) helps not to access /dashboard page without logging in
    Route::get('/dashboard', [StudentController::class, 'Dashboard'])->name('student.dashboard')->middleware('student');
    Route::get('/logout', [StudentController::class, 'StudentLogout'])->name('student.logout')->middleware('student');
    Route::get('/dashboard/chapter', [BookController::class, 'Dashboard'])->name('content.dashboard');
});
//End Student Route

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
