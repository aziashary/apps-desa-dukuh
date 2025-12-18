

@extends('layouts.main')
@section('judul')
<title>Edit Aparatur Desa - Aplikasi Surat Desa</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admindesa/jabatan') }}">Data Jabatan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data Jabatan</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Edit Jabatan</h4>
                <div class="card-body">
        @foreach ($data as $aparaturdesa)
            <form method="POST" action="{{ url('admindesa/aparaturdesa/update/'. $aparaturdesa->id_aparatur) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="nama_aparatur">Nama</label>
                <input type="text" class="form-control" name="nama_aparatur" value="{{ $aparaturdesa->nama_aparatur}}">
            </div>
            <div class="form-group">
                <label for="nama_jabatan">Jabatan</label>
                <select class="form-control" name='id_jabatan'>
                <option value='{{ $aparaturdesa->id_jabatan}}'>{{ $aparaturdesa->nama_jabatan}}</option>
                @endforeach

                    @foreach($jabatan as $keys)
                    <option value='{{$keys->id_jabatan}}'>{{$keys->nama_jabatan}}</option>
                
                @endforeach

                    @foreach ($data as $aparaturdesa)
                </select>
            </div>
            <div class="form-group">
                <label for="facebook_aparatur">Facebook</label>
                <input type="text" class="form-control" name="facebook_aparatur" value="{{ $aparaturdesa->facebook_aparatur}}">
            </div>
            <div class="form-group">
                <label for="instagram_aparatur">Instagram</label>
                <input type="text" class="form-control" name="instagram_aparatur" value="{{ $aparaturdesa->instagram_aparatur}}">
            </div>
            <div class="form-group">
                <label for="instagram_aparatur">Upload Foto</label><br>
                <input type="file" name='foto_aparatur'>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a type="button" class="btn btn-secondary" href="{{ url('admindesa/aparaturdesa') }}">Cancel</a>
            @endforeach
        </form>
    </div> 
</div>
</div>
</div>
</section>
    @endsection