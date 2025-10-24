@extends('layouts.master')
@section('title', 'Liste des étudiants')
@section('content')

<section>
    <div class="container py-4 max-1200">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-4">Liste des étudiants</h1>
        </div>
        <div class="row g-4">
            @foreach ($students as $student)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title"><span>{{ $student->last_name }}</span> {{ $student->first_name }}</h5>
                        <small>{{ $student->city->name }}</small>
                    </div>
                    <div class="card-body text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                            alt="Portrait" class="img-fluid rounded-circle" style="max-width: 100px;">
                    </div>
                    <div class="sliding-card-footer card-footer d-flex justify-content-between">
                        <button onclick="window.location='{{ route('students.show', $student->id) }}'" class="btn btn-outline-primary btn-sm">Voir les détails</button>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $students }}
        </div>
    </div>
</section>

@endsection