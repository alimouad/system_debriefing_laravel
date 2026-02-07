<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index()  {
        $briefs = Brief::all();
        return view('pages.teacher.dashboard.index',compact('briefs'));
    }
}
