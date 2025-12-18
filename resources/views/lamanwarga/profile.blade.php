@extends('layouts.mainwarga')
@section('judul')
<title>Profile Warga - Aplikasi Surat Desa</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">

      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
              <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Profile</a>
            </li>
          </ul>
          <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <hr class="my-0" />
            <div class="card-body">
              <form id="formAccountSettings" method="POST" onsubmit="return false">
                @foreach ($data as $warga)
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nik"><strong> NIK : </strong></label>
                            <input type="number" class="form-control" id="nik" name="nik" value={{ $warga->nik }} placeholder="NIK" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_warga"><strong> Nama : </strong></label>
                            <input type="text" class="form-control" id="nama_warga" name="nama_warga" value={{ $warga->nama_warga }} placeholder="Nama Lengkap" required>
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tempat_lahir"><strong> Tempat Lahir : </strong></label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value={{ $warga->tempat_lahir }} placeholder="Tempat Lahir" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_lahir"><strong> Tanggal Lahir : </strong></label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value={{ $warga->tanggal_lahir }} placeholder="Tempat Lahir" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="RT"><strong> RT :</strong></label>
                            <select class="form-control" name='RT' required>
                            <option value=''>Pilih </option>
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
                            <option value=''>Pilih </option>
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
                            <textarea class="form-control" id="alamat" name="alamat" value={{ $warga->alamat }} placeholder="Alamat Lengkap" required>{{ $warga->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jenis_pekerjaan"><strong> Pekerjaan :</strong></label>
                            <select class="form-control" name='jenis_pekerjaan' required>
                                <option value={{ $warga->jenis_pekerjaan }}>{{ $warga->jenis_pekerjaan }}</option>
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
                            <select class="form-control" name='jenis_kelamin' required>
                            <option value={{ $warga->jenis_kelamin }}>{{ $warga->jenis_kelamin }} </option>
                                <option value='Laki-laki'>Laki-laki</option>
                                <option value='Perempuan'>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="agama"><strong> Agama :</strong></label>
                            <select class="form-control" name='agama' required>
                            <option value={{ $warga->agama }}>{{ $warga->agama }} </option>
                                <option value='Islam'>Islam</option>
                                <option value='Kristen'>Kristen</option>
                                <option value='Katolik'>Katolik</option>
                                <option value='Hindu'>Hindu</option>
                                <option value='Budha'>Budha</option>
                                <option value='Konghucu'>Konghucu</option>
                            </select>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
</div>
@endsection