@extends('layouts.master')
@section('title', 'Enregistrer vous!')
@section('content')


<section class="login-section">
    <img class="background-img" src="https://www.cmaisonneuve.qc.ca/public/uploads/2025/09/CM-25042023_Inauguration-jardin_S300dpi_IMG2568.jpg.webp" alt="Maisonneuve College">

    <div class="form-login-container">
        <h1>Connecte-toi au Portail Étudiant</h1>
        <p>Connecte-toi pour accéder aux devoirs, notes, et plus encore.</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @error('error')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label form-label-light">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{old('email')}}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label form-label-light">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>

        </form>
    </div>
    <a href="{{ route('register') }}" class="btn btn-link-custom">Pas de compte? Créez-en un</a>

</section>





@endsection