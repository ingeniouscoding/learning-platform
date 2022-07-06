{{--@php /** @var $course \App\Models\Course */ @endphp--}}

@extends('layouts.student')

@section('title', 'Show course')

@section('content')

    <h1>Show course info</h1>

    <h2>Name: {{ $course->name }}</h2>
    <p>Description: {{ $course->description }}</p>

    @foreach($course->lessons as $lesson)
        @php /** @var $lesson \App\Models\Lesson */ @endphp

        <h2>Lesson: {{ $loop->index + 1 }}</h2>
        <h3><a href="{{ route('student.lessons.show', $lesson->id) }}">{{ $lesson->name }}</a></h3>
    @endforeach

@endsection
