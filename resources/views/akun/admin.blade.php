@extends('layouts.main')
@section('judul')
<title>Akun Admin Aparatur Desa- Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('plugin/extensions/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{ asset ('plugin/css/pages/simple-datatables.css')}}">
<link rel="stylesheet" href="{{ asset ('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush
@section('content')

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Akun Admin Aparatur Desa</li>
            </ol>
      
            
        <div class="card">
            <h4 class="card-header">Data Akun Admin Aparatur Desa</h4>
                <div class="card-body">

                    <div class="btn-group mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                            data-bs-target="#tambahAkses">
                            Tambah Akses Baru
                        </button>
                    </div>
                   
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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                            $no = 1;
                            ?>
                    <tbody>
                        
                    @foreach($data as $aparatur)
                        <tr>
                            <td style="width: 70px;">{{ $no++ }}</td>
                            <td>{{ $aparatur->name }}</td>
                            <td style="width: 400px;">{{ $aparatur->username }}</td>
                            <td align="center" style="width: 400px;" >
                                    <button type="button" class="btn btn-primary" data-id="{{ $aparatur->id_aparatur }}" data-bs-toggle="modal" 
                                        data-bs-target="#confirmModal{{ $aparatur->id_aparatur }}">
                                        Edit
                                    </button>
                                <a href="#" class="btn btn-danger" onclick="confirmDelete('{{ URL('admindesa/akun/delete/' . $aparatur->id_aparatur) }}')">Hapus Akses</a>
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

<!-- Modal Tambah Akses -->
<div class="modal fade" id="tambahAkses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Akses Akun Admin </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ url('admindesa/akun/store') }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <h6>Nama Aparatur Desa : </h6>
            <select class="choices form-select" name="id_aparatur">
                    <option value="disabled" disabled> -- Pilih atau Ketik Nama Aparatur Desa --</option>
                @foreach($aparaturdesa as $keys)
                    <option value="{{ $keys->id_aparatur}}">{{ $keys->nama_aparatur }} - {{ $keys->nama_jabatan}}</option>
                @endforeach
            </select>
            <h6>Username : </h6>
            <small class='text-muted'><i>Minimal 5 Karakter</i></small>
            {{-- <small class='text-muted'><i>Pengisian username tidak boleh menggunakan spasi.</i></small> --}}
            <div class="form-group">
                <input type="text" class="form-control" name="username"   minlength="5" maxlength="50"  oninput="validateInput(this)">
            </div>
            <br>
            <h6>Password :</h6>
            <small class='text-muted'><i>Minimal 8 Karakter</i></small>
            <div class="form-group">
                <input type="password" class="form-control" name="password" minlength="8" maxlength="50" required>
            </div>
            <br>
            <small class='text-muted'><i>*Jika nama aparatur desa tidak ada, dipastikan nama tersebut sudah mendapatkan akses Admin</i></small>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success me-1 mb-1" onclick="return confirm('Apakah Anda yakin ingin memberi akses akun admin ini?')">Submit</button>
        </div>
            </form>
        </div>
    </div>
    
</div>

<!-- Modal Edit Akses -->
@foreach($data as $aparatur)
<div class="modal fade" id="confirmModal{{ $aparatur->id_aparatur }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Akun Admin </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ url('admindesa/akun/updateadmin/'. $aparatur->id_aparatur) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
        <div class="modal-body">
            <h6>Nama : </h6>
            <div class="form-group">
                <input type="text" class="form-control"  name="name" value="{{ $aparatur->name }}"  maxlength="100" readonly>
            </div>
            <br>
            <h6>Username : </h6>
            <small class='text-muted'><i>Minimal 5 Karakter</i></small>
            <small class='text-muted'><i>Pengisian username tidak boleh menggunakan spasi.</i></small>
            <div class="form-group">
                <input type="text" class="form-control" name="username"  value="{{ $aparatur->username}}"  minlength="5" maxlength="50"  oninput="validateInput(this)">
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
            <button type="submit" class="btn btn-success me-1 mb-1" onclick="return confirm('Apakah Anda yakin ingin merubah data akun admin ini?')">Submit</button>
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
<script src="{{ asset ('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset ('assets/js/pages/form-element-select.js') }}"></script>

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

<script>
    function validateInput(inputElement) {
      var inputValue = inputElement.value;
    
      // Cek apakah terdapat spasi pada nilai input
      if (inputValue.indexOf(' ') !== -1) {
        alert("Pengisian username tidak boleh menggunakan spasi.");
        // Hapus spasi dari nilai input
        inputElement.value = inputValue.replace(/\s/g, '');
      }
    }
    </script>
@endpush