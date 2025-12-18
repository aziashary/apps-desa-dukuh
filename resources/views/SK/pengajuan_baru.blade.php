@extends('layouts.main')
@section('judul')
<title>Data Pengajuan SK - Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/pages/simple-datatables.css') }}">
<style>
    .custom-img {
        width: 300px;
        height: 300px;
        /* Opsional: atur properti lain sesuai kebutuhan */
    }
</style>
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pengajuan Surat Keterangan</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Data Pengajuan Surat Keterangan</h4>
                <div class="card-body">
            {{-- <div class="mb-4">
                <div class="btn-group">
                    <a href="{{ url('dashboardwarga/pengajuan/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Pengajuan Surat Keterangan</i></a>
                </div>
            </div> --}}
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
                        <th>No Pengajuan</th>
                        <th>Nama</th>
                        <th>Tanggal Dibuat</th>
                        <th>Jenis Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                        $no = 1;
                        ?>
                <tbody>
                    
                @foreach($data as $pengajuan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pengajuan->no_pengajuan}}</td>
                        <td>{{ $pengajuan->wargas->nama_warga }}</td>
                        <td>{{ date('d-m-Y', strtotime($pengajuan->created_at)) }}</td>
                        <td>{{ $pengajuan->jenis_pengajuan}}</td>
                        <td align="center" >
                            @if($pengajuan->status_pengajuan == "Process")
                                <span class="badge bg-warning">Proses</span></td>
                            @elseif($pengajuan->status_pengajuan == "Approved")
                                <span class="badge bg-success">Approved</span></td>
                            @elseif($pengajuan->status_pengajuan == "Denied")
                                <span class="badge bg-danger">Denied</span></td>
                            @endif                            
                        </td>
                        <td align="center" >
                            <button type="button" class="btn btn-primary" data-id="{{ $pengajuan->id_pengajuan }}" data-bs-toggle="modal" 
                                data-bs-target="#confirmModal{{ $pengajuan->id_pengajuan }}">
                                Detail
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
</div>

@foreach($data as $pengajuan)
<!-- Modal -->
<div class="modal fade" id="confirmModal{{ $pengajuan->id_pengajuan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Approval Pengajuan Surat Keterangan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ url('admindesa/SK/detail/'. $pengajuan->id_pengajuan) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
        <div class="modal-body">
            <h6>Nama Warga yang Mengajukan: </h6>
            <div class="form-group">
                <input type="text" class="form-control" id="nama_warga" name="nama_warga" value="{{ $pengajuan->wargas->nama_warga }}"  maxlength="100" readonly>
                <input type="hidden" class="form-control" id="id_warga" name="id_warga" value="{{ $pengajuan->id_warga }}"  maxlength="100" readonly>
                <input type="hidden" class="form-control" id="id_pengajuan" name="id_pengajuan" value="{{ $pengajuan->id_pengajuan }}"  maxlength="100" readonly>
                <input type="hidden" class="form-control" id="no_pengajuan" name="no_pengajuan" value="{{ $pengajuan->no_pengajuan }}"  maxlength="100" readonly>
            </div>
            <br>
            <h6>Jenis Surat Keterangan:</h6>
            <div class="form-group">
                <input type="text" class="form-control" id="jenis_pengajuan" name="jenis_pengajuan"  value="{{ $pengajuan->jenis_pengajuan}}"  maxlength="100" readonly>
                <input type="hidden" class="form-control" id="kode_sk" name="kode_sk"  value="{{ $pengajuan->kode_sk}}"  maxlength="100" readonly>
            </div>
            <br>
            {{-- Keterangan --}}
            @foreach($pengajuan->keterangan_pengajuan as $key => $value)
                <h6><label for="{{ $key }}"><b>{{ ucwords(str_replace('_', ' ', $key)) }}</b></label></h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="{{ $key }}" name="{{ $key }}" value="{{ $value }}" required>
                </div>
                <br>
            @endforeach

            <h6>KTP:</h6>
            <div class="form-group">
                <img src="{{ asset($pengajuan->berkas_1) }}"  class="custom-img">
            </div>

            <br>

            <h6>KK:</h6>
            <div class="form-group">
                <img src="{{ asset($pengajuan->berkas_2) }}"  class="custom-img">
            </div>

            <br>

            <h6>Surat Pengantar:</h6>
            <div class="form-group">
                <img src="{{ asset($pengajuan->berkas_3) }}"  class="custom-img">
            </div>

            <br>

            {{-- @if(isset($pengajuan->sks->keterangan_2) && !empty($pengajuan->sks->keterangan_2))
                <h6>{{ $pengajuan->sks->keterangan_2 }}</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_2" name="keterangan_2"  value="{{ $pengajuan->keterangan_2}}"  maxlength="100" readonly>
                </div>
                <br>
            @endif

            @if(isset($pengajuan->sks->keterangan_3) && !empty($pengajuan->sks->keterangan_3))
                <h6>{{ $pengajuan->sks->keterangan_3 }}</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_3" name="keterangan_3"  value="{{ $pengajuan->keterangan_3}}"  maxlength="100" readonly>
                </div>
                <br>
            @endif

            @if(isset($pengajuan->sks->keterangan_4) && !empty($pengajuan->sks->keterangan_4))
                <h6>{{ $pengajuan->sks->keterangan_4 }}</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_4" name="keterangan_4"  value="{{ $pengajuan->keterangan_4}}"  maxlength="100" readonly>
                </div>
                <br>
            @endif --}}
            
            
            <h6>Keputusan Pengajuan Surat</h6>
            <div class="row">
                <div class="col-sm-12">
                    <select class="form-control" name='status_pengajuan' required>
                        <option value='' selected disabled> --      Pilih Status     -- </option>
                        <option value='Approved'>Disetujui / Approved</option>
                        <option value='Denied'>Ditolak / Denied</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
        </div>
            </form>
        </div>
    </div>
  </div>
  @endforeach

@push('js')
<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/js/pages/simple-datatables.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type = "text/javascript">  
    $("#hapus").click(function () {  
        var id_surat = $("#id_surat").val();  
        $("#modal_body").html(str);  
    });  
</script> 
@endpush 
@endsection

