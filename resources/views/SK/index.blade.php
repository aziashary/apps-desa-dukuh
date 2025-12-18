@extends('layouts.main')
@section('judul')
<title>Data SK - Aplikasi Surat Desa</title>
@endsection
@push('css')
<script src="library/dselect.js"></script>
<link rel="stylesheet" href="{{ asset ('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset ('assets/css/pages/simple-datatables.css') }}">
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admindesa/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Surat Keterangan Usaha</li>
            </ol>
      

        <div class="card">
            <h4 class="card-header">Data Surat Keterangan </h4>
                <div class="card-body">
            <div class="mb-4">
                <div class="btn-group">
                    <a href="{{ url('admindesa/SK/create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Surat Keterangan </i></a>
                </div>
                <br>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Surat</th>
                        <th>Aksi</th>
                        <th>Cetak</th>
                    </tr>
                </thead>
                <?php
                        $no = 1;
                        ?>
                <tbody>
                    
                @foreach($data as $sk)
                    <tr>
                        <td  style="width: 70px;">{{ $no++ }}</td>
                        <td  style="width: 170px;">{{ $sk->no_sk}}</td>
                        <td  style="width: 200px;">{{ $sk->wargas->nama_warga }}</td>
                        <td  style="width: 130px;">{{ date('d-m-Y', strtotime($sk->created_at)) }}</td>
                        <td >{{ $sk->sks->singkatan_sk}}</td>
                        <td style="width: 300px;" align="center" >
                            <a href="{{ URL('admindesa/SK/edit/'. $sk->id_sk) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ URL('admindesa/SK/selesai/'. $sk->id_sk) }}" class="btn btn-success" 
                              onclick="return confirm('Apakah Anda yakin ingin update status surat {{ $sk->no_sk }} atas nama {{ $sk->wargas->nama_warga }}?')">Selesai</a>
                            <a href="{{ URL('admindesa/SK/delete/'. $sk->id_sk) }}" class="btn btn-danger" 
                              onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $sk->sks->singkatan_sk }} atas nama {{ $sk->wargas->nama_warga }}?')">Hapus</a>
                        </td>
                        <td align="center" >
                            <button type="button" class="btn btn-primary" data-id="{{ $sk->id_sk }}" data-bs-toggle="modal" 
                                data-bs-target="#PrintModal{{ $sk->id_sk }}">
                                Print
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

{{-- <!-- Modal konfirmasi delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Anda yakin ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="{{ URL('admindesa/SK/delete/'. $sk->id_sk) }}" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div> --}}

  @foreach($data as $sk)
  <div class="modal fade" id="PrintModal{{ $sk->id_sk }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Pihak yang Menandatangani</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" value="{{ $sk->id_sk }}" name="id_sk">
            <div class="mb-3 row">
                <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Tanda Tangan Aparatur Desa</b></label>
                <div class="col-md-8">
                <select class="choices form-select" name="ttd_kepala">
                    @foreach($aparaturdesa as $keys)
                    <option value="{{ $keys->id_aparatur}}">{{ $keys->nama_aparatur }} - {{ $keys->nama_jabatan}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-text-input" class="col-md-3 col-form-label text-center"><b>Metode Print/Download</b></label>
                <div class="col-md-8">
                    <select class="form-select" name="aksi">
                    <option value="print">Print Langsung</option>
                    <option value="excel">Download Excel</option>
                    {{-- <option value="pdf">Download PDF</option> --}}
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" target="_blank" onclick="submitForm()">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

@endsection
@push('js')


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset ('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/js/pages/simple-datatables.js') }}"></script>
<script src="{{ asset ('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset ('assets/js/pages/form-element-select.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function submitForm() {
      const forms = document.querySelectorAll('form');
  
      forms.forEach(form => {
        const selectValue = form.querySelector('select[name="aksi"]').value;
  
        if (selectValue === 'print') {
          form.action = "{{ url('admindesa/SK/print') }}";
        } else if (selectValue === 'excel') {
          form.action = "{{ url('admindesa/SK/excel') }}";
        } else if (selectValue === 'pdf') {
          form.action = "{{ url('admindesa/SK/pdf') }}";
        }
  
        form.submit();
      });
    }
  </script>


<script type = "text/javascript">  
    $("#hapus").click(function () {  
        var id_surat = $("#id_surat").val();  
        $("#modal_body").html(str);  
    });  
</script>



@endpush