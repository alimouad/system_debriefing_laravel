<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint;
use App\Models\Classroom;

class SprintController extends Controller
{
    //
    public function index()
    {
        $sprints = Sprint::all();
        return view('pages.admin.sprints.index',compact('sprints'));
    }
    public function create()
    {
        $classrooms = Classroom::all();
        return view('pages.admin.sprints.create', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        Sprint::create($data);
        return redirect()
            ->route('admin.sprints.index')
            ->with('success', 'Sprint created successfully!');
    }

    public function show($id)
    {
        //
    }
    public function destroy(Request $request, Sprint $sprint)
    {
        $sprint->delete();
        return redirect()
            ->route('admin.sprints.index')
            ->with('success', 'Sprint deleted successfully!');
    }
}
