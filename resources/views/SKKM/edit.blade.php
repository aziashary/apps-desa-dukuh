@extends('layouts.main')
@section('judul')
<title>Edit Surat Keterangan Miskin - Aplikasi Surat Desa</title>
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
                <li class="breadcrumb-item"><a href="{{ url('admindesa/SKKM') }}">Data Surat Keterangan Miskin </a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Surat Keterangan Miskin</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Edit Surat Keterangan Miskin</h4>

                @foreach($data as $skkm)
                <div class="card-body">
                    <form method="POST" action="{{ url('admindesa/SKKM/update/'. $skkm->id_skkm) }}" enctype="multipart/form-data">
                        @csrf {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h6>Nama Warga / yang Mengajukan Surat</h6>
                            <div class="form-group">
                                <select class="choices form-select" name="id_warga">
                                    <option value="{{ $skkm->wargas->id_warga }}">{{ $skkm->wargas->nama_warga }}</option>
                                        @endforeach
                                        @foreach($item as $warga)
                                    <option value="{{ $warga->id_warga }}">{{ $warga->nama_warga }}</option>
                                        @endforeach
                                        @foreach($data as $skkm)
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">                
                                <h6>Keterangan Bahwa Pengaju Surat ini :</h6>
                                <small class="text-muted"><i>Maks. 100 Karakter</i></small>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $skkm->keterangan }}" required>
                                </div>
                            <br>               
                                <h6>Usulan Surat Keterangan Ini Dipergunakan Untuk :</h6>
                                <small class="text-muted"><i>Maks. 100 Karakter</i></small>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="usulan_surat" name="usulan_surat" value="{{ $skkm->usulan_surat }}" required>
                                </div>
                            <br> 
                                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                <a type="button" class="btn btn-secondary me-1 mb-1" href="{{ url('SKKM') }}">Cancel</a>
                                @endforeach
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection

@push('js')
<script src="{{ asset ('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset ('assets/js/pages/form-element-select.js') }}"></script>
@endpush
