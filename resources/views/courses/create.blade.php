@extends('layouts.basic')

@section('title', 'Create course')

@section('content')

    <h1>Create course</h1>

    @error('save')
    <h3>{{ $message }}</h3>
    @enderror

    <form method="POST" action="{{ route('courses.store') }}">
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
                <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>
            @error('description') {{ $message }} @enderror
        </div>
        <div>
            <input type="submit" value="Save">
        </div>
    </form>

@endsection
