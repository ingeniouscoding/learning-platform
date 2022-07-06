@php /** @var $lesson \App\Models\Lesson */ @endphp

@extends('layouts.teacher')

@section('title', 'Edit lesson')

@section('content')

    <h1>Edit lesson</h1>

    @error('save') <h3>{{ $message }}</h3> @enderror

    <form method="POST" action="{{ route('teacher.lessons.update', $lesson->id) }}">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Lesson name</label>
            <div>
                <input id="name" type="text" name="name" value="{{ old('name') }}">
            </div>
            @error('name') {{ $message }} @enderror
        </div>
        <div>
            <label for="description">Lesson description</label>
            <div>
                <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>
            @error('description') {{ $message }} @enderror
        </div>
        <div>
            <input type="submit" value="Save">
        </div>
    </form>

    <form action="{{ route('teacher.lessons.destroy', $lesson->id) }}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>

@endsection
