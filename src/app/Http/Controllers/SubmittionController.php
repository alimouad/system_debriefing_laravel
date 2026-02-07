<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brief;

class SubmittionController extends Controller
{
    public function briefRendu(Brief $brief)
    {

        return view('pages.student.briefs.rendu', [
            'brief' => $brief,
        ]);
    }
    public function submitBrief(Request $request, Brief $brief)
    {
        $data = $request->validate([
            'repository_url' => 'required|url',
            'description' => 'nullable|string|max:255',
        ]);

        $brief->submissions()->updateOrCreate(
            [
                'student_id' => auth()->id(),
            ],
            [
                'repository_url' => $data['repository_url'],
                'description' => $data['description'] ?? null,
            ]
        );

        return redirect()
            ->route('student.briefs')
            ->with('success', 'Brief submitted successfully!');
    }
}
