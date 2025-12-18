@extends('layouts.main')
@section('judul')
<title>Data Jabatan Desa - Aplikasi Surat Desa</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Jabatan</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Data Jabatan</h4>
                <div class="card-body">
        <div class="mb-4">
          <div class="btn-group">
              <a href="{{ url('admindesa/jabatan/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data Jabatan</i></a>
          </div>
      </div>
      <table class="table table-striped" id="table1">
                  <thead>
                    <tr align="center">
                      <th style="width: 50px">No</th>
                      <th>Nama Jabatan</th>
                      <th>Kategori Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                        <?php
                        $no = 1;
                        ?>
                  <tbody>
                    
                        @foreach($data as $jabatan)
                            <tr align="center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $jabatan->nama_jabatan }}</td>
                                <td>{{ $jabatan->kategori_jabatan }}</td>
                                <td align="center" >
                                    <a href="{{ URL('admindesa/jabatan/edit/'. $jabatan->id_jabatan) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ URL('admindesa/jabatan/delete/'. $jabatan->id_jabatan) }}" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus jabatan {{ $jabatan->nama_jabatan }}?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        
        </section>
    <!-- /.content -->
    @endsection