<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index() {
        return view('pages.student.dashboard.index');
    }

    public function briefs() {
        $briefs = auth()->user()->classroom?->sprints()->with('briefs')->get()->pluck('briefs')->flatten();
        return view('pages.student.briefs.index', compact('briefs'));

    }
}
