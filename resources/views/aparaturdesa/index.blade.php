@extends('layouts.main')
@section('judul')
<title>Data Aparatur Desa - Aplikasi Surat Desa</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Aparatur Desa</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Tambah Aparatur Desa</h4>
                <div class="card-body">
        <div class="mb-4">
          <div class="btn-group">
              <a href="{{ url('admindesa/aparaturdesa/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data Aparatur Desa</i></a>
          </div>
      </div>
      <table class="table table-striped" id="table1">
          <thead>
                    <tr align="center">
                      <th style="width: 50px">No</th>
                      <th >Nama</th>
                      <th>Jabatan</th>
                      <th>Facebook</th>
                      <th>Instagram</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                        <?php
                        $no = 1;
                        ?>
                  <tbody>
                    
                        @foreach($data as $aparaturdesa)
                            <tr align="center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $aparaturdesa->nama_aparatur }}</td>
                                <td>{{ $aparaturdesa->nama_jabatan }}</td>
                                <td>{{ $aparaturdesa->facebook_aparatur }}</td>
                                <td>{{ $aparaturdesa->instagram_aparatur }}</td>
                                <td><img src="aparaturdesa/fetch_image/{{ $aparaturdesa->id_aparatur }}"  class="img-thumbnail" /></td>
                                <td align="center" >
                                    <a href="{{ URL('admindesa/aparaturdesa/edit/'. $aparaturdesa->id_aparatur) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ URL('admindesa/aparaturdesa/delete/'. $aparaturdesa->id_aparatur) }}" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data {{ $aparaturdesa->nama_aparatur }}?')" class="btn btn-danger">Hapus</a>
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