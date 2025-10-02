@extends('layouts.master')
@section('title', 'Details de l\'étudiant')
@section('content')


<section>
    <div class="container max-1200 py-4">
        <header class="d-flex align-items-center mb-4 gap-3">
            <img class="rounded-pill" style="max-width: 100px;" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt="">
            <div>
                <button onclick="window.location.href='{{ route('students.edit', $student->id) }}'" class="btn btn-primary">Modifier</button>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </header>
        <div class="d-flex flex-column gap-2">
            <div>
                <p class="form-label">Prenom</p>
                <span class="form-control">{{ $student->first_name }} </span>
            </div>
            <div>
                <p class="form-label">Nom</p>
                <span class="form-control">{{ $student->last_name }} </span>
            </div>
            <div>
                <p class="form-label">Email</p>
                <span class="form-control">{{ $student->email }} </span>
            </div>
            <div>
                <p class="form-label">Téléphone</p>
                <span class="form-control">{{ $student->phone_number }} </span>
            </div>
            <div>
                <p class="form-label">Date de naissance</p>
                <span class="form-control">{{ $student->birth_date }} </span>
            </div>
            <div>
                <p class="form-label">Adresse</p>
                <span class="form-control">{{ $student->address }} </span>
            </div>
            <div>
                <p class="form-label">Ville</p>
                <span class="form-control">{{ $student->city->name }} </span>
            </div>
            <div>
                <p class="form-label">Pays</p>
                <span class="form-control">{{ $student->city->country }} </span>
            </div>
        </div>
    </div>

</section>


@endsection