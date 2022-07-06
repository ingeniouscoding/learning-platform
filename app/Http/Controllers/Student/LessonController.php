<?php

namespace App\Http\Controllers\Student;

use App\Models\Lesson;
use App\Models\Submission;

class LessonController
{
    public function show(string $id)
    {
        $lesson = Lesson::find($id);

        if (is_null($lesson)) {
            return view('student.lessons.not-found');
        }

        $answers = Submission::query()
            ->select(['is_correct'])
            ->where([
                'lesson_id' => $lesson->id,
            ])
            ->get();

        $total = $answers->count();
        $correctAnswers = $answers->where('is_correct', '=', 1)->count();
        $correct = 0;

        if ($total > 0 && $correctAnswers > 0) {
            $correct = round($correctAnswers / ($total / 100));
        }

        return view('student.lessons.show', compact(['lesson', 'total', 'correct']));
    }
}