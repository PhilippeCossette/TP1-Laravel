@extends('layouts.master')
@section('title', 'Enregistrer vous!')
@section('content')

<section style="min-height: 100vh;">
    <div class="container py-4 max-1200 d-flex flex-wrap justify-content-center">

        <!-- Banner / Image -->
        <div class="d-flex flex-fill" style="min-width: 300px; max-width: 600px; position: relative; flex: 1 1 45%;">
            <img src="https://www.cmaisonneuve.qc.ca/public/uploads/2025/09/CM-25042023_Inauguration-jardin_S300dpi_IMG2568.jpg.webp"
                alt="College Banner" class="w-100 h-100" style="object-fit: cover;">

            <!-- Overlay Text -->
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white p-3"
                style="background-color: rgba(0, 0, 0, 0.61); border-radius: 0.25rem;">
                <h2>Bienvenue au Collège Maisonneuve</h2>
                <p>Découvrez la vie étudiante et nos ressources</p>
                <button class="btn btn-outline-primary">En savoir plus</button>
            </div>
        </div>

        <!-- Form -->
        <div class="d-flex flex-fill justify-content-center" style="min-width: 300px; max-width: 600px; flex: 1 1 45%;">
            <form action="{{ route('register.store') }}" method="POST" class="p-4 border shadow bg-light w-100">
                @csrf
                <div class="mb-3">
                    <label for="first_name" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Nom de famille</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                    @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                    @error('birth_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="city_id" class="form-label">Ville</label>
                    <select class="form-select" id="city_id" name="city_id" required>
                        <option value="" disabled selected>Choisir une ville</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Ajouter l'étudiant</button>
            </form>
        </div>

    </div>
</section>

@endsection