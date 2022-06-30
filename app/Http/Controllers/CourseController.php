<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CourseController extends Controller
{
    public function index(): Factory|View|Application
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create(): Factory|View|Application
    {
        return view('courses.create');
    }

    public function store(StoreCourseRequest $request): \Illuminate\Http\RedirectResponse
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

    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        //
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    public function destroy(Course $course)
    {
        //
    }
}
