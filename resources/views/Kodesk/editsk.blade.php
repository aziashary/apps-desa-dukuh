@extends('layouts.main')
@section('judul')
<title>Edit {{ $item->jenis_sk }} - Aplikasi Surat Desa</title>
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
                <li class="breadcrumb-item active" aria-current="page">Edit Template Surat Keterangan</li>
            </ol>
        
            <div class="card">
                <h4 class="card-header">Edit Template {{ $item->jenis_sk }} </h4>
                <div class="card-body">
                    <form method="POST" action="{{ url('admindesa/kodesk/updatesk/'. $item->id_kodesk) }}" enctype="multipart/form-data">
                        @csrf {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="divider divider-dark">
                                        <div class="divider-text">Data Warga 1</div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Nama</b></label>
                                        <div class="col-md-3">
                                            <select class="choices form-select" name="nama_warga">
                                                @if(isset($detailkodesk['warga'][0]['nama_warga']))
                                                <option value="{{$detailkodesk['warga'][0]['nama_warga']}}">{{$detailkodesk['warga'][0]['nama_warga']}}</option>
                                                @endif
                                                <option value="">-Disable-</option>
                                                <?php
                                                for ($i=1; $i<=11; $i++) {
                                                    for ($j=0; $j<50; $j++) {
                                                        $char = chr(64 + $i);
                                                        $value = $char . ($j+1);
                                                        echo "<option value='{$value}'>{$value}</option>";
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                               
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>NIK</b></label>
                                    <div class="col-md-3">
                                        <select class="choices form-select" name="nik">
                                            @if(isset($detailkodesk['warga'][0]['nik']))
                                            <option value="{{$detailkodesk['warga'][0]['nik']}}">{{$detailkodesk['warga'][0]['nik']}}</option>
                                            @endif
                                            <option value="">-Disable-</option>
                                            <?php
                                            for ($i=1; $i<=11; $i++) {
                                                for ($j=0; $j<50; $j++) {
                                                    $char = chr(64 + $i);
                                                    $value = $char . ($j+1);
                                                    echo "<option value='{$value}'>{$value}</option>";
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Tempat Lahir</b></label>
                                      <div class="col-md-3">
                                          <select class="choices form-select" name="tempat_lahir">
                                            @if(isset($detailkodesk['warga'][0]['tempat_lahir']))
                                            <option value="{{$detailkodesk['warga'][0]['tempat_lahir']}}">{{$detailkodesk['warga'][0]['tempat_lahir']}}</option>
                                            @endif   
                                             <option value="">-Disable-</option>
                                              <?php
                                              for ($i=1; $i<=11; $i++) {
                                                  for ($j=0; $j<50; $j++) {
                                                      $char = chr(64 + $i);
                                                      $value = $char . ($j+1);
                                                      echo "<option value='{$value}'>{$value}</option>";
                                                  }
                                              }
                                            ?>
                                          </select>
                                      </div>
                                
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Tanggal Lahir</b></label>
                                    <div class="col-md-3">
                                      <select class="choices form-select" name="tanggal_lahir">
                                        @if(isset($detailkodesk['warga'][0]['tanggal_lahir']))
                                        <option value="{{$detailkodesk['warga'][0]['tanggal_lahir']}}">{{$detailkodesk['warga'][0]['tanggal_lahir']}}</option>
                                        @endif    
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Jenis Pekerjaan</b></label>
                                      <div class="col-md-3">
                                          <select class="choices form-select" name="jenis_pekerjaan">
                                            @if(isset($detailkodesk['warga'][0]['jenis_pekerjaan']))
                                            <option value="{{$detailkodesk['warga'][0]['jenis_pekerjaan']}}">{{$detailkodesk['warga'][0]['jenis_pekerjaan']}}</option>
                                            @endif    
                                             <option value="">-Disable-</option>
                                              <?php
                                              for ($i=1; $i<=11; $i++) {
                                                  for ($j=0; $j<50; $j++) {
                                                      $char = chr(64 + $i);
                                                      $value = $char . ($j+1);
                                                      echo "<option value='{$value}'>{$value}</option>";
                                                  }
                                              }
                                            ?>
                                          </select>
                                      </div>
                                
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Agama</b></label>
                                    <div class="col-md-3">
                                      <select class="choices form-select" name="agama">
                                        @if(isset($detailkodesk['warga'][0]['agama']))
                                        <option value="{{$detailkodesk['warga'][0]['agama']}}">{{$detailkodesk['warga'][0]['agama']}}</option>
                                        @endif
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Jenis Kelamin</b></label>
                                    <div class="col-md-3">
                                        <select class="choices form-select" name="jenis_kelamin">
                                            @if(isset($detailkodesk['warga'][0]['jenis_kelamin']))
                                          <option value="{{$detailkodesk['warga'][0]['jenis_kelamin']}}">{{$detailkodesk['warga'][0]['jenis_kelamin']}}</option>
                                            @endif
                                           <option value="">-Disable-</option>
                                            <?php
                                            for ($i=1; $i<=11; $i++) {
                                                for ($j=0; $j<50; $j++) {
                                                    $char = chr(64 + $i);
                                                    $value = $char . ($j+1);
                                                    echo "<option value='{$value}'>{$value}</option>";
                                                }
                                            }
                                          ?>
                                        </select>
                                    </div>
                              
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Alamat</b></label>
                                      <div class="col-md-3">
                                          <select class="choices form-select" name="alamat">
                                            @if(isset($detailkodesk['warga'][0]['alamat']))
                                            <option value="{{$detailkodesk['warga'][0]['alamat']}}">{{$detailkodesk['warga'][0]['alamat']}}</option>
                                            @endif    
                                             <option value="">-Disable-</option>
                                              <?php
                                              for ($i=1; $i<=11; $i++) {
                                                  for ($j=0; $j<50; $j++) {
                                                      $char = chr(64 + $i);
                                                      $value = $char . ($j+1);
                                                      echo "<option value='{$value}'>{$value}</option>";
                                                  }
                                              }
                                            ?>
                                          </select>
                                      </div>
                            </div>
                        @if ($item->jumlah_warga == 2)
                            <div class="mb-3 row">
                                <div class="divider divider-dark">
                                    <div class="divider-text">Data Warga 2</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Nama</b></label>
                                    <div class="col-md-3">
                                        <select class="choices form-select" name="nama_warga_2">
                                            @if(isset($detailkodesk['warga'][1]['nama_warga']))
                                            <option value="{{$detailkodesk['warga'][1]['nama_warga']}}">{{$detailkodesk['warga'][1]['nama_warga']}}</option>
                                            @endif
                                            <option value="">-Disable-</option>
                                            <?php
                                            for ($i=1; $i<=11; $i++) {
                                                for ($j=0; $j<50; $j++) {
                                                    $char = chr(64 + $i);
                                                    $value = $char . ($j+1);
                                                    echo "<option value='{$value}'>{$value}</option>";
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                           
                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>NIK</b></label>
                                <div class="col-md-3">
                                    <select class="choices form-select" name="nik_2">
                                        @if(isset($detailkodesk['warga'][1]['nik']))
                                        <option value="{{$detailkodesk['warga'][1]['nik']}}">{{$detailkodesk['warga'][1]['nik']}}</option>
                                        @endif
                                        <option value="">-Disable-</option>
                                        <?php
                                        for ($i=1; $i<=11; $i++) {
                                            for ($j=0; $j<50; $j++) {
                                                $char = chr(64 + $i);
                                                $value = $char . ($j+1);
                                                echo "<option value='{$value}'>{$value}</option>";
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Tempat Lahir</b></label>
                                  <div class="col-md-3">
                                      <select class="choices form-select" name="tempat_lahir_2">
                                        @if(isset($detailkodesk['warga'][1]['tempat_lahir']))
                                        <option value="{{$detailkodesk['warga'][1]['tempat_lahir']}}">{{$detailkodesk['warga'][1]['tempat_lahir']}}</option>
                                        @endif   
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                  </div>
                            
                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Tanggal Lahir</b></label>
                                <div class="col-md-3">
                                  <select class="choices form-select" name="tanggal_lahir_2">
                                    @if(isset($detailkodesk['warga'][1]['tanggal_lahir']))
                                    <option value="{{$detailkodesk['warga'][1]['tanggal_lahir']}}">{{$detailkodesk['warga'][1]['tanggal_lahir']}}</option>
                                    @endif    
                                     <option value="">-Disable-</option>
                                      <?php
                                      for ($i=1; $i<=11; $i++) {
                                          for ($j=0; $j<50; $j++) {
                                              $char = chr(64 + $i);
                                              $value = $char . ($j+1);
                                              echo "<option value='{$value}'>{$value}</option>";
                                          }
                                      }
                                    ?>
                                  </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Jenis Pekerjaan</b></label>
                                  <div class="col-md-3">
                                      <select class="choices form-select" name="jenis_pekerjaan_2">
                                        @if(isset($detailkodesk['warga'][1]['jenis_pekerjaan']))
                                        <option value="{{$detailkodesk['warga'][1]['jenis_pekerjaan']}}">{{$detailkodesk['warga'][1]['jenis_pekerjaan']}}</option>
                                        @endif    
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                  </div>
                            
                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Agama</b></label>
                                <div class="col-md-3">
                                  <select class="choices form-select" name="agama_2">
                                    @if(isset($detailkodesk['warga'][1]['agama']))
                                    <option value="{{$detailkodesk['warga'][1]['agama']}}">{{$detailkodesk['warga'][1]['agama']}}</option>
                                    @endif
                                     <option value="">-Disable-</option>
                                      <?php
                                      for ($i=1; $i<=11; $i++) {
                                          for ($j=0; $j<50; $j++) {
                                              $char = chr(64 + $i);
                                              $value = $char . ($j+1);
                                              echo "<option value='{$value}'>{$value}</option>";
                                          }
                                      }
                                    ?>
                                  </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Jenis Kelamin</b></label>
                                <div class="col-md-3">
                                    <select class="choices form-select" name="jenis_kelamin_2">
                                        @if(isset($detailkodesk['warga'][1]['jenis_kelamin']))
                                      <option value="{{$detailkodesk['warga'][1]['jenis_kelamin']}}">{{$detailkodesk['warga'][1]['jenis_kelamin']}}</option>
                                        @endif
                                       <option value="">-Disable-</option>
                                        <?php
                                        for ($i=1; $i<=11; $i++) {
                                            for ($j=0; $j<50; $j++) {
                                                $char = chr(64 + $i);
                                                $value = $char . ($j+1);
                                                echo "<option value='{$value}'>{$value}</option>";
                                            }
                                        }
                                      ?>
                                    </select>
                                </div>
                          
                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Alamat</b></label>
                                  <div class="col-md-3">
                                      <select class="choices form-select" name="alamat_2">
                                        @if(isset($detailkodesk['warga'][1]['alamat']))
                                        <option value="{{$detailkodesk['warga'][1]['alamat']}}">{{$detailkodesk['warga'][1]['alamat']}}</option>
                                        @endif    
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                  </div>
                            </div>
                        @endif
                            <div class="mb-3 row">
                                <div class="divider divider-dark">
                                    <div class="divider-text">Detail Surat</div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <input type="hidden" name="kode_sk" value="{{ $item->kode_sk }}">
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Nomor SK</b></label>
                                      <div class="col-md-3">
                                          <select class="choices form-select" name="no_sk">
                                            @if(isset($detailkodesk['no_sk']))
                                                <option value="{{$detailkodesk['no_sk']}}">{{$detailkodesk['no_sk']}}</option>
                                            @endif      
                                                <option value="">-Disable-</option>
                                              <?php
                                              for ($i=1; $i<=11; $i++) {
                                                  for ($j=0; $j<50; $j++) {
                                                      $char = chr(64 + $i);
                                                      $value = $char . ($j+1);
                                                      echo "<option value='{$value}'>{$value}</option>";
                                                  }
                                              }
                                            ?>
                                          </select>
                                      </div>
                            </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Jabatan</b></label>
                                        <div class="col-md-3">
                                        <select class="choices form-select" name="jabatan">
                                            @if(isset($detailkodesk['jabatan']))
                                            <option value="{{$detailkodesk['jabatan']}}">{{$detailkodesk['jabatan']}}</option>
                                            @endif    
                                            <option value="">-Disable-</option>
                                            <?php
                                            for ($i=1; $i<=11; $i++) {
                                                for ($j=0; $j<50; $j++) {
                                                    $char = chr(64 + $i);
                                                    $value = $char . ($j+1);
                                                    echo "<option value='{$value}'>{$value}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Ttd Kepala Desa</b></label>
                                        <div class="col-md-3">
                                        <select class="choices form-select" name="ttd_kepala">
                                            @if(isset($detailkodesk['ttd_kepala']))
                                            <option value="{{$detailkodesk['ttd_kepala']}}">{{$detailkodesk['ttd_kepala']}}</option>
                                            @endif   
                                            <option value="">-Disable-</option>
                                            <?php
                                            for ($i=1; $i<=11; $i++) {
                                                for ($j=0; $j<50; $j++) {
                                                    $char = chr(64 + $i);
                                                    $value = $char . ($j+1);
                                                    echo "<option value='{$value}'>{$value}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Tanggal Surat</b></label>
                                    <div class="col-md-3">
                                      <select class="choices form-select" name="tanggal">
                                        @if(isset($detailkodesk['tanggal']))
                                        <option value="{{$detailkodesk['tanggal']}}">{{$detailkodesk['tanggal']}}</option>
                                        @endif    
                                         <option value="">-Disable-</option>
                                          <?php
                                          for ($i=1; $i<=11; $i++) {
                                              for ($j=0; $j<50; $j++) {
                                                  $char = chr(64 + $i);
                                                  $value = $char . ($j+1);
                                                  echo "<option value='{$value}'>{$value}</option>";
                                              }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                        <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>Ttd Warga</b></label>
                                        <div class="col-md-3">
                                            <select class="choices form-select" name="ttd_pengaju">
                                                @if(isset($detailkodesk['ttd_pengaju']))
                                                <option value="{{ $detailkodesk['ttd_pengaju'] }}">{{ $detailkodesk['ttd_pengaju'] }}</option>
                                                @endif
                                                <option value="">-Disable-</option>
                                                @for ($i = 1; $i <= 11; $i++)
                                                    @for ($j = 0; $j < 50; $j++)
                                                        @php
                                                            $char = chr(64 + $i);
                                                            $value = $char . ($j + 1);
                                                        @endphp
                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                    @endfor
                                                @endfor
                                            </select>
                                        </div>
                                </div>
                            </div>
                                <div class="mb-3 row">
                                    <div class="divider divider-dark">
                                        <div class="divider-text">Keterangan SK</div>
                                    </div>
                                </div>
                                @foreach ($kodesk as $kodeskKey => $kodeskValue)
                                    @foreach ($keterangankodesk as $key => $value)
                                        @if ($key === $kodeskKey)
                                            <div class="mb-4 row">
                                                <label for="html5-text-input" class="col-md-2 col-form-label text-center"><b>{{ $kodeskValue}}</b></label>
                                                <div class="col-md-7">
                                                    <select class="choices form-select" name="{{ $key }}">
                                                        <option value="{{ $value }}">{{ $value }}</option>
                                                        <option value="">-Disable-</option>
                                                        <?php
                                                        for ($i = 1; $i <= 11; $i++) {
                                                            for ($j = 0; $j < 50; $j++) {
                                                                $char = chr(64 + $i);
                                                                $hasil = $char . ($j + 1);
                                                                echo "<option value='{$hasil}'>{$hasil}</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach

                            
                        </div>
                        <p>*Untuk Menambahkan keterangan isi surat, bisa di-update di "Kode SK/Edit Detail SK" </p>
                        <p>**Jika ingin menghapus data dalam print page, silahkan select -disabled- </p> 
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success me-1 mb-1">Simpan</button>
                                        <a href="{{ url('admindesa/kodesk') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                    </div>
                
             
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

@endpush