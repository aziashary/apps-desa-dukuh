@extends('layouts.main')
@section('judul')
<title>Tambah Jabatan - Aplikasi Surat Desa</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admindesa/jabatan') }}">Data Jabatan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Jabatan</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Tambah Jabatan</h4>
                <div class="card-body">
            <form method="POST" action="{{ url('admindesa/jabatan/store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="nama_jabatan">Nama Jabatan</label>
                <input type="text" class="form-control" name="nama_jabatan" required>
            </div>
            <div class="form-group mb-3">
                <label for="kategori_jabatan">Jabatan</label>
                <select class="form-control" name='id_kategori_jabatan'>
                <option value='' selected disabled>Pilih Kategori Jabatan</option>
                    <option value='JBTN1'>Aparatur Desa</option>
                    <option value='JBTN2'>BPD</option>
                    <option value='JBTN3'>RT/RW</option>
                    <option value='JBTN4'>LINMAS</option>
                    <option value='JBTN5'>LPM</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a type="button" class="btn btn-secondary" href="{{ url('admindesa/jabatan') }}">Cancel</a>
        </form>
    </div> 
</div>
</div>
</div>
</section>
    @endsection