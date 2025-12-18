@extends('layouts.main')
@section('judul')
<title>Edit Surat Keterangan - Aplikasi Surat Desa</title>
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
                @foreach($data as $sk)
                <div class="card-body">
                    <form method="POST" action="{{ url('admindesa/SK/update/'. $sk->id_sk) }}" enctype="multipart/form-data">
                        @csrf {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h6>Nama Warga / yang Mengajukan Surat</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" value="{{ $sk->wargas->nama_warga }}" readonly>
                            </div>
                        </div>
                

                    @foreach($kode as $kodesk)
                        <div class="col-md-12 mb-4">
                            <h6>{{ $kodesk->keterangan_1 }} </h6>
                                <small class='text-muted'><i>Maks. 100 Karakter</i></small>
                                <div class='form-group'>
                                    <input type='text' class='form-control' id='keterangan_1' name='keterangan_1' value="{{ $sk->keterangan_1 }}" maxlength='100' required>
                                </div>
                            <br>
                            
                            @if(isset($kodesk->keterangan_2))
                            <h6>{{ $kodesk->keterangan_2 }}</h6>
                                <small class='text-muted'><i>Maks. 100 Karakter</i></small>
                                <div class='form-group'>
                                    <input type='text' class='form-control' id='keterangan_2' name='keterangan_2' value="{{ $sk->keterangan_2 }}"  maxlength='100' required>
                                </div>
                                <br>
                            @endif

                            @if(isset($kodesk->keterangan_3))
                            <h6>{{ $kodesk->keterangan_3 }}</h6>
                                <small class='text-muted'><i>Maks. 100 Karakter</i></small>
                                <div class='form-group'>
                                    <input type='text' class='form-control' id='keterangan_3' name='keterangan_3' value="{{ $sk->keterangan_3 }}"  maxlength='100' required>
                                </div>
                                <br>
                            @endif

                            @if(isset($kodesk->keterangan_4))    
                            <h6>{{ $kodesk->keterangan_4 }}</h6>
                                <small class='text-muted'><i>Maks. 100 Karakter</i></small>
                                <div class='form-group'>
                                    <input type='text' class='form-control' id='keterangan_4' name='keterangan_4' value="{{ $sk->keterangan_4 }}" maxlength='100' required>
                                </div>
                                <br>
                            @endif
                            @endforeach
                            <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                            <a href="{{ url('admindesa/SK') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                     @endforeach
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
@endpush
