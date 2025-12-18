@extends('layouts.main')
@section('judul')
<title>Akun Warga- Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('plugin/extensions/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{ asset ('plugin/css/pages/simple-datatables.css')}}">
@endpush
@section('content')

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Akun Warga</li>
            </ol>
      
            
        <div class="card">
            <h4 class="card-header">Data Akun Warga</h4>
                <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                            $no = 1;
                            ?>
                    <tbody>
                        
                    @foreach($data as $warga)
                        <tr>
                            <td style="width: 70px;">{{ $no++ }}</td>
                            <td>{{ $warga->username }}</td>
                            <td style="width: 400px;">{{ $warga->name }}</td>
                            <td align="center" style="width: 200px;" >
                                    <button type="button" class="btn btn-primary" data-id="{{ $warga->id_warga }}" data-bs-toggle="modal" 
                                        data-bs-target="#confirmModal{{ $warga->id_warga }}">
                                        Edit
                                    </button>
                                <a href="#" class="btn btn-danger" onclick="confirmDelete('{{ URL('admindesa/warga/delete/' . $warga->id_warga) }}')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
        </div>
    </div>
 
</section>
</div>

@foreach($data as $warga)
<!-- Modal -->
<div class="modal fade" id="confirmModal{{ $warga->id_warga }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Akun Warga </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ url('admindesa/akun/updatewarga/'. $warga->id_warga) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
        <div class="modal-body">
            <h6>Nama : </h6>
            <div class="form-group">
                <input type="text" class="form-control"  name="name" value="{{ $warga->name }}"  maxlength="100" readonly>
            </div>
            <br>
            <h6>NIK : </h6>
            <div class="form-group">
                <input type="text" class="form-control" name="username"  value="{{ $warga->username}}"  maxlength="100" readonly>
            </div>
            <br>
            <h6>Password :</h6>
            <small class='text-muted'><i>Minimal 8 Karakter</i></small>
            <div class="form-group">
                <input type="password" class="form-control" name="password" minlength="8" maxlength="50" required>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success me-1 mb-1" onclick="return confirm('Apakah Anda yakin ingin merubah password akun warga yang bersangkutan?')">Submit</button>
        </div>
            </form>
        </div>
    </div>
  </div>
@endforeach

@endsection
@push('js')
<script src="{{ asset ('plugin/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="{{ asset ('plugin/js/pages/simple-datatables.js')}}"></script>
<script>
    function confirmDelete(url) {
      // Tampilkan prompt dialog
      var confirmation = confirm("Apakah Anda yakin ingin menghapus data ini? Semua data diri yang bersangkutan akan ikut terhapus.");
      
      // Jika pengguna memilih "OK" (Iya)
      if (confirmation) {
        // Lakukan penghapusan dengan mengarahkan ke URL
        window.location.href = url;
      } else {
        // Jika pengguna memilih "Cancel" (Tidak), tidak ada tindakan yang diambil
      }
    }
</script>
@endpush