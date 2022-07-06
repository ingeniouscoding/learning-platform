@php /** @var $course \App\Models\Course */ @endphp

@extends('layouts.teacher')

@section('title', 'Teacher Courses')

@section('content')

    <h1>Teacher Courses</h1>
    <a href="{{ route('teacher.courses.create') }}">Create course</a>
    <hr>

    @foreach($courses as $course)
        <a href="{{ route('teacher.courses.show', $course->id) }}">
            <h3>{{ $course->name }}</h3>
        </a>
        <p>{{ $course->description }}</p>
        <a href="{{ route('teacher.courses.edit', $course->id) }}">Edit</a>
        <hr>
    @endforeach

@endsection
