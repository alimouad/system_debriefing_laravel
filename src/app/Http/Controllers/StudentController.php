<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation;
use App\Models\Submission;

class StudentController extends Controller
{
    //
    public function index() {
        $student = Auth::user();
        $classroom = $student->classroom;

        $skills = Evaluation::where('student_id', $student->id)
            ->with('skills')
            ->get()
            ->flatMap(fn($eval) => $eval->skills)
            ->unique('id')
            ->map(fn($skill) => [
                'id' => $skill->id,
                'code' => $skill->code,
                'label' => $skill->label,
            ]);
        $projects_done = Submission::where('student_id', $student->id)->count();

        // Since there's no announcements relationship, just pass empty array
        $announcements = [];

        // Pass everything to the view in a structured array
        $student = [
            'skills' => $skills,
            'projects_done' => $projects_done,
            'classroom_name' => $classroom->name ?? 'No Classroom Assigned',
            'announcements' => $announcements,
        ];
        return view('pages.student.dashboard.index', compact('student'));
    }

    
    public function briefs() {
        $briefs = auth()->user()->classroom?->sprints()->with('briefs')->get()->pluck('briefs')->flatten();
        return view('pages.student.briefs.index', compact('briefs'));

    }
}
