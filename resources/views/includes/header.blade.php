<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
        <a class="navbar-brand" href="/">UOD Attendance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>


                <li class="nav-item"><a class="nav-link" href="{{ route('lecturers') }}">Lecturer</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('students') }}">Students</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('systemAdmin') }}">System Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('schoolAdmin') }}">School Admin</a></li>
                <span id="separator"></span>
                @if(!Auth::check())
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Sign In</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                @endif

            </ul>
        </div>
    </nav>
</header>
