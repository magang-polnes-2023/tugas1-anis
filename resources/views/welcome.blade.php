@extends('layout.template')

@section('konten')
<nav class=" my-3 p-3 bg-body navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('mahasiswa.index')}}">Mahasiswa</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="{{route('universitas.index')}}">Universitas</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <h1 class="text-center">Welcome</h1>
    <h2 class="text-center">CRUD Mahasiswa dan Universitas</h2>
@endsection