@extends('layouts.main')
@section('judul')
<title>Detail Komentar - Aplikasi Surat Desa</title>
@endsection
@section('content')
<li class="breadcrumb-item"><a href="{{ url('admindesa/SKU') }}">Data Komentar</a></li>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admindesa/komentar') }}">Data Komentar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Komentar</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Detail Komentar</h4>
                <div class="card-body">
        @foreach ($data as $komentar)
            <form method="POST" action="{{ url('admindesa/komentar/update/'. $komentar->id_komentar) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
            <div class="w-50">
            <div class="form-group">
                <label for="nama_aparatur">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $komentar->nama }}" readonly>
            </div>
            <div class="form-group">
                <label for="nama_aparatur">email</label>
                <input type="text" class="form-control" name="email" value="{{ $komentar->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="facebook_aparatur">Subjek</label>
                <input type="text" class="form-control" name="subjek" value="{{ $komentar->subjek }}" readonly>
            </div>
            </div>
            <div class="form-group">
                <label for="instagram_aparatur">Komentar</label>
                <textarea class="form-control" name="komentar" readonly>{{ $komentar->komentar }}</textarea>
            </div>
            <a type="button" class="btn btn-secondary" href="{{ route('komentar.index') }}">Kembali</a>
            @endforeach
        </form>
        </div> 
     </div>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
    @endsection