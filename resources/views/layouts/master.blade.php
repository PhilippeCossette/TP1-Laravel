<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ma Page') - College Maisonneuve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>

<body>
    <nav class="navigation">
        <div class="navigation-container max-1200">
            <a href="{{ route('index') }}" class="navigation-logo"><img src="{{ asset('images/Maisonneuve-logo.jpg') }}" alt="Logo "></a>
            <ul class="navigation-items-container">
                <li class="navigation-item"><a href="">Accueil</a></li>
                <li class="navigation-item"><a href="">Étudiants</a></li>
                <li class="navigation-item"><a href="">Contact</a></li>
                <li class="navigation-item"><a href="">Information</a></li>
            </ul>
            <div class="navigation__mobile-menu">
                <div class="navigation__mobile-item-container">
                    <a class="navigation__mobile-item" href="">
                        <i class="icon ri-home-line"></i>
                    </a>
                    <a class="navigation__mobile-item" href="">
                        <i class="icon ri-group-2-line"></i>
                    </a>
                    <a class="navigation__mobile-item" href="">
                        <i class="icon ri-mail-line"></i>
                    </a>
                    <a class="navigation__mobile-item" href="">
                        <i class="icon ri-information-line"></i>
                    </a>
                </div>
            </div>
        </div>


    </nav>

    <main>


        @yield('content')

    </main>


    <footer class="bg-light text-dark mt-5">
        <div class="container py-4">
            <div class="row align-items-center">

                <!-- Navigation Links -->
                <div class="col-md-6 mb-3 mb-md-0">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark px-2" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark px-2" href="#">Programmes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark px-2" href="#">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark px-2" href="#">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Copyright / Version -->
                <div class="col-md-6 text-md-end text-center">
                    <small class="d-block">
                        &copy; {{ date('Y') }} Collège Maisonneuve. Tous droits réservés.
                    </small>
                    <small class="d-block text-muted">
                        Version 1.0.0
                    </small>
                </div>

            </div>
        </div>
    </footer>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>