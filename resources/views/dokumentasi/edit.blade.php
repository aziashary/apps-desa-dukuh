@extends('layouts.main')
@section('judul')
<title>Edit Dokumentasi - Aplikasi Surat Desa</title>
@endsection
@section('content')

<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admindesa/SKU') }}">Data Dokumentasi</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Dokumentasi</li>
          </ol>
    

      <div class="card">
          <h4 class="card-header">Edit Dokumentasi</h4>
              <div class="card-body">
                    @foreach ($data as $dokumentasi)
                <form method="POST" action="{{ url('admindesa/dokumentasi/update/'. $dokumentasi->id_dokumentasi) }}" enctype="multipart/form-data">
                    @csrf {{ method_field('PATCH') }}
            <div class="row">
              <div class="col-md-4 mb-4">
                <h6>Judul Dokumentasi</h6>
                  <div class="form-group">
                    <input type="text" class="form-control" name='nama_dokumentasi' value={{ $dokumentasi->nama_dokumentasi}} required>
                </div>
              </div>
              
              <div class="col-md-4 mb-4">
                <h6>Judul Dokumentasi</h6>
                  <div class="form-group">
                    <select class="form-control" name='kategori_dokumentasi' required>
                        <option value='{{ $dokumentasi->kategori_dokumentasi}}'>{{ $dokumentasi->kategori_dokumentasi}}</option>
                        <option value='Kantor'>Kantor Desa</option>
                        <option value='Kegiatan'>Kegiatan Desa</option>
                        <option value='Sosialisasi'>Sosialisasi</option>
                    </select>
                  </div>
              </div>
  
              <div class="col-md-4 mb-4">
                <h6>Tanggal Dokumentasi </h6>
                  <div class="form-group">
                      <input type="date" class="form-control" name='tanggal_dokumentasi'  value="{{ $dokumentasi->tanggal_dokumentasi }}" required>
                  </div>
              </div>
  
              <div class="col-md-12 mb-4">
                <h6>Deskripsi</h6>
                  <div class="form-group">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Dokumentasi" required> {{ $dokumentasi->deskripsi }}</textarea>
                  </div>
  
              <div class="col-md-12 mb-4">
                <h6>Upload Foto Headline Dokumentasi</h6>
                  <input type="file" name='gambar_dokumentasi' required>
              </div>
  
              <button type="submit" class="btn btn-success">Simpan</button>
              <a type="button" class="btn btn-secondary" href="{{ url('admindesa/dokumentasi') }}">Cancel</a>
          </div>
          @endforeach
                      </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </section>
  @endsection
  
  @section('js')
  <script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
        placeholder: 'Deskripsi..'
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
  @endsection