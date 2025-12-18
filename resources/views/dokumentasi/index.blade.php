@extends('layouts.main')
@section('judul')
<title>Dokumentasi - Aplikasi Surat Desa</title>
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Dokumentasi</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Tambah Dokumentasi</h4>
                <div class="card-body">
              <div class="mb-4">
                  <div class="btn-group">
                      <a href="{{ url('admindesa/dokumentasi/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Dokumentasi</i></a>
                  </div>
              </div>
              <table class="table table-striped" id="table1">
                  <thead>
                    <tr align="center">
                      <th style="width: 50px">No</th>
                      <th>Nama</th>
                      <th>Kategori</th>
                      <th>Foto Headline</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                        <?php
                        $no = 1;
                        ?>
                  <tbody>
                    
                        @foreach($data as $dokumentasi)
                            <tr align="center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $dokumentasi->nama_dokumentasi }}</td>
                                <td>{{ $dokumentasi->kategori_dokumentasi }} Desa</td>
                                <td><img src="dokumentasi/fetch_image/{{ $dokumentasi->id_dokumentasi }}"  class="img-thumbnail" width="200" height="200" /></td>
                                <td align="center" >
                                  <a href="{{ URL('dokumentasi/detail/'. $dokumentasi->id_dokumentasi) }}" class="btn btn-primary">+Foto</a>
                                    <a href="{{ URL('dokumentasi/edit/'. $dokumentasi->id_dokumentasi) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ URL('dokumentasi/delete/'. $dokumentasi->id_dokumentasi) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
            </div>
        </div>
  </section>
</div>


    </section>
    <!-- /.content -->
    @endsection