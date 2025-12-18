@extends('layouts.main')
@section('judul')
<title>Edit Visi Misi - Aplikasi Surat Desa</title>
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Visi Misi</li>
          </ol>
    

      <div class="card">
          <h4 class="card-header">Edit Visi dan Misi</h4>
              <div class="card-body">
        @foreach ($data as $visimisi)
            <form method="POST" action="{{ url('admindesa/visimisi/update/'. $visimisi->id_visimisi) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="nama_visimisi">Edit Visi</label>
              <textarea class="form-control" rows="3" name='visi'>{{ $visimisi->visi }}</textarea>
            </div>
            <div class="form-group">
                <label for="nama_visimisi">Edit Misi</label>
              <textarea class="form-control" rows="3" name='misi'>{{ $visimisi->misi }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a type="button" class="btn btn-secondary" href="{{ url('admindesa/visimisi') }}">Cancel</a>
        @endforeach
        </form>
        </div> 
     </div>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
    @endsection