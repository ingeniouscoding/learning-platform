<header>
    <ul>
        <li>
            <a href="{{ route('teacher.courses.index') }}">Teacher Courses</a>
        </li>
        <li>
            <a href="{{ route('student.courses.index') }}">Student Courses</a>
        </li>
    </ul>
    @guest()
        <p><a href="{{ route('login') }}">Login</a></p>
        <p><a href="{{ route('register') }}">Register</a></p>
    @endguest
</header>
