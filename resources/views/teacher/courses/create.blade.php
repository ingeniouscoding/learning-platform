@extends('layouts.teacher')

@section('title', 'Create course')

@section('content')

    <h1>Create course</h1>

    @error('save')
    <h3>{{ $message }}</h3>
    @enderror

    <form method="POST" action="{{ route('courses.store') }}"
          x-data="{ shiftPressed: false }"
          x-on:create="$el.submit()"
    >
        @csrf
        <div>
            <label for="name">Name</label>
            <div>
                <input id="name" type="text" name="name" value="{{ old('name') }}">
            </div>
            @error('name') {{ $message }} @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <div>
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
            <input type="submit" value="Save">
        </div>
    </form>

@endsection
