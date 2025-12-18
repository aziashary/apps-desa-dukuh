@extends('layouts.main')
@section('judul')
<title>Tambah Data Warga - Aplikasi Surat Desa</title>
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
        <h4 class="card-header">Tambah Data Warga</h4>
            <div class="card-body">
                @foreach($errors->get('nik') as $error)
                    <div class="alert alert-danger alert-dismissible fade show">NIK sudah Terdaftar</div>
                @endforeach
                    <form method="POST" action="{{ url('admindesa/warga/store') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-4 {{ $errors->get('nik') ? 'has-error' : '' }}">
                            <div class="mb-3">
                                <label for="nik"><strong> NIK* : </strong></label>
                                <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nama_warga"><strong> Nama* : </strong></label>
                                <input type="text" class="form-control" id="nama_warga" name="nama_warga" placeholder="Nama Lengkap" required>
                            </div>
                        </div> 

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nik"><strong> Nomor KK : </strong></label>
                                <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor kk">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tempat_lahir"><strong> Tempat Lahir* : </strong></label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tanggal_lahir"><strong> Tanggal Lahir* : </strong></label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tempat Lahir" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tempat_lahir"><strong> Email : </strong></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="RT"><strong> RT* :</strong></label>
                                <select class="form-control" name='RT' required>
                                <option value='' selected disabled>Pilih </option>
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
                                <label for="RW"><strong> RW* :</strong></label>
                                <select class="form-control" name='RW' required>
                                <option value='' selected disabled>Pilih </option>
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
                                <label for="alamat"><strong> Alamat* : </strong></label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="jenis_pekerjaan"><strong> Pekerjaan* :</strong></label>
                                <select class="form-control" name='jenis_pekerjaan' required>
                                <option value='' selected disabled>Pilih </option>
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
                                <label for="jenis_kelamin"><strong> Jenis Kelamin* :</strong></label>
                                <select class="form-control" name='jenis_kelamin' required>
                                <option value='' selected disabled>Pilih </option>
                                    <option value='Laki-laki'>Laki-laki</option>
                                    <option value='Perempuan'>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="agama"><strong> Agama* :</strong></label>
                                <select class="form-control" name='agama' required>
                                <option value='' selected disabled>Pilih </option>
                                    <option value='Islam'>Islam</option>
                                    <option value='Kristen'>Kristen</option>
                                    <option value='Katolik'>Katolik</option>
                                    <option value='Hindu'>Hindu</option>
                                    <option value='Budha'>Budha</option>
                                    <option value='Konghucu'>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <p>(*) Wajib Diisi</p>
                    </div>
                    <br>
                            <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                            <button class="btn btn-secondary  me-1 mb-1" href="{{ url('admindesa/warga') }}">Cancel</button>
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
