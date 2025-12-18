@extends('layouts.main')
@section('judul')
<title>Detail Dokumentasi - Aplikasi Surat Desa</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-1"></div>
            <div class="col-md-10">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-bullhorn"></i>
                    Detail dan tambahan Dokumentasi Desa
                  </h3>
                </div>
             
              <!-- /.card-header -->
      <div class="card-body ">
      <div class="mb-4">
        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Foto</button>
        </div>
        <div class="btn-group">
        <a type="button" class="btn btn-secondary" href="{{ url('admindesa/dokumentasi') }}">Kembali</a>
      </div>
        </div>
        <div class="row">
        <div class="col-md-12">
              <div class="card-header">
                @foreach ($item as $keys)
                <h3 class="card-title">Tambahan Foto <b>{{ $keys->nama_dokumentasi }}</b></h3>
              </div>
                @endforeach
                
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table" id="example3">
                  <thead>
                    <tr align="center">
                      {{-- <th style="width: 50px">No</th> --}}
                      <th>Foto</th>
                      <th style="width: 100px">Aksi</th>
                    </tr>
                  </thead>
                        <?php
                        $no = 1;
                        ?>
                  <tbody>
                            @foreach($detail as $data)
                            <tr align="center">
                                {{-- <td>{{ $no++ }}</td> --}}
                                <td><img src="/detaildokumentasi/fetch_image_detail/{{ $data->id_detaildokumentasi }}"  class="img-thumbnail" width="500" height="500" /></td>
                                <td align="center" >
                                  <a href="{{ url('admindesa/detaildokumentasi/delete/'. $data->id_detaildokumentasi) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              
              <!-- /.card-body -->
            </div>
              </div>
              <div class="col-md-12">
              <a><i>*batas foto pendukung sebanyak 20 foto dengan size per foto max 2MB</i><a></div>
              <a type="button" class="btn btn-secondary" href="{{ url('admindesa/dokumentasi') }}">Kembali</a>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div> 
        </div> 
      </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Foto Pendukung</h5>
        <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach ($item as $keys)
        <form method="POST" action="{{ url('admindesa/dokumentasi/storedetail/'. $keys->id_dokumentasi) }}" enctype="multipart/form-data">
        @csrf {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="gambar_dokumentasi">Upload Foto Tambahan</label><br>
            <input type="file" name='gambar_detaildokumentasi' required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        @endforeach
      </div>
    </form>
    </div>
  </div>
</div>

    </section>
    <!-- /.content -->
    @endsection