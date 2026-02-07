<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brief;
use App\Models\Sprint;
use App\Models\Skill;

class BriefController extends Controller
{
    //
    public function index()
    {
        $briefs = Brief::where('teacher_id', auth()->id())->get();
        return view('pages.teacher.briefs.index', compact('briefs'));
    }

    public function create()
    {
        $sprints = Sprint::all();
        $skills = Skill::all();
        return view('pages.teacher.briefs.create', compact('sprints', 'skills'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'sprint_id' => 'required|exists:sprints,id',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
            'brief_type' => 'required|in:INDIVIDUAL,COLLECTIVE',
            'estimated_duration' => 'required|string|min:1',
        ]);


        $brief = Brief::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'sprint_id' => $data['sprint_id'],
            'brief_type' => $data['brief_type'],
            'estimated_duration' => $data['estimated_duration'],
            'teacher_id' => auth()->id(),
        ]);

        if (!empty($data['skills'])) {
            $brief->skills()->attach($data['skills']);
        }

        return redirect()->route('teacher.briefs.index')
            ->with('success', 'Brief created successfully');
    }
    public function show($id)
    {
        //
    }
    public function destroy(Request $request, Brief $brief)
    {
        $brief->delete();
        return redirect()
            ->route('teacher.briefs.index')
            ->with('success', 'Brief deleted successfully!');
    }

    

}
