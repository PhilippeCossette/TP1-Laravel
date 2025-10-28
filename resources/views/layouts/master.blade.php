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
        <div class="navigation-container max-1200">

            <a href="{{ route('home.index') }}" class="navigation-logo">
                <img src="{{ asset('images/Maisonneuve-logo.jpg') }}" alt="Logo">
            </a>

            <ul class="navigation-items-container d-flex gap-4 align-items-center list-unstyled">
                <li class="navigation-item"><a href="{{ route('home.index') }}">@lang('lang.nav_home')</a></li>
                <li class="navigation-item"><a href="{{ route('students.index') }}">@lang('lang.nav_students')</a></li>
                <li class="navigation-item"><a href="#">@lang('lang.nav_contact')</a></li>

                <!-- ✅ Language Selector (Desktop) -->
                <li class="navigation-item dropdown">
                    <a class="dropdown-toggle navigation-link" data-bs-toggle="dropdown">
                        @if($currentLocale === 'en')
                        <span class="fi fi-gb"></span> EN
                        @else
                        <span class="fi fi-fr"></span> FR
                        @endif
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('lang','en') }}">
                                <span class="fi fi-gb"></span> English
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('lang','fr') }}">
                                <span class="fi fi-fr"></span> Français
                            </a>
                        </li>
                    </ul>
                </li>

                @guest
                <li><a href="{{ route('login') }}" class="btn btn-primary">@lang('lang.btn_login')</a></li>
                @endguest

                @auth
                <li class="navigation-item">
                    <a href="{{ route('user.profile') }}">
                        @lang('lang.nav_hello'), {{ auth()->user()->name }}
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="ri-shut-down-line"></i></button>
                    </form>
                </li>
                @endauth
            </ul>


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
                    @auth
                    <a class="navigation__mobile-item" style="font-size: 1.75em;" href="{{ route('user.profile') }}">
                        <i class="ri-account-circle-line "></i>
                    </a>
                    <form class="navigation__mobile-item" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="ri-shut-down-line"></i></button>
                    </form>
                    @endauth

                    @guest
                    <a class="navigation__mobile-item" style="font-size: 1.75em;" href="{{ route('login') }}">
                        <i class="ri-account-circle-line "></i>
                    </a>
                    @endguest


                    <a class="navigation__mobile-item" href="{{ route('lang',$currentLocale==='en'?'fr':'en') }}">
                        @if($currentLocale === 'en')
                        <span class="fi fi-gb"></span>
                        @else
                        <span class="fi fi-fr"></span>
                        @endif
                    </a>


                </div>
            </div>

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

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>