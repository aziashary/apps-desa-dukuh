@extends('layouts.mainwarga')
@section('judul')
<title>Pengajuan SK - Aplikasi Surat Desa</title>
@endsection
@section('content')
@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/pages/simple-datatables.css') }}">
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboardwarga/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pengajuan Surat Keterangan</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Data Pengajuan Surat Keterangan</h4>
                <div class="card-body">
            <div class="mb-4">
                <div class="btn-group">
                    <a href="{{ url('dashboardwarga/pengajuan/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Pengajuan Surat Keterangan</i></a>
                </div>
            </div>
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
                        <td>{{ $pengajuan->wargas->nama_warga}}</td>
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
                            {{-- <a href="{{ URL('dashboardwarga/pengajuan/edit/'. $pengajuan->id_pengajuan) }}" class="btn btn-primary">Edit</a> --}}
                            {{-- <a href="#" class="btn btn-primary" title="Maaf, fitur ini masih dalam pengembangan">Edit</a> --}}
                            <a href="{{ URL('dashboardwarga/pengajuan/delete/'. $pengajuan->id_pengajuan) }}" class="btn btn-danger">Hapus</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ url('admindesa/pengajuan/delete') }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
          Apakah anda yakin akan menghapus data ini?  <br>
        </div>
        <input type="hidden" id="id_surat" name="id_pengajuan">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection
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