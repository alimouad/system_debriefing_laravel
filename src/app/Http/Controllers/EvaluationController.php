<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use App\Models\Brief;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    //
    public function index(Brief $brief)
    {
        $submission = $brief->submissions;
        return view('pages.teacher.evaluation.index', compact('submission'));
    }


    public function evaluate($briefId, $studentId)
    {
        $skills = Brief::findOrFail($briefId)->skills;
        $submission = Submission::with('student')
            ->where('brief_id', $briefId)
            ->where('student_id', $studentId)
            ->firstOrFail();

        return view('pages.teacher.evaluation.evaluate', compact('submission', 'skills'));
    }


    public function storeEvaluation(Request $request, $briefId, $studentId)
    {
        $data = $request->validate([
            'evaluations' => 'required|array',
            'evaluations.*.mastery_level' => 'required|string',
            'evaluations.*.comment' => 'nullable|string',
        ]);

        foreach ($data['evaluations'] as $skillId => $evaluationData) {

            $evaluation = Evaluation::create([
                'teacher_id' => auth()->id(),
                'student_id' => $studentId,
                'brief_id' => $briefId,
                'mastery_level' => $evaluationData['mastery_level'],
                'comment' => $evaluationData['comment'] ?? null,
            ]);

            // Attach the skill to this evaluation
            $evaluation->skills()->attach($skillId);
        }

        return redirect()
            ->route('teacher.evaluation.index', ['brief' => $briefId])
            ->with('success', 'Evaluations submitted successfully.');
    }
    public function getEvaluations()
    {
        $evaluations = Evaluation::where('student_id', auth()->id())->get();
        return view('pages.student.evaluation.index', compact('evaluations'));
    }
}
