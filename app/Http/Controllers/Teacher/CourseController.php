<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('teacher.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('teacher.courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::make($request->validated());

        $isSaved = $course->save();
        if (!$isSaved) {
            return back()
                ->withInput()
                ->withErrors(['save' => 'Save error. Try again.']);
        }
        return redirect()->route('teacher.courses.index');
    }

    public function show(string $id)
    {
        $course = Course::with('lessons')->find($id);

        if (is_null($course)) {
            return view('teacher.courses.not-found');
        }
        return view('teacher.courses.show', compact('course'));
    }

    public function edit(string $id)
    {
        $course = Course::with('lessons')->find($id);

        if (is_null($course)) {
            return view('teacher.courses.not-found');
        }
        return view('teacher.courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    public function destroy(string $id)
    {
        Course::findOrFail($id, ['id'])->delete();

        return redirect()->route('teacher.courses.index');
    }
}
