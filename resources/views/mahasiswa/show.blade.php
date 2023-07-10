@extends('layout.template')

@section('konten')
<!-- FORM SHOW -->   
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <h4 class=""mb-0>Data Mahasiswa</h4>
                        </div> 
                        <img src="{{ asset('storage/post/'.$mahasiswa->image) }}" class="w-30 rounded">
                        <hr>
                        <h4>Nama Universitas           : {{ $mahasiswa->universitas->nama }}</h4>
                        <p class="tmt-3">
                            Nama              : {!! $mahasiswa->nama !!}
                        </p>
                        <p class="tmt-3">
                            Nim             : {!! $mahasiswa->nim !!}
                        </p>
                        <p class="tmt-3">
                            Umur         : {!! $mahasiswa->umur !!}
                        </p>
                        <p class="tmt-3">
                            Alamat            : {!! $mahasiswa->alamat !!} Tahun
                        </p>
                        <p class="tmt-3">
                            No Telpon   : {!! $mahasiswa->no_telpon !!}
                        </p>
                        <p class="tmt-3">
                            Tanggal Lahir  : {!! $mahasiswa->tanggal_lahir !!}
                        </p>
                        <p class="tmt-3">
                            Jenis Kelamin         : {!! $mahasiswa->jenis_kelamin !!}
                        </p>
                        <div class="d-grid">
                            <button onclick="history.back()" class="btn btn-secondary">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END FORM SHOW -->
@endsection