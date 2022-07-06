@php /** @var $course \App\Models\Course */ @endphp

@extends('layouts.teacher')

@section('title', "Edit course {$course->id}")

@section('content')

    <h2>Edit course {{ $course->id }}</h2>

    <form action="{{ route('teacher.courses.destroy', $course->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>

    <a href="{{ route('teacher.lessons.create', ['course_id' => $course->id]) }}">Add lesson</a>

    @foreach($course->lessons as $lesson)
        @php /** @var $lesson \App\Models\Lesson */ @endphp

        <h2>Lesson: {{ $loop->index + 1 }}</h2>
        <h3>{{ $lesson->name }}</h3>
    @endforeach

@endsection
