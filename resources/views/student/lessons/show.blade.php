@php
    /**
     * @var $lesson \App\Models\Lesson
     * @var $total int
     * @var $correct int
     */
@endphp

@extends('layouts.student')

@section('title', 'Show lesson')

@section('content')

    <h2>{{ $lesson->name }}</h2>

    <h3>{{ $lesson->description }}</h3>

    <hr>
    <h3>Total submissions: {{ $total }}</h3>
    <h3>Correct: {{ $correct }}%</h3>
    <hr>

    <livewire:quiz :lesson="$lesson"/>

@endsection
