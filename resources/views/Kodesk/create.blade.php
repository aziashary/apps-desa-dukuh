@extends('layouts.main')
@section('judul')
<title>Tambah Kode SK - Aplikasi Surat Desa</title>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset ('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admindesa/kodesk') }}">Kode SK</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Kode SK</li>
            </ol>
        
            <div class="card">
                <h4 class="card-header">Tambah Kode SK </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ url('admindesa/kodesk/store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="card-body">
                                <div class="mb-3 row">
                                  <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Kode Surat</b></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="kode_sk" name="kode_sk" placeholder="Kode Surat" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Nama Surat</b></label>
                                      <div class="col-md-7">
                                          <input type="text" class="form-control" id="jenis_sk" name="jenis_sk" placeholder="Nama Surat" required>
                                      </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Singkatan Surat</b></label>
                                      <div class="col-md-7">
                                          <input type="text" class="form-control" id="singkatan_sk" name="singkatan_sk" placeholder="Singkatan Surat" required>
                                      </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Jumlah Keterangan :</b></label>
                                      <div class="col-md-7">
                                        <select
                                        multiple
                                        class="form-select"
                                        id="jumlah_keterangan"
                                        name="jumlah_keterangan"
                                        aria-label="Multiple select example"
                                        >
                                        <option value="1" selected>Satu Keterangan</option>
                                        <option value="2">Dua Keterangan</option>
                                        <option value="3">Tiga Keterangan</option>
                                        <option value="4">Empat Keterangan</option>
                                        <option value="5">Lima Keterangan</option>
                                        <option value="6">Enam Keterangan</option>
                                        <option value="7">Tujuh Keterangan</option>
                                        <option value="8">Delapan Keterangan</option>
                                        </select>
                                      </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Jumlah warga :</b></label>
                                    <div class="col-md-7">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jumlah_warga" id="satu_keterangan" value="1" checked>
                                            <label class="form-check-label" for="satu_keterangan">
                                                1 (Satu) Warga
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jumlah_warga" id="dua_keterangan" value="2">
                                            <label class="form-check-label" for="dua_keterangan">
                                                2 (Dua) Warga
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Upload File Excel</b></label>
                                      <div class="col-md-7">
                                        <input type="file" name="file" required>
                                      </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="divider divider-dark">
                                        <div class="divider-text">Keterangan</div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan 1</b></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="keterangan_1" name="keterangan_1" placeholder="Keterangan 1" required>
                                        </div>
                                    </div>
                                    
                                {{-- Menampilkan data keterangan --}}
                                <div id="formInputContainer"></div> 
                                
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                <a href="{{ url('admindesa/kodesk') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
</div>

@endsection
@push('js')
<script src="{{ asset ('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset ('assets/js/pages/form-element-select.js') }}"></script>



<script type = "text/javascript">  
    $("#hapus").click(function () {  
        var id_surat = $("#id_surat").val();  
        $("#modal_body").html(str);  
    });  
</script>

<script>
    $('#jumlah_keterangan').on('change', function() {
    var keteranganId = $(this).val();
    keteranganId = keteranganId.join(); // mengubah array menjadi string tunggal
    $.ajax({
        url: 'getketerangan',
        type: 'GET',
        data: {keterangan: keteranganId},
        success: function(response) {
            $('#formInputContainer').html(response);
        },
        error: function() {
            alert('Terjadi kesalahan. Silakan coba lagi.');
        }
    });
});
</script>

@endpush