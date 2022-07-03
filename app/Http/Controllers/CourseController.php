<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
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
        return redirect()->route('courses.index');
    }

    public function show(string $id)
    {
        $course = Course::find($id);
        if (is_null($course)) {
            return view('courses.not-found');
        }
        return view('courses.show', compact('course'));
    }

    public function edit(string $id)
    {
        $course = Course::find($id);
        if (is_null($course)) {
            return view('courses.not-found');
        }
        return view('courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    public function destroy(string $id)
    {
        Course::query()
            ->select(['id', 'name'])
            ->findOrFail($id)
            ->delete();
        
        return redirect()->route('courses.index');
    }
}
