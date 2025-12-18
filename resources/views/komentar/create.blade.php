@extends('layouts.backoffice')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content -->
  
    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admindesa/SKU') }}">Data Komentar</a></li>
            </ol>
      
  
        <div class="card">
            <h4 class="card-header">Data Komentar</h4>
                <div class="card-body">         

            <form method="POST" action="{{ url('admindesa/komentar/store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_aparatur">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label for="nama_aparatur">email</label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="facebook_aparatur">subjek</label>
                <input type="text" class="form-control" name="subjek" >
            </div>
            <div class="form-group">
                <label for="instagram_aparatur">Text</label>
                <textarea class="form-control" name="komentar" ></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a type="button" class="btn btn-secondary" href="{{ route('komentar.index') }}">Cancel</a>
        </div>
        </form>
       
    </div>
</div>
    @endsection