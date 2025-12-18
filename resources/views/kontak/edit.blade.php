@extends('layouts.main')
@section('judul')
<title>Edit Kontak - Aplikasi Surat Desa</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        
<div class="container-fluid">
    <!-- <h3 class="mt-4">Tambah kontak</h3> -->
      <div class="card card-primary">
              <div class="card-header">
                <h1 class="card-title">Edit Kontak</h1>
              </div>
        <div class="card-body">
        @foreach ($data as $kontak)
            <form method="POST" action="{{ url('admindesa/kontak/update/'. $kontak->id_kontak) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name=alamat value="{{ $kontak->alamat }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name=email value="{{ $kontak->email }}">
            </div>
            <div class="form-group">
                <label for="no_telepon">No telepon</label>
                <input type="text" class="form-control" name=no_telepon value="{{ $kontak->no_telepon}}">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" class="form-control" name=instagram value="{{ $kontak->jumlah_instagram }}">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control" name=facebook value="{{ $kontak->facebook }}">
            </div>
            <div class="form-group">
                <label for="whatsapp">Whatsapp</label>
                <input type="text" class="form-control" name=whatsapp value="{{ $kontak->whatsapp }}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a type="button" class="btn btn-secondary" href="{{ url('admindesa/kontak') }}">Cancel</a>
            @endforeach
        </form>
        </div> 
     </div>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
    @endsection