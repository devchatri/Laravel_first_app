@extends('layouts.app')
  
@section('title', 'Filiere')
  
@section('contents')
    <h1 class="mb-0">Detail Filiere</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" placeholder="Nom" value="{{ $filiere->name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $filiere->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $filiere->updated_at }}" readonly>
        </div>
    </div>
@endsection