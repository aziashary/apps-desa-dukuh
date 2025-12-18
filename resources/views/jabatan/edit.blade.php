@extends('layouts.main')
@section('judul')
<title>Edit Jabatan - Aplikasi Surat Desa</title>
@endsection
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Warga Desa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admindesa/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admindesa/jabatan') }}">Data Jabatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Jabatan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
<section class="section">
    <div class="row mb-2">
        <div class="col-md-1"></div>
            <div class="col-md-10">
      <div class="card">
              <div class="card-header">
                <h1 class="card-title">Edit Jabatan desa</h1>
              </div>
              <div class="card-body">
            @foreach ($data as $jabatan)
            <form method="POST" action="{{ url('admindesa/jabatan/update/'. $jabatan->id_jabatan) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
            <div class="form-group mb-3">
                <label for="nama_jabatan">Nama Jabatan</label>
                <input type="text" class="form-control" name="nama_jabatan" value="{{ $jabatan->nama_jabatan}}" required>
            </div>
            <div class="form-group mb-3">
                <label for="kategori_jabatan">Kategori Jabatan</label>
                <select class="form-control" name='id_kategori_jabatan'>
                <option value='{{ $jabatan->id_kategori_jabatan}}'>{{ $jabatan->kategori_jabatan}}</option>
                @endforeach
                    <option value='JBTN1'>Aparatur Desa</option>
                    <option value='JBTN2'>BPD</option>
                    <option value='JBTN3'>RT/RW</option>
                    <option value='JBTN4'>LINMAS</option>
                    <option value='JBTN5'>LPM</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a type="button" class="btn btn-secondary" href="{{ url('admindesa/jabatan') }}">Cancel</a>
          </form>
        </div> 
    </div>
    </div>
    </div>
    </section>
    @endsection