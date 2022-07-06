@extends('layouts.teacher')

@section('title', 'Welcome')

@section('content')

    <h1>Home page</h1>
    <h2>For Teacher</h2>

    <ul>
        <li>
            <a href="{{ route('teacher.courses.index') }}">Courses</a>
        </li>
    </ul>

    <h2>For Student</h2>

    <ul>
        <li>
            <a href="{{ route('student.courses.index') }}">Courses</a>
        </li>
    </ul>

@endsection
