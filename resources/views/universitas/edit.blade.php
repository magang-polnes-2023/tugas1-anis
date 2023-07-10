@extends('layout.template')

    <!-- NAVBAR -->
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
    <!-- END -->

    <!-- START FORM -->
    <form action="{{ route('universitas.update', $universitas->id) }}" method='post' enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert" id="danger-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                setTimeout(function() => {
                    var succsesAlert = document.getElementById('danger-alert');
                    succsesAlert.style.display = 'none';
                }, 5000);
            </script>
        @endif
        @method('PUT')
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Universitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama" value="{{$universitas->nama}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' id="alamat" value="{{$universitas->alamat}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_telpon" class="col-sm-2 col-form-label">No Telpon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='no_telpon' id="no_telpon" value="{{$universitas->no_telpon}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='email' id="email" value="{{$universitas->email}}">
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Akreditasi</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="akreditasi" id="akreditasi1" value="A"{{$universitas->akreditasi == 'A' ? 'checked' : ''}}>
                    <label class="form-check-label" for="akreditasi1">
                      A
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="akreditasi" id="akreditasi2" value="B"{{$universitas->akreditasi == 'B' ? 'checked' : ''}}>
                    <label class="form-check-label" for="akreditasi2">
                      B
                    </label>
                  </div>
                  <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="akreditasi" id="akreditasi3" value="C"{{$universitas->akreditasi == 'C' ? 'checked' : ''}}>
                    <label class="form-check-label" for="akreditasi3">
                      C
                    </label>
                  </div>
                </div>
              </fieldset>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN PERUBAHAN</button></div>
            </div>
        </div>
    </form>
    @endsection
    
    <!-- AKHIR FORM -->
           