@extends('layouts.main')
@section('judul')
<title>Tambah Surat Keterangan - Aplikasi Surat Desa</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admindesa/SK') }}">Data Surat Keterangan </a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Surat Keterangan </li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Tambah Surat Keterangan </h4>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="btn-group">
                            <a href="{{ url('admindesa/warga/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data Warga </i></a>
                        </div>
                        <br>
                    </div>
                    <form method="POST" action="{{ url('admindesa/SK/store') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h6>Nama Warga / yang Mengajukan Surat</h6>
                            <div class="form-group">
                                <select class="choices form-select" name="id_warga_1">
                                        @foreach($data as $warga)
                                    <option value="{{ $warga->id_warga }}">{{ $warga->nama_warga }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <h6>Jenis Surat yang diajukan</h6>
                            <div class="form-group">
                                <select class="choices form-select" id="kode_sk" name="kode_sk" required>
                                    <option value="">-- Pilih Keterangan Surat --</option>
                                        @foreach($item as $kodesk)
                                    <option value="{{ $kodesk->kode_sk}}">{{ $kodesk->jenis_sk }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div id="formInputContainer"></div>                 
                                {{-- <h6>Keterangan 1:</h6>
                                <small class="text-muted"><i>Maks. 100 Karakter</i></small>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="keterangan_1" name="keterangan_1" maxlength="100" required>
                                </div>
                            <br>               
                                <h6>Keterangan 2:</h6>
                                <small class="text-muted"><i>Maks. 100 Karakter</i></small>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="keterangan_2" name="keterangan_2"  maxlength="100" required>
                                </div>
                            <br> 
                                <h6>Keterangan 3:</h6>
                                <small class="text-muted"><i>Maks. 100 Karakter</i></small>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="keterangan_4" name="keterangan_4"  maxlength="100" required>
                                </div>
                            <br>
                                <h6>Keterangan 4:</h6>
                                    <small class="text-muted"><i>Maks. 100 Karakter</i></small>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="keterangan_4" name="keterangan_4"  maxlength="100" required>
                                    </div>
                            <br>  --}}
                            <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                            <a href="{{ url('admindesa/SK') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="{{ asset ('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset ('assets/js/pages/form-element-select.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Menangkap perubahan nilai form select
    $('#kode_sk').on('change', function() {
    var jenisSkId = $(this).val(); // Mengambil nilai yang dipilih
    // Mengirim permintaan Ajax ke URL endpoint yang sesuai
    $.ajax({
        url: '/get-form-input', // URL endpoint yang sesuai
        type: 'GET',
        data: {jenis_sk_id: jenisSkId},
        success: function(response) {
            // Menampilkan form input otomatis dalam container
            $('#formInputContainer').html(response);
        },
        error: function() {
            alert('Terjadi kesalahan. Silakan coba lagi.');
        }
    });
});
</script>
@endpush
