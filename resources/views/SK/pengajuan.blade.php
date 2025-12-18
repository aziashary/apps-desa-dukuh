@extends('layouts.main')
@section('judul')
<title>Data Pengajuan SK - Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/pages/simple-datatables.css') }}">
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

<!-- Modal -->
@foreach($data as $pengajuan)
<!-- Modal -->
<div class="modal fade" id="confirmModal{{ $pengajuan->id_pengajuan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Approval Pengajuan Surat Keterangan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       
        <div class="modal-body">
            <h6>Nama Warga yang Mengajukan: </h6>
            <div class="form-group">
                <input type="text" class="form-control" id="nama_warga" name="nama_warga" value="{{ $pengajuan->wargas->nama_warga }}"  maxlength="100" readonly>
            </div>
            <br>
            <h6>Jenis Surat Keterangan:</h6>
            <div class="form-group">
                <input type="text" class="form-control" id="jenis_pengajuan" name="jenis_pengajuan"  value="{{ $pengajuan->jenis_pengajuan}}"  maxlength="100" readonly>
            </div>
            <br>
            {{-- Keterangan --}}
            @if(isset($pengajuan->sks->keterangan_1) && !empty($pengajuan->sks->keterangan_1))
                <h6>{{ $pengajuan->sks->keterangan_1 }}</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_1" name="keterangan_1"  value="{{ $pengajuan->keterangan_1}}"  maxlength="100" readonly>
                </div>
                <br>
            @endif

            @if(isset($pengajuan->sks->keterangan_2) && !empty($pengajuan->sks->keterangan_2))
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
            @endif
            
            <form method="POST" action="{{ url('admindesa/SK/detail/'. $pengajuan->id_pengajuan) }}" enctype="multipart/form-data">
                @csrf {{ method_field('PATCH') }}
            <h6>Keputusan Pengajuan Surat</h6>
            <div class="row">
                <div class="col-sm-12">
                    <select class="form-control" readonly>
                        <option value='' selected disabled>{{ $pengajuan->status_pengajuan }}</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
            </form>
        </div>
    </div>
  </div>
  @endforeach


@push('js')
<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/js/pages/simple-datatables.js') }}"></script>

<script type = "text/javascript">  
    $("#hapus").click(function () {  
        var id_surat = $("#id_surat").val();  
        $("#modal_body").html(str);  
    });  
</script> 
@endpush 
@endsection

