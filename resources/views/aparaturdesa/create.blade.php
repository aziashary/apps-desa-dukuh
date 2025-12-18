@extends('layouts.main')
@section('judul')
<title>Tambah Aparatur Desa - Aplikasi Surat Desa</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admindesa/aparaturdesa') }}">Data Aparatur Desa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Aparatur Desa</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Tambah Aparatur Desa</h4>
                <div class="card-body">
                        <form method="POST" action="{{ url('admindesa/aparaturdesa/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_aparatur">Nama</label>
                                <input type="text" class="form-control" name="nama_aparatur" required>
                        </div>
                    </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label for="jabatan_aparatur">Jabatan</label>
                            <select class="form-control" name='id_jabatan'>
                            <option value=''>Pilih Jabatan</option>
                                @foreach($jabatan as $keys)
                                <option value='{{$keys->id_jabatan}}'>{{$keys->kategori_jabatan}} - {{$keys->nama_jabatan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label for="facebook_aparatur">Facebook</label>
                            <input type="text" class="form-control" name="facebook_aparatur" >
                        </div>
                    </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label for="instagram_aparatur">Instagram</label>
                            <input type="text" class="form-control" name="instagram_aparatur" >
                        </div>
                    </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label for="instagram_aparatur">Upload Foto</label><br>
                            <input type="file" name='foto_aparatur'>
                        </div>
                    </div>
                        <br>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a type="button" class="btn btn-secondary" href="{{ url('admindesa/aparaturdesa') }}">Cancel</a>
                        </form>
                    </div> 
                </div>
            </div>
</div>
</section>
    @endsection