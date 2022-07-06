<?php

namespace App\Http\Controllers\Student;

use App\Models\Course;

class CourseController
{
    public function index()
    {
        $courses = Course::all();
        return view('student.courses.index', compact('courses'));
    }

    public function show(string $id)
    {
        $course = Course::with('lessons')->find($id);

        if (is_null($course)) {
            return view('student.courses.not-found');
        }
        return view('student.courses.show', compact('course'));
    }
}