@extends('layout.template')

@section('konten')
<!-- FORM SHOW -->   
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <h4 class=""mb-0>Universitas</h4>
                        </div> 
                        <hr>
                        <h4>Nama            : {{ $universitas->nama }}</h4>
                        <p class="tmt-3">
                            Alamat             : {!! $universitas->alamat !!}
                        </p>
                        <p class="tmt-3">
                            No Telpon        : {!! $universitas->no_telpon !!}
                        </p>
                        <p class="tmt-3">
                            Email           : {!! $universitas->email !!}
                        </p>
                        <p class="tmt-3">
                            Akreditasi   : {!! $universitas->akreditasi !!}
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