@extends('layouts.main')
@section('judul')
<title>Sejarah Desa - Aplikasi Surat Desa</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sejarah Desa</h1>
          </div>
          @foreach($data as $sejarah)
          
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb float-sm-right">
                <div class="btn-group">
                  <a href="{{ url('sejarah/edit/'. $sejarah->id_sejarah) }}" class="center btn btn-gradient btn-primary" title="edit">Edit</i></a>
                </div>
              </ol>
            </nav>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

<div class="row">
  <div class="col-md-6">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-exclamation-triangle"></i>
          Foto Sejarah
        </h3>
      </div>
      
      <div class="card-body">
        <img class="img-fluid pad" src="/sejarah/fetch_image/{{ $sejarah->id_sejarah }}" alt="Photo">
      </div>
      
    </div>
  </div>

  <div class="col-md-6">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-bullhorn"></i>
          Tentang Desa
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="callout callout-primary">
          <h5>Isi sejarah desa</h5>

          <p>{{ $sejarah->isi_sejarah }}</p>
        </div>
      </div>
      
    </div>
  </div>
  
  
   @endforeach
</div>
</div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endsection