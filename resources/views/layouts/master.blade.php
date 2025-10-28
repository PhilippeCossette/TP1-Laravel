<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ __('lang.college_name') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    @php $currentLocale = session('locale', app()->getLocale()); @endphp

    <nav class="navigation">

        {{-- =============== DESKTOP TOP BAR =============== --}}
        <div class="navigation-desktop d-flex p-2">
            <div class="navigation-container d-flex flex-grow-1 max-1200 justify-content-between">
                <a href="{{ route('home.index') }}" class="navigation-logo">
                    <img src="{{ asset('images/Maisonneuve-logo.jpg') }}" style="max-width: 50px; height: auto;" alt="Logo">
                </a>

                <ul class="navigation-items-container d-flex gap-4 align-items-center list-unstyled mb-0">
                    <li class="navigation-item "><a class="navigation-link" href="{{ route('home.index') }}">@lang('lang.nav_home')</a></li>
                    <li class="navigation-item"><a class="navigation-link" href="{{ route('students.index') }}">@lang('lang.nav_students')</a></li>
                    <li class="navigation-item"><a class="navigation-link" href="#">@lang('lang.nav_contact')</a></li>
                    <li class="navigation-item"><a class="navigation-link" href="{{ route('posts.index') }}">@lang('lang.nav_forum')</a></li>

                    {{-- Language (desktop) --}}
                    <li class="navigation-item dropdown">
                        <a class="dropdown-toggle navigation-link" data-bs-toggle="dropdown" role="button">
                            @if($currentLocale === 'en')
                            <span class="fi fi-gb"></span> EN
                            @else
                            <span class="fi fi-fr"></span> FR
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('lang','en') }}"><span class="fi fi-gb"></span> English</a></li>
                            <li><a class="dropdown-item" href="{{ route('lang','fr') }}"><span class="fi fi-fr"></span> Français</a></li>
                        </ul>
                    </li>

                    @guest
                    <li><a href="{{ route('login') }}" class="btn btn-primary">@lang('lang.btn_login')</a></li>
                    @endguest

                    @auth
                    <li class="navigation-item">
                        <a class="navigation-link" href="{{ route('user.profile') }}">
                            @lang('lang.nav_hello'), {{ auth()->user()->name }}
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="ri-shut-down-line"></i></button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>

        {{-- =============== MOBILE LEFT SIDEBAR =============== --}}
        <div class="navigation-sidebar">
            <a href="{{ route('home.index') }}" class="navigation-logo-sidebar">
                <img src="{{ asset('images/Maisonneuve-logo.jpg') }}" alt="Logo">
            </a>

            <a class="navigation__mobile-item" href="{{ route('home.index') }}" aria-label="Home">
                <i class="ri-home-line"></i>
            </a>

            <a class="navigation__mobile-item" href="{{ route('students.index') }}" aria-label="Students">
                <i class="ri-group-2-line"></i>
            </a>

            <a class="navigation__mobile-item" href="{{ route('posts.index') }}" aria-label="Forum">
                <i class="ri-chat-3-line"></i>
            </a>

            @auth
            <a class="navigation__mobile-item" href="{{ route('user.profile') }}" aria-label="Profile">
                <i class="ri-account-circle-line"></i>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="navigation__mobile-item" aria-label="Logout">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="ri-shut-down-line"></i>
                </button>
            </form>
            @endauth

            @guest
            <a class="navigation__mobile-item" href="{{ route('login') }}" aria-label="Login">
                <i class="ri-login-circle-line"></i>
            </a>
            @endguest

            <a class="navigation__mobile-item" href="{{ route('lang', $currentLocale === 'en' ? 'fr' : 'en') }}" aria-label="Language">
                @if($currentLocale === 'en')
                <span class="fi fi-gb"></span>
                @else
                <span class="fi fi-fr"></span>
                @endif
            </a>
        </div>
    </nav>



    <main>
        @if (session('success'))
        <div class="container my-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>@lang('lang.success')!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        @if (session('error'))
        <div class="container my-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>@lang('lang.error')!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        @yield('content')




    </main>
    <footer class="bg-light text-dark mt-5">
        <div class="container py-4">
            <ul class="nav justify-content-center mb-2">
                <li class="nav-item"><a class="nav-link px-2 text-dark" href="#">@lang('lang.nav_home')</a></li>
                <li class="nav-item"><a class="nav-link px-2 text-dark" href="#">@lang('lang.nav_programs')</a></li>
                <li class="nav-item"><a class="nav-link px-2 text-dark" href="#">@lang('lang.nav_about')</a></li>
                <li class="nav-item"><a class="nav-link px-2 text-dark" href="#">@lang('lang.nav_contact')</a></li>
            </ul>
            <small class="text-center d-block">&copy; {{ date('Y') }} {{ __('lang.college_name') }} — @lang('lang.copyright')</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>