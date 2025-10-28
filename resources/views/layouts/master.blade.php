<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('lang.page_title')) - {{ __('lang.college_name') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>

<body>
    <nav class="navigation">
        <div class="navigation-container max-1200">

            <a href="{{ route('home.index') }}" class="navigation-logo">
                <img src="{{ asset('images/Maisonneuve-logo.jpg') }}" alt="Logo">
            </a>

            <ul class="navigation-items-container d-flex gap-4 align-items-center list-unstyled">

                <li class="navigation-item">
                    <a class="navigation-link" href="{{ route('home.index') }}">@lang('lang.nav_home')</a>
                </li>

                <li class="navigation-item">
                    <a class="navigation-link" href="{{ route('students.index') }}">@lang('lang.nav_students')</a>
                </li>

                <li class="navigation-item">
                    <a class="navigation-link" href="#">@lang('lang.nav_contact')</a>
                </li>

                {{-- Language Dropdown --}}
                @php $currentLocale = session('locale', app()->getLocale()); @endphp
                <li class="nav-item dropdown">
                    <a class="navigation-link dropdown-toggle"
                        id="desktopLangDropdown"
                        data-bs-toggle="dropdown" role="button">

                        @if($currentLocale === 'en')
                        <span class="fi fi-gb"></span> English
                        @else
                        <span class="fi fi-fr"></span> Français
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('lang', 'en') }}">
                                <span class="fi fi-gb"></span> English
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('lang', 'fr') }}">
                                <span class="fi fi-fr"></span> Français
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Auth --}}
                @guest
                <li>
                    <a href="{{ route('login') }}" class="btn btn-primary">@lang('lang.btn_login')</a>
                </li>
                @endguest

                @auth
                <li class="navigation-item">
                    <a class="navigation-link" href="{{ route('user.profile') }}">
                        @lang('lang.nav_hello'), {{ auth()->user()->name }}
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="ri-shut-down-line"></i>
                        </button>
                    </form>
                </li>
                @endauth

            </ul>

        </div>
    </nav>


    {{-- ✅ Correct content yield --}}
    <main class="py-4">
        @if(session('success'))
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>@lang('lang.success'):</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>@lang('lang.error'):</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
        @endif
        @yield('content')
    </main>


    <footer class="bg-light text-dark mt-5">
        <div class="container py-4">
            <ul class="nav justify-content-center">
                <li><a class="nav-link text-dark" href="#">@lang('lang.nav_home')</a></li>
                <li><a class="nav-link text-dark" href="#">@lang('lang.nav_programs')</a></li>
                <li><a class="nav-link text-dark" href="#">@lang('lang.nav_about')</a></li>
                <li><a class="nav-link text-dark" href="#">@lang('lang.nav_contact')</a></li>
            </ul>
            <div class="text-center mt-2">
                &copy; {{ date('Y') }} {{ __('lang.college_name') }} - @lang('lang.copyright')
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>