@extends('layouts.master')
@section('title', 'Ajouter un étudiant')
@section('content')

<section style="min-height: 100vh;">
    <div class="container py-4 max-1200">
        <div class="row align-items-stretch g-0"> <!-- g-0 to remove gaps so heights match -->

            <!-- Banner / Image -->
            <div class="col-12 col-md-7">
                <img src="https://www.cmaisonneuve.qc.ca/public/uploads/2024/06/College_de_Maisonneuve_Jardin_interieur.jpg"
                    alt="College Banner" class="img-fluid h-100 w-100" style="object-fit: cover; border-radius: 0.25rem 0 0 0.25rem;">
            </div>

            <!-- Form -->
            <div class="col-12 col-md-5 d-flex">
                <form action="" method="POST" class="p-4 border rounded-end shadow bg-light flex-fill">
                    @csrf
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nom de famille</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="city_id" class="form-label">Ville</label>
                        <select class="form-select" id="city_id" name="city_id" required>
                            <option value="" disabled selected>Choisir une ville</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Ajouter l'étudiant</button>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection