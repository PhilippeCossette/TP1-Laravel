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

    <style>
        .navigation-link.dropdown-toggle,
        .navigation__mobile-item.dropdown-toggle {
            cursor: pointer !important;
        }

        .dropdown-menu {
            z-index: 9999 !important;
        }
    </style>
</head>

<body>
    <nav class="navigation">
        <div class="navigation-container max-1200">
            <a href="{{ route('home.index') }}" class="navigation-logo">
                <img src="{{ asset('images/Maisonneuve-logo.jpg') }}" alt="Logo">
            </a>

            {{-- Desktop Menu --}}
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

                {{-- Desktop Language Dropdown --}}
                @php $currentLocale = session('locale', app()->getLocale()); @endphp
                <li class="dropdown">
                    <a class="navigation-link dropdown-toggle"
                        id="desktopLangDropdown"
                        data-bs-toggle="dropdown"
                        role="button"
                        aria-expanded="false">

                        @if($currentLocale === 'en')
                        <span class="fi fi-gb"></span> English
                        @else
                        <span class="fi fi-fr"></span> Français
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="desktopLangDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2"
                                href="{{ route('lang', 'en') }}">
                                <span class="fi fi-gb"></span> English
                                @if($currentLocale === 'en') <i class="ri-check-line ms-auto"></i> @endif
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2"
                                href="{{ route('lang', 'fr') }}">
                                <span class="fi fi-fr"></span> Français
                                @if($currentLocale === 'fr') <i class="ri-check-line ms-auto"></i> @endif
                            </a>
                        </li>
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
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="ri-shut-down-line"></i>
                        </button>
                    </form>
                </li>
                @endauth

            </ul>

            {{-- Mobile Menu --}}
            <div class="navigation__mobile-menu">
                <div class="navigation__mobile-item-container">

                    <a class="navigation__mobile-item" href="{{ route('home.index') }}">
                        <i class="icon ri-home-line"></i>
                    </a>

                    <a class="navigation__mobile-item" href="{{ route('students.index') }}">
                        <i class="icon ri-group-2-line"></i>
                    </a>

                    <a class="navigation__mobile-item" href="#">
                        <i class="icon ri-mail-line"></i>
                    </a>

                    {{-- Mobile Language Dropdown --}}
                    <div class="dropdown">
                        <a class="navigation__mobile-item dropdown-toggle"
                            id="mobileLangDropdown"
                            data-bs-toggle="dropdown"
                            role="button"
                            aria-expanded="false">

                            @if($currentLocale === 'en')
                            <span class="fi fi-gb"></span>
                            @else
                            <span class="fi fi-fr"></span>
                            @endif
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2"
                                    href="{{ route('lang', 'en') }}">
                                    <span class="fi fi-gb"></span> English
                                    @if($currentLocale === 'en') <i class="ri-check-line ms-auto"></i> @endif
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2"
                                    href="{{ route('lang', 'fr') }}">
                                    <span class="fi fi-fr"></span> Français
                                    @if($currentLocale === 'fr') <i class="ri-check-line ms-auto"></i> @endif
                                </a>
                            </li>
                        </ul>
                    </div>

                    @guest
                    <a class="navigation__mobile-item" href="{{ route('login') }}">
                        <i class="icon ri-user-line"></i>
                    </a>
                    @endguest

                </div>
            </div>

        </div>
    </nav>


    <main>
        @if (session('success'))
        <div class="alert alert-success text-center">@lang('lang.success')</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger text-center">@lang('lang.error')</div>
        @endif

        @yield('content')
        {{ app()->getLocale() }}
        <footer class="bg-light text-dark mt-5">
            <div class="container py-4">
                <ul class="nav">
                    <li><a class="nav-link text-dark" href="#">@lang('lang.nav_home')</a></li>
                    <li><a class="nav-link text-dark" href="#">@lang('lang.nav_programs')</a></li>
                    <li><a class="nav-link text-dark" href="#">@lang('lang.nav_about')</a></li>
                    <li><a class="nav-link text-dark" href="#">@lang('lang.nav_contact')</a></li>
                </ul>
                <div class="text-center">
                    &copy; {{ date('Y') }} {{ __('lang.college_name') }}. @lang('lang.copyright')
                </div>
            </div>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>