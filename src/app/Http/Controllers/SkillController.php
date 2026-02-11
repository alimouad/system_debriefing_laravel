<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    //
    public function index()
    {
        $skills = Skill::all();
        return view('pages.admin.skills.index',compact('skills'));
    }
    public function create()
    {
        return view('pages.admin.skills.create');
    }

    public function store(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'code' => 'required|string|max:255',
            'label' => 'nullable|string|max:255',
        ]);

        $skill->create($data);
        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill created successfully!');
    }

    public function show($id)
    {
        //
    }
    public function destroy(Request $request, Skill $skill)
    {
        $skill->delete();
        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully!');
    }
}
