@php /** @var $course \App\Models\Course */ @endphp

@extends('layouts.basic')

@section('title', "Edit course {$course->id}")

@section('content')

    <h2>Edit course {{ $course->id }}</h2>

    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>

@endsection
