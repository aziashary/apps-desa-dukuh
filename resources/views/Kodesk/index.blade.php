@extends('layouts.main')
@section('judul')
<title>Data SK - Aplikasi Surat Desa</title>
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
                <li class="breadcrumb-item active" aria-current="page">Data Kode Surat Keterangan</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Data Kode Surat Keterangan</h4>
                <div class="card-body">
            <div class="mb-4">
                <div class="btn-group">
                    <a href="{{ url('admindesa/kodesk/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Kode SK</i></a>
                </div>
            </div>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Surat</th>
                        <th>Nama Surat</th>
                        <th>Singkatan</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                        $no = 1;
                        ?>
                <tbody>
                    
                @foreach($data as $kodesk)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kodesk->kode_sk}}</td>
                        <td>{{ $kodesk->jenis_sk }}</td>
                        <td>{{ $kodesk->singkatan_sk}}</td>
                        <td align="center" >
                            <button type="button" class="btn btn-primary" data-id="{{ $kodesk->id_kodesk }}" data-bs-toggle="modal" 
                                data-bs-target="#detailModal{{ $kodesk->id_kodesk }}">
                                Detail
                            </button>
                        </td>

                        <td align="center" >
                            <a class="btn btn-success" href="{{ URL('admindesa/kodesk/edit/'. $kodesk->id_kodesk) }}">
                                Edit Detail SK
                            </a>
                           
                            <a class="btn btn-secondary" href="{{ URL('admindesa/kodesk/editsk/'. $kodesk->id_kodesk) }}">
                                Edit Template SK
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    
</section>
</div>

@foreach($data as $kodesk)
<!-- Modal Detail -->
<div class="modal fade" id="detailModal{{ $kodesk->id_kodesk }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Keterangan SK</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <form method="POST" action="{{ url('admindesa/SK/detail/'. $kodesk->id_kodesk) }}" enctype="multipart/form-data">
            @csrf {{ method_keterangan('PATCH') }} --}}
        <div class="modal-body">
            <h6>Kode Surat Keterangan: </h6>
            <div class="form-group">
                <input type="text" class="form-control" id="nama_warga" name="nama_warga" value="{{ $kodesk->kode_sk }}"  maxlength="100" readonly>
            </div>
            <br>
            <h6>Jenis Surat Keterangan:</h6>
            <div class="form-group">
                <input type="text" class="form-control" id="jenis_kodesk" name="jenis_kodesk"  value="{{ $kodesk->jenis_sk}}"  maxlength="100" readonly>
            </div>
            <br>
            <h6>Singkatan Surat Keterangan:</h6>
            <div class="form-group">
                <input type="text" class="form-control" id="jenis_kodesk" name="jenis_kodesk"  value="{{ $kodesk->singkatan_sk}}"  maxlength="100" readonly>
            </div>
            <br>
            <h6>Nama File Template Excel :</h6>
            <div class="form-group">
                <input type="text" class="form-control" id="jenis_kodesk" name="jenis_kodesk"  value="{{ $kodesk->file_name}}"  maxlength="100" readonly>
            </div>
            <br>

            <div class="mb-3 row">
                <div class="divider divider-dark">
                    <div class="divider-text">Keterangan</div>
                </div>
            </div>
            
            {{-- Keterangan --}}
            @if(isset($kodesk->keterangan_1) && !empty($kodesk->keterangan_1))
                <h6>Keterangan 1</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_1" name="keterangan_1"  value="{{ $kodesk->keterangan_1}}"  maxlength="100" readonly>
                </div>
                <br>
            @endif

            @if(isset($kodesk->keterangan_2) && !empty($kodesk->keterangan_2))
                <h6>Keterangan 2</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_2" name="keterangan_2"  value="{{ $kodesk->keterangan_2}}"  maxlength="100" readonly>
                </div>
                <br>
            @endif

            @if(isset($kodesk->keterangan_3) && !empty($kodesk->keterangan_3))
                <h6>Keterangan 3</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_3" name="keterangan_3"  value="{{ $kodesk->keterangan_3}}"  maxlength="100" readonly>
                </div>
                <br>
            @endif

            @if(isset($kodesk->keterangan_4) && !empty($kodesk->keterangan_4))
                <h6>Keterangan 4</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_4" name="keterangan_4"  value="{{ $kodesk->keterangan_4}}"  maxlength="100" readonly>
                </div>
                <br>
            @endif

            @if(isset($kodesk->keterangan_5) && !empty($kodesk->keterangan_5))
                <h6>Keterangan 5</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_5" name="keterangan_5"  value="{{ $kodesk->keterangan_5}}"  maxlength="100" readonly>
                </div>
                <br>
            @endif
        </div>
        <br>
        
        <div class="modal-footer">
            <a href="{{ URL('admindesa/kodesk/delete/'. $kodesk->id_kodesk) }}" class="btn btn-danger" 
                onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $kodesk->singkatan_sk }}?')">Hapus</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </td>
        </div>
            {{-- </form> --}}
        </div>
    </div>
  </div>
@endforeach


@foreach($data as $kodesk)
  <div class="modal fade" id="editletakModal{{ $kodesk->id_kodesk }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Tata letak Template SK</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <form method="POST" action="{{ url('admindesa/SK/detail/'. $kodesk->id_kodesk) }}" enctype="multipart/form-data">
            @csrf {{ method_keterangan('PATCH') }} --}}
        <div class="modal-body">
            <h6>Kode Surat Keterangan: </h6>
            <div class="form-group">
                <input type="text" class="form-control" id="nama_warga" name="nama_warga" value="{{ $kodesk->kode_sk }}"  maxlength="100" readonly>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
  </div>
@endforeach

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