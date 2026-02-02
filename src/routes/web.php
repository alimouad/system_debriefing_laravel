<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login/submit',[AuthController::class,'submitLogin'])->name('login.submit');

Route::middleware('auth')->group(function(){
    Route::get('/admin/home',[AdminController::class,'dashboard'])->name('admin.home');
//    Route::get('/admin/users',[UserController::class,'usersHome'])->name('admin.users');
//    Route::get('/admin/skills',[SkillController::class,'skillsHome'])->name('admin.skills');
//    Route::get('/admin/sprints',[SprintController::class,'sprintsHome'])->name('admin.sprints');
//    Route::get('/admin/home',[ClassroomController::class,'classroomsHome'])->name('admin.classrooms');
});
