@extends('layouts.app')
  
@section('title', 'Edit Etudiant')
  
@section('contents')
    <h1 class="mb-0">Edit Etudiant</h1>
    <hr />
    <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ $etudiant->nom }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="{{ $etudiant->prenom }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Sexe</label>
                <input type="text" name="sexe" class="form-control" placeholder="Sexe" value="{{ $etudiant->sexe }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Filiere</label>
                <input type="text" name="filiere_id" class="form-control" placeholder="Filiere" value="{{ $etudiant->filiere_id }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection