@extends('layouts.main')
@section('judul')
<title>Komentar - Aplikasi Surat Desa</title>
@endsection
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
      <div class="mb-4">
      </div>
        <div class="row">
        <div class="col-md-12">
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr align="center">
                      <th style="width: 50px">No</th>
                      <th style="width: 150px">Nama</th>
                      <th style="width: 150px">Email</th>
                      <th style="width: 150px">Subjek</th>
                      <th>Pesan dan Komentar</th>
                      <th style="width: 180px">Aksi</th>
                    </tr>
                  </thead>
                        <?php
                        $no = 1;
                        ?>
                  <tbody>
                    
                        @foreach($data as $komentar)
                            <tr align="center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $komentar->nama }}</td>
                                <td>{{ $komentar->email }}</td>
                                <td>{{ $komentar->subjek }}</td>
                                <td>{{ $komentar->komentar }}</td>
                                <td align="center" >
                                    <a href="{{ URL('komentar/detail/'. $komentar->id_komentar) }}" class="btn btn-success">Detail</a>
                                    <a href="{{ URL('komentar/delete/'. $komentar->id_komentar) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              <!-- /.card-body -->
            </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div> 
        </div> 
      </div>
</div>
    </section>
    <!-- /.content -->
    @endsection