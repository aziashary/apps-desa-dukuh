@extends('layouts.main')
@section('judul')
<title>Edit Kode SK {{ $kodesk->singkatan_sk }} - Aplikasi Surat Desa</title>
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
                <li class="breadcrumb-item active" aria-current="page">Edit Kode SK {{ $kodesk->singkatan_sk }}</li>
            </ol>
        
            <div class="card">
                <h4 class="card-header">Edit Kode SK {{ $kodesk->singkatan_sk }}</h4>
                    <div class="card-body">
                        <form method="POST" action="{{ url('admindesa/kodesk/update/'. $kodesk->id_kodesk) }}" enctype="multipart/form-data">
                            @csrf {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="card-body">
                                <div class="mb-3 row">
                                  <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Kode Surat</b></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="kode_sk" name="kode_sk" value="{{ $kodesk->kode_sk }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Nama Surat</b></label>
                                      <div class="col-md-7">
                                          <input type="text" class="form-control" id="jenis_sk" name="jenis_sk" value="{{ $kodesk->jenis_sk }}" required>
                                      </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Singkatan Surat</b></label>
                                      <div class="col-md-7">
                                          <input type="text" class="form-control" id="singkatan_sk" name="singkatan_sk" value="{{ $kodesk->singkatan_sk }}" required>
                                      </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Upload File Excel</b></label>
                                      <div class="col-md-7">
                                        <input type="file" name="file">
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
                                    <div class="col-md-4 offset-md-7">
                                        <button type="button" class="btn btn-primary" id="tambah_keterangan">Tambah Keterangan</button>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="divider divider-dark">
                                        <div class="divider-text">Keterangan</div>
                                    </div>
                                </div>
                                @foreach($kodesk->keterangan_kodesk as $key => $value)
                                    <div class="mb-3 row">
                                        <div class="form-group row">
                                            <label for="{{ $key }}" class="col-md-4 col-form-label text-center"><b>{{ ucwords(str_replace('_', ' ', $key)) }}</b></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="{{ $key }}" name="{{ $key }}" value="{{ $value }}" required>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="mb-3 row">
                                    <div class="divider divider-dark">
                                        <div class="divider-text">Keterangan Tambahan</div>
                                    </div>
                                </div>

                                <div id="keterangan_form">
                                    <!-- Ini adalah tempat untuk menambahkan form keterangan tambahan -->
                                </div>

                                
                                    
                                    
                                    
                            </div>
                            <div class="mb-3 row">
                            <i> *Jika ingin menghapus/menghilangkan keterangan, cukup kosongkan dan hapus isi keterangan yang ingin dihapus</i>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                <a href="{{ url('admindesa/kodesk') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
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
        url: '../getketerangan',
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

<script>
    // Variable untuk menghitung jumlah keterangan tambahan
    var keteranganCount = 0;

    // Fungsi untuk menambahkan form keterangan tambahan
    $('#tambah_keterangan').click(function() {
        keteranganCount++;
        var newKeteranganForm = '<div class="mb-3 row" id="keterangan_' + keteranganCount + '">' +
            '<div class="form-group row">' +
            '<label for="keterangan_' + keteranganCount + '" class="col-md-4 col-form-label text-center"><b>Keterangan Tambahan ' + keteranganCount + '</b></label>' +
            '<div class="col-md-7">' +
            '<input type="text" class="form-control" id="keterangan_' + keteranganCount + '" name="keterangan_' + keteranganCount + '" required>' +
            '</div>' +
            '<div class="col-md-1">' +
            '<button type="button" class="btn btn-danger hapus_keterangan" data-keterangan="' + keteranganCount + '">Hapus</button>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#keterangan_form').append(newKeteranganForm);
    });

    // Fungsi untuk menghapus form keterangan tambahan
    $(document).on('click', '.hapus_keterangan', function() {
        var keteranganNumber = $(this).data('keterangan');
        $('#keterangan_' + keteranganNumber).remove();
    });
</script>

@endpush