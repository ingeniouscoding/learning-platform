<?php

namespace App\Http\Controllers\Student;

use App\Models\Lesson;

class LessonController
{
    public function show(string $id)
    {
        $lesson = Lesson::find($id);

        if (is_null($lesson)) {
            return view('student.lessons.not-found');
        }
        return view('student.lessons.show', compact('lesson'));
    }
}