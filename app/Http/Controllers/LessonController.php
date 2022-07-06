<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Request $request)
    {
        $course_id = $request->get('course_id');

        return view('lessons.create', compact('course_id'));
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
        return redirect()->route('courses.edit', $lesson->course_id);
    }

    public function show(string $id)
    {
        $lesson = Lesson::find($id);

        if (is_null($lesson)) {
            return view('lessons.not-found');
        }
        return view('lessons.show', compact('lesson'));
    }

    public function edit(string $id)
    {
        $lesson = Lesson::find($id);

        if (is_null($lesson)) {
            return view('lessons.not-found');
        }
        return view('lessons.edit', compact('lesson'));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        //
    }

    public function destroy(string $id)
    {
        $lesson = Lesson::query()
            ->select(['id', 'course_id'])
            ->findOrFail($id);

        $courseId = $lesson->course_id;
        $lesson->delete();

        return redirect()->route('courses.show', $courseId);
    }
}
