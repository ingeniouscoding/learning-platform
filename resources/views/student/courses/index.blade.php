@php /** @var $course \App\Models\Course */ @endphp

@extends('layouts.student')

@section('title', 'Student Courses')

@section('content')

    <h1>Student Courses</h1>
    <hr>
    @foreach($courses as $course)
        <a href="{{ route('student.courses.show', $course->id) }}">
            <h3>{{ $course->name }}</h3>
        </a>
        <p>{{ $course->description }}</p>
        <hr>
    @endforeach

@endsection
