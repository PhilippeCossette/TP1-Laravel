<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ma Page') - College Maisonneuve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- @vite('resources/css/app.css') -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold text-primary" href="{{ route('index') }}">
                <img src="{{ asset('/images/Maisonneuve-logo.jpg') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            </a>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="schoolNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('students') ? 'active' : '' }}" href="{{ url('/students') }}">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('courses') ? 'active' : '' }}" href="{{ url('/courses') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    @yield('content')


    <footer>

    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>