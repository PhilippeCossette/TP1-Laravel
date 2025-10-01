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
<section>
    <div class="container max-1200 p-4 ">
        <h2 class="mb-4">Nos programmes</h2>
        <div class="grow-effect">
            <a href="#" class="grow-effect-item">
                <h3 class="grow-effect-title">Soins Infirmiers</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1527613426441-4da17471b66d?q=80&w=1152&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <div class="grow-effect-content">
                    <p>Découvrez notre programme de Soins Infirmiers, qui allie théorie et pratique pour former des professionnels compétents et empathiques.</p>
                    <button class="btn btn-outline-primary">En savoir plus</button>
                </div>
            </a>
            <a href="" class="grow-effect-item">
                <h3 class="grow-effect-title">Programmation Logiciel</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1529429612779-c8e40ef2f36d?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <div class="grow-effect-content">
                    <p>Explorez notre programme de Programmation Logiciel, conçu pour vous préparer à une carrière passionnante dans le domaine du développement logiciel.</p>
                    <button class="btn btn-outline-primary">En savoir plus</button>
                </div>
            </a>
            <a href="#" class="grow-effect-item">
                <h3 class="grow-effect-title">Photographie</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1541516160071-4bb0c5af65ba?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <div class="grow-effect-content">
                    <p>Découvrez notre programme de Photographie, qui allie technique et créativité pour former des artistes visuels compétents. En photographie, vous apprendrez à maîtriser les outils et les techniques nécessaires pour capturer des images saisissantes et raconter des histoires visuelles.</p>
                    <button class="btn btn-outline-primary">En savoir plus</button>
                </div>
            </a>
            <a href="#" class="grow-effect-item">
                <h3 class="grow-effect-title">Cuisine</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1683624328172-88fb24625ec1?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <div class="grow-effect-content">
                    <p>Découvrez notre programme de Cuisine, qui allie tradition et innovation pour former des chefs compétents et créatifs. En cuisine, vous apprendrez à maîtriser les techniques culinaires essentielles et à créer des plats savoureux qui raviront les papilles.</p>
                    <button class="btn btn-outline-primary">En savoir plus</button>
                </div>
            </a>
            <a href="#" class="grow-effect-item">
                <h3 class="grow-effect-title">Autre Programme</h3>
                <img class="grow-effect-img" src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                <div class="grow-effect-content">
                    <p>Découvrez notre programme, qui allie théorie et pratique pour former des professionnels compétents et empathiques.</p>
                    <button class="btn btn-outline-primary">En savoir plus</button>
                </div>
            </a>
        </div>
    </div>
</section>


@endsection