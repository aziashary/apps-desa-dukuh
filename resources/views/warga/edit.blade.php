@extends('layouts.main')
@section('judul')
<title>Edit Data Warga - Aplikasi Surat Desa</title>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admindesa/warga') }}">Data Warga</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Warga</li>
        </ol>
  

    
        <div class="card">
            <h4 class="card-header">Edit Data Warga</h4>
                <div class="card-body">
                    @foreach($data as $warga)
                    <form method="POST" action="{{ url('admindesa/warga/update/'. $warga->id_warga) }}" enctype="multipart/form-data">
                        @csrf {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nik"><strong> NIK : </strong></label>
                                <input type="number" class="form-control" id="nik" name="nik" value="{{ $warga->nik }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nama_warga"><strong> Nama : </strong></label>
                                <input type="text" class="form-control" id="nama_warga" name="nama_warga" value="{{ $warga->nama_warga }}">
                            </div>
                        </div> 

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nik"><strong> Nomor KK : </strong></label>
                                <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor kk" value="{{ $warga->no_kk }}">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tempat_lahir"><strong> Tempat Lahir : </strong></label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $warga->tempat_lahir }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tanggal_lahir"><strong> Tanggal Lahir : </strong></label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tempat_lahir"><strong> Email : </strong></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ $warga->email }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="RT"><strong> RT :</strong></label>
                                <select class="form-control" name='RT' required>
                                    <option value='{{ $warga->RT }}'>{{ $warga->RT }}</option>
                                <?php $no = 1; 
                                    while($no <= 15){
                                    echo "<option value='$no'>$no</option>";
                                    $no++;
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="RW"><strong> RW :</strong></label>
                                <select class="form-control" name='RW' required>
                                    <option value='{{ $warga->RW }}'>{{ $warga->RW }}</option>
                                <?php $no = 1; 
                                    while($no <= 15){
                                    echo "<option value='$no'>$no</option>";
                                    $no++;
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="desa"><strong> Desa / Kelurahan : </strong></label>
                                <input type="input" class="form-control" id="desa" name="desa" value="Dukuh" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="alamat"><strong> Alamat : </strong></label>
                                <textarea class="form-control" id="alamat" name="alamat" value="Alamat Lengkap">{{ $warga->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="jenis_pekerjaan"><strong> Pekerjaan :</strong></label>
                                <select class="form-control" name='jenis_pekerjaan'>
                                <option value='{{ $warga->jenis_pekerjaan }}'>{{ $warga->jenis_pekerjaan }}</option>
                                    <option value='Belum/Tidak Bekerja'>Belum/Tidak Bekerja</option>
                                    <option value='Aparatur/Pejabat Negara'>Aparatur/Pejabat Negara</option>
                                    <option value='Tenaga Pengajar'>Tenaga Pengajar</option>
                                    <option value='Wiraswasta'>Wiraswasta</option>
                                    <option value='Wirausaha'>Wirausaha</option>
                                    <option value='Pensiunan'>Pensiunan</option>
                                    <option value='Pelajar'>Pelajar</option>
                                    <option value='Mahasiswa'>Mahasiswa</option>
                                    <option value='Mahasiswa'>Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="jenis_kelamin"><strong> Jenis Kelamin :</strong></label>
                                <select class="form-control" name='jenis_kelamin'>
                                <option value='{{ $warga->jenis_kelamin }}'>{{ $warga->jenis_kelamin }}</option>
                                    <option value='Laki-laki'>Laki-laki</option>
                                    <option value='Perempuan'>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="agama"><strong> Agama :</strong></label>
                                <select class="form-control" name='agama'>
                                <option value='{{ $warga->agama }}'>{{ $warga->agama }} </option>
                                    <option value='Islam'>Islam</option>
                                    <option value='Kristen'>Kristen</option>
                                    <option value='Katolik'>Katolik</option>
                                    <option value='Hindu'>Hindu</option>
                                    <option value='Budha'>Budha</option>
                                    <option value='Konghucu'>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>
                            <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                            <button class="btn btn-secondary  me-1 mb-1" href="{{ url('warga') }}">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="{{ asset ('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset ('assets/js/pages/form-element-select.js') }}"></script>
@endpush
