@extends('layouts.main')
@section('judul')
<title>Visi Misi - Aplikasi Surat Desa</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Visi dan Misi</li>
          </ol>
    

      <div class="card">
          <h4 class="card-header">Visi dan Misi</h4>
              <div class="card-body">
                <div class="callout callout-success">
                @foreach($data as $visimisi)
                  <h3>Visi</h3>
                  <p>{{$visimisi->visi}}</p>
                </div>
                <div class="callout callout-info">
                  <h3>Misi</h3>
                  <p>{{$visimisi->misi}}</p>
                </div>
                <a type="button" class="btn btn-primary" href="{{ url('visimisi/edit/'. $visimisi->id_visimisi) }}"><i class="fas fa-edit"></i>Edit</a>
                </a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div> 
        </div> 
        @endforeach
      </div>
</div>
    </section>
    <!-- /.content -->
    @endsection