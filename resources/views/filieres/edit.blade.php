@extends('layouts.app')
  
@section('title', 'Edit Filiere')
  
@section('contents')
    <h1 class="mb-0">Edit Filiere</h1>
    <hr />
    <form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" placeholder="Nom" value="{{ $filiere->name }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection