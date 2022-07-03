@php /** @var $course \App\Models\Course */ @endphp

@extends('layouts.basic')

@section('title', 'Show course')

@section('content')

    <h1>Show course info</h1>

    <h2>Name: {{ $course->name }}</h2>
    <p>Description: {{ $course->description }}</p>

    <a href="{{ route('courses.edit', $course->id) }}">Edit</a>

@endsection
