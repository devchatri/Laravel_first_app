@extends('layouts.app')
  
@section('title', 'Create Filiere')
  
@section('contents')
    <h1 class="mb-0">Add Filiere</h1>
    <hr />
    <form action="{{ route('filieres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Nom">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection