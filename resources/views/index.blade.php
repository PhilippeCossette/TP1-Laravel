@extends('layouts.master')
@section('title', 'Accueil')
@section('content')
    <h1>Bienvenue sur la page d'accueil</h1>
    <p>Voici la liste des étudiants :</p>
    <ul>
        @foreach($students as $student)
            <li>{{ $student->first_name }} {{ $student->last_name }}</li>
        @endforeach
    </ul>
    <p>Voici la liste des villes :</p>
    <ul>
        @foreach($cities as $city)
            <li>{{ $city->name }}</li>
        @endforeach
    </ul>
@endsection 