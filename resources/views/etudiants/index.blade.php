@extends('layouts.app')
  
@section('title', 'Etudiants')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Etudiant</h1>
        <a href="{{ route('etudiants.create') }}" class="btn btn-primary">Add etudiant</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>nom</th>
                <th>Prenom</th>
                <th>Sexe</th>
                <th>Filiere</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($etudiants->count() > 0)
                @foreach($etudiants as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->nom }}</td>
                        <td class="align-middle">{{ $rs->prenom }}</td>
                        <td class="align-middle">{{ $rs->sexe }}</td>
                        <td class="align-middle">{{ $rs->filiere ? $rs->filiere->name : 'N/A' }}</td> 
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('etudiants.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('etudiants.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('etudiants.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection