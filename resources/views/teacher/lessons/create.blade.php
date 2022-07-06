@php /** @var $course_id string */ @endphp

@extends('layouts.teacher')

@section('title', 'Create lesson')

@section('content')

    <h1>Create lesson</h1>

    @error('save') <h3>{{ $message }}</h3> @enderror

    <form method="POST" action="{{ route('teacher.lessons.store') }}"
          x-data="{ shiftPressed: false }"
          x-on:create="$el.submit()"
    >
        @csrf
        <input type="hidden" name="course_id" value="{{ $course_id }}">
        <div>
            <label for="name">Lesson name</label>
            <div>
                <input id="name" type="text" name="name" value="{{ old('name') }}">
            </div>
            @error('name') {{ $message }} @enderror
        </div>
        <div>
            <label for="description">Lesson description</label>
            <div x-on:foo="console.log('test', $event)">
                <textarea name="description" id="description" cols="30" rows="10"
                          x-on:keydown.shift="shiftPressed = true"
                          x-on:keyup.shift="shiftPressed = false"
                          x-on:keydown.enter.prevent="
                              if(shiftPressed) {
                                  $event.target.value += '\n';
                              } else {
                                  $dispatch('create');
                              }"
                >{{ old('description') }}</textarea>
            </div>
            @error('description') {{ $message }} @enderror
        </div>
        <div>
            <label for="answer">Lesson answer</label>
            <div>
                <input type="text" name="answer" id="answer">
            </div>
            @error('answer') {{ $message }} @enderror
        </div>
        <div>
            <label for="options">Answer options</label>
            <div>
                <textarea name="options" id="options" cols="30" rows="10"></textarea>
            </div>
            @error('options') {{ $message }} @enderror
        </div>
        <div>
            <input type="submit" value="Save">
        </div>
    </form>

@endsection
