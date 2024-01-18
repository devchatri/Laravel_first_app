@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
    <h1 class="mb-0">Add Etudiant</h1>
    <hr />
    <form action="{{ route('etudiants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nom" class="form-control" placeholder="Nom">
            </div>
            <div class="col">
                <input type="text" name="prenom" class="form-control" placeholder="Prenom">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="sexe" class="form-control" placeholder="Sexe">
            </div>
            <div class="col">
                <input type="number" name="filiere_id" class="form-control" placeholder="Filiere_id">
            </div>
            
        </div>
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection