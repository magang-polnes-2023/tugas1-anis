<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
    
    @if (Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        </div>
    @endif

    <!-- NAVBAR -->
    <nav class=" my-3 p-3 bg-body navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Mahasiswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#">Universitas</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
    <!-- END -->
        
    <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Image</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-2">NIM</th>
                            <th class="col-md-2">Tanggal Lahir</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($mahasiswa->count() > 0)
                        @foreach ($mahasiswa as $data)
                            <tr>
                                <td class="text-middle">{{ $loop->iteration }}</td>
                                <td class="text-middle">
                                    <img src="{{ asset('/storage/posts/' . $data->image) }}" class="rounded"
                                        style="width:70px">
                                </td>
                                <td class="text-middle">{{ $data->nama }}</td>
                                <td class="text-middle">{{ $data->nim }}</td>
                                <td class="text-middle">{{ $data->tanggal_lahir }}</td>
                                <td>
                                    <form onsubmit="return confirm('Menghapus Data?');"
                                        action="{{ route('mahasiswa.destroy', $data->id) }}" method="POST">
                                        <a href="{{ route('mahasiswa.show', $data->id) }}" type="button"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('mahasiswa.edit', $data->id) }}" type="button"
                                            class="btn btn-dark btn-sm">Show</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submin" class="btn btn-sm btn-danger">DELETE</button>
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="6">Tidak Ada Data Mahasiswa</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
               
          </div>
    <!-- AKHIR DATA -->
            </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
   