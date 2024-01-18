@extends('layouts.app')
  
@section('title', 'Etudiant')
  
@section('contents')
    <h1 class="mb-0">Detail Etudiant</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ $etudiant->nom }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="{{ $etudiant->prenom }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Sexe</label>
            <input type="text" name="sexe" class="form-control" placeholder="Sexe" value="{{ $etudiant->sexe }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Filiere</label>
            <input type="text" name="filiere_id" class="form-control" placeholder="filiere_id" value="{{ $etudiant->filiere_id }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $etudiant->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $etudiant->updated_at }}" readonly>
        </div>
    </div>
@endsection