@extends('layouts.master')
@section('title', 'Accueil')
@section('content')
<section class="bg-light text-center">
    <div class="container p-4 max-1200 d-flex flex-column flex-md-row align-items-center justify-content-between gap-4">

        <!-- Text -->
        <div class="text-md-start text-center flex-fill">
            <h1 class="display-4 fw-bold">Bienvenue au Collège Maisonneuve</h1>
            <p class="lead text-muted">
                Découvrez la vie étudiante, les ressources et les opportunités académiques avec nous.
            </p>
            <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-start gap-2 mt-3">
                <a href="#" class="btn btn-primary btn-lg">En savoir plus</a>
                <a href="#" class="btn btn-outline-secondary btn-lg">Nous contacter</a>
            </div>
        </div>

        <!-- Image -->
        <div class="flex-fill">
            <img src="{{ asset('images/banner.webp') }}" alt="Banner Image" class="img-fluid rounded shadow">
        </div>

    </div>
</section>
<section>
    <div class="container max-1200 p-4">
        <h2 class="mb-4">Pourquoi Choisir le Collège Maisonneuve?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="d-flex gap-3 bg-light p-3 rounded h-100">
                    <i class="ri-group-2-line display-5 text-primary mb-3"></i>
                    <div>
                        <h5>Communauté Dynamique</h5>
                        <p>Rejoignez une communauté étudiante diversifiée et engagée.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex gap-3 bg-light p-3 rounded h-100">
                    <i class="ri-book-open-line display-5 text-primary mb-3"></i>
                    <div>
                        <h5>Excellence Académique</h5>
                        <p>Profitez de programmes académiques de haute qualité et de ressources modernes.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex gap-3 bg-light p-3 rounded h-100">
                    <i class="ri-map-pin-line display-5 text-primary mb-3"></i>
                    <div>
                        <h5>Emplacement Idéal</h5>
                        <p>Profitez d'un campus situé au cœur de la ville, à proximité des transports en commun.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container max-1200">
        <h2>Nos programmes</h2>
        <div class="grow-effect">
            <div class="grow-effect-item">

            </div>
            <div class="grow-effect-item">

            </div>
            <div class="grow-effect-item">

            </div>
            <div class="grow-effect-item">

            </div>
            <div class="grow-effect-item">

            </div>
        </div>
    </div>
</section>


@endsection