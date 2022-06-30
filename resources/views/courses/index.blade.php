<h1>Courses</h1>
<a href="{{ route('courses.create') }}">Create</a>

@foreach($courses as $course)
    <h3>{{ $course->name }}</h3>
    <p>{{ $course->description }}</p>
@endforeach