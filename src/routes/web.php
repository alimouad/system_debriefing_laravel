<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BriefController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubmittionController;
use App\Models\User;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:ADMIN'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('users', UserController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('sprints', SprintController::class);
    Route::get('/classrooms/{classroom}/asign', [ClassroomController::class, 'asignTeacher'])->name('classrooms.asign');
    Route::post('/classrooms/{classroom}/asign/store', [ClassroomController::class, 'asignTeacherStore'])->name('classrooms.assignTeacher.store');

});


Route::middleware(['auth', 'role:TEACHER'])->prefix('/teacher')->name('teacher.')->group(function () {
    Route::get('/home', [TeacherController::class, 'index'])->name('home');
    // Route::resource('classrooms', ClassroomController::class);
    Route::resource('briefs', BriefController::class);
});




Route::middleware(['auth', 'role:STUDENT'])->prefix('/student')->name('student.')->group(function () {
    Route::get('/home', [StudentController::class, 'index'])->name('home');
    Route::resource('classrooms', ClassroomController::class);
    Route::get('/briefs', [StudentController::class, 'briefs'])->name('briefs');
    Route::get('/briefs/{brief}/rendu', [SubmittionController::class, 'briefRendu'])->name('briefs.rendu');
    Route::post('/briefs/{brief}/submit', [SubmittionController::class, 'submitBrief'])->name('briefs.submit');
});