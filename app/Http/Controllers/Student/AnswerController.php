<?php

namespace App\Http\Controllers\Student;

use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class AnswerController
{
    public function show(string $lessonId)
    {
        $submissions = Submission::query()
            ->where([
                'user_id' => Auth::user()->id,
                'lesson_id' => $lessonId,
            ])
            ->get()
            ->toBase();

        return view('student.answers.show', compact('submissions'));
    }
}