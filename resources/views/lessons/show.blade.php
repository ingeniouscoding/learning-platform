@php /** @var $lesson \App\Models\Lesson */ @endphp

@extends('layouts.basic')

@section('title', 'Show lesson')

@section('content')

    <h1>Show lesson</h1>

    <h2>{{ $lesson->name }}</h2>

    <h3>{{ $lesson->description }}</h3>

@endsection
