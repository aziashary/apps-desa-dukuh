@extends('layouts.main')
@section('judul')
<title>Edit Sejarah - Aplikasi Surat Desa</title>
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
    <!-- <h3 class="mt-4">Tambah sejarah</h3> -->
      <div class="card card-primary">
              <div class="card-header">
                <h1 class="card-title">Edit Tentang Desa</h1>
              </div>
        <div class="card-body">
        @foreach ($data as $sejarah)
            <form method="POST" action="{{ url('admindesa/sejarah/update/'. $sejarah->id_sejarah) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
            <div class="col-md-12">
              <div class="form-group">
                  <label for="isi_sejarah"><strong> Isi sejarah : </strong></label>
                  <textarea class="form-control" id="isi_sejarah" name="isi_sejarah">{{ $sejarah->isi_sejarah}}</textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="nama_sejarah">Ganti Gambar Sejarah</label><br>
                <input type="file" name='gambar_sejarah' />{{ $sejarah->gambar_sejarah }}
              </div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a type="button" class="btn btn-secondary" href="{{ url('sejarah') }}">Cancel</a>
        @endforeach
          </form>
        </div> 
     </div>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
    @endsection