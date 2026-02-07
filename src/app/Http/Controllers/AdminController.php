<?php

namespace App\Http\Controllers;
use App\Models\Sprint;
use App\Models\Classroom;
use App\Models\Skill;
use App\Models\User;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $sprintCount = Sprint::Count();
        $classroomCount = Classroom::Count();
        $skillCount = Skill::Count();
        $studentCount = User::where('role', 'STUDENT')->Count();
        return view('pages.admin.dashboard.index', compact('sprintCount', 'classroomCount', 'skillCount', 'studentCount'));
    }
}
