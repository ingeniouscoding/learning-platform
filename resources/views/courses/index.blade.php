@php /** @var $course \App\Models\Course */ @endphp

@extends('layouts.basic')

@section('title', 'Courses')

@section('content')

    <h1>Courses</h1>
    <a href="{{ route('courses.create') }}">Create</a>

    @foreach($courses as $course)
        <a href="{{ route('courses.show', $course->id) }}">
            <h3>{{ $course->name }}</h3>
        </a>
        <p>{{ $course->description }}</p>
        <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
    @endforeach

@endsection
