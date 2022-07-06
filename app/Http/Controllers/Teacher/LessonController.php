<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Request $request)
    {
        $course_id = $request->get('course_id');

        return view('teacher.lessons.create', compact('course_id'));
    }

    public function store(StoreLessonRequest $request)
    {
        $lesson = Lesson::make($request->validated());

        $isSaved = $lesson->save();
        if (!$isSaved) {
            return back()
                ->withInput()
                ->withErrors(['save' => 'Save error. Try again.']);
        }
        return redirect()->route('teacher.courses.edit', $lesson->course_id);
    }

    public function show(string $id)
    {
        $lesson = Lesson::find($id);

        if (is_null($lesson)) {
            return view('teacher.lessons.not-found');
        }
        return view('teacher.lessons.show', compact('lesson'));
    }

    public function edit(string $id)
    {
        $lesson = Lesson::find($id);

        if (is_null($lesson)) {
            return view('teacher.lessons.not-found');
        }
        return view('teacher.lessons.edit', compact('lesson'));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        //
    }

    public function destroy(string $id)
    {
        $lesson = Lesson::findOrFail($id, ['id', 'course_id']);

        $courseId = $lesson->course_id;
        $lesson->delete();

        return redirect()->route('teacher.courses.show', $courseId);
    }
}
