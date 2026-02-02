<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    //
      public function classroomsHome()
    {
        return view('pages.admin.classrooms.index');
    }
}
