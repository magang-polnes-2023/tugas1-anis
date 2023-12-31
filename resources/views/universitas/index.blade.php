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
                  <a href="{{route('universitas.create')}}" class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">Email</th>
                            <th class="col-md-2">Akreditasi</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($universitas->count() > 0)
                        @foreach ($universitas as $data)
                            <tr>
                                <td class="text-middle">{{ $loop->iteration }}</td>
                                <td class="text-middle">{{ $data->nama }}</td>
                                <td class="text-middle">{{ $data->alamat }}</td>
                                <td class="text-middle">{{ $data->email }}</td>
                                <td class="text-middle">{{ $data->akreditasi }}</td>
                                <td>
                                    <form onsubmit="return confirm('Menghapus Data?');"
                                        action="{{ route('universitas.destroy', $data->id) }}" method="POST">
                                        <a href="{{ route('universitas.show', $data->id) }}" type="button"
                                            class="btn btn-warning btn-sm">Show</a>
                                        <a href="{{ route('universitas.edit', $data->id) }}" type="button"
                                            class="btn btn-dark btn-sm">Edit</a>
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
                            <td class="text-center" colspan="6">Tidak Ada Data Universitas</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
               
          </div>
    @endsection
   
    <!-- AKHIR DATA -->
            