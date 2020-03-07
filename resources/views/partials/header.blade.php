{{--<header>
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #0d71bb;">
        <ul>
            <li><a href="{{ route('lecturers') }}">Lecturer</a></li>
            <li><a href="{{ route('students') }}">Students</a></li>
            <li><a href="{{ route('systemAdmin') }}">System Admin</a></li>
            <li><a href="{{ route('schoolAdmin') }}">School Admin</a></li>
            <span id="separator"></span>
            @if(!Auth::check())
                <li><a href="{{ route('signup') }}">Sign Up</a></li>
                <li><a href="{{ route('signin') }}">Sign In</a></li>
            @else
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @endif
        </ul>
    </nav>
</header>--}}
