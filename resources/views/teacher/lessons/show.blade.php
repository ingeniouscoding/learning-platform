@php
    /**
     * @var $lesson \App\Models\Lesson
     * @var $options string[]
     */
@endphp

@extends('layouts.teacher')

@section('title', 'Show lesson')

@section('content')

    <h1>Show lesson</h1>

    <h2>{{ $lesson->name }}</h2>

    <h3>{{ $lesson->description }}</h3>

    <h4>Correct answer: {{ $lesson->answer }}</h4>
    <ol>
        @foreach($options as $option)
            <li>{{ $option }}</li>
        @endforeach
    </ol>
@endsection
