@php /** @var $lesson \App\Models\Lesson */ @endphp

@extends('layouts.student')

@section('title', 'Show lesson')

@section('content')

    <h2>{{ $lesson->name }}</h2>

    <h3>{{ $lesson->description }}</h3>

    <hr>

    <livewire:quiz :lesson="$lesson"/>

@endsection
