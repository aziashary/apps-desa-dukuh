<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kodesk;
use App\Models\Keterangansk;
use Illuminate\Support\Facades\Storage;

class KodeskController extends Controller
{
    function index()
    { 
     $data = Kodesk::with('kets')->orderBy('jenis_sk', 'ASC')->get();
     return view('kodesk.index', compact('data'));
    }

    public function editsk($id_kodesk)
    {
        // mengambil data surat dengan id yang dipilih
        $data = Keterangansk::where('id_kodesk', $id_kodesk)->first();
        $item = Kodesk::where('id_kodesk', $id_kodesk)->first();

        $keterangankodesk = json_decode($data->keterangan, true);
        $detailkodesk = json_decode($data->detail_keterangansk, true);
        $kodesk = json_decode($item->keterangan_kodesk, true);

        // mengirim data surat ke view editsk.blade.php
        return view('kodesk.editsk', compact('data','item','keterangankodesk','detailkodesk','kodesk'));
    }
    
    public function create()
    {
        $item = Kodesk::get();
        return view('kodesk.create', compact('item'));
    }

    public function edit($id_kodesk)
    {
        $kodesk = Kodesk::where('id_kodesk', $id_kodesk)->first();
        $kodesk->keterangan_kodesk = json_decode($kodesk->keterangan_kodesk);
        return view('kodesk.edit', compact('kodesk'));
    }

    public function getketerangan(Request $request)
    {
    $keteranganId = $request->input('keterangan'); // Mengambil nilai jenis_sk_id dari permintaan Ajax

    // Menghasilkan form input otomatis berdasarkan nilai jenis_sk_id
    $formInput = '';

// Tentukan jumlah keterangan berdasarkan nilai $keteranganId
$jumlahKeterangan = $keteranganId;

// Loop untuk membuat blok HTML sesuai dengan jumlah keterangan
for ($i = 2; $i <= $jumlahKeterangan; $i++) {
    $formInput .= '
        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-4 col-form-label text-center"><b>Keterangan ' . $i . '</b></label>
            <div class="col-md-7">
                <input type="text" class="form-control" id="keterangan_' . $i . '" name="keterangan_' . $i . '" placeholder="Keterangan ' . $i . '" required>
            </div>
        </div>';
}

    

    return $formInput; // Mengirimkan form input otomatis sebagai respons
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'kode_sk'=>'required|max:30|unique:kodesk,kode_sk',
            'file' => 'nullable|mimes:xlsx,xls|max:2048',
        ]);

        $keteranganKodesk = [];
        for ($i = 1; $i <= 10; $i++) {
            $fieldName = "keterangan_$i";
            $fieldValue = $request->$fieldName;
            if ($fieldValue !== null) {
                $keteranganKodesk[$fieldName] = $fieldValue;
            }
        }

        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $request->file->move(public_path('plugin\xls'),$namafile);
        $url = "plugin\\xls\\". $namafile;

     $form_data = array(
      'kode_sk'  => $request->kode_sk,
      'jenis_sk'  => $request->jenis_sk,
      'singkatan_sk'  => $request->singkatan_sk,
      'jumlah_warga' => $request->jumlah_warga,
      'file_name' =>  $namafile,
      'url_print' => $url,
      'keterangan_kodesk' => json_encode($keteranganKodesk),
     );

     $kode=Kodesk::create($form_data);

     $id_kodesk = Kodesk::latest('id_kodesk')->select('id_kodesk')->value('id_kodesk');

    //  jumlah keterangan
     $jumlahKeterangan = $request->input('jumlah_keterangan');

     // Buat array untuk menampung keterangan
    $keteranganArray = [];

    // Loop untuk membuat keterangan dalam bentuk array
    for ($i = 1; $i <= $jumlahKeterangan; $i++) {
        $keteranganKey = "keterangan_" . $i;
        $keteranganArray[$keteranganKey] = "";
    }
    

     $ket = Keterangansk::create([
        'id_kodesk' => $id_kodesk,
        'kode_sk' => $request->kode_sk,
        'keterangan' => json_encode($keteranganArray),
     ]);
     

        if($kode){
            return redirect('admindesa/kodesk')->with('success','Berhasil Tambah Data');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function update($id_kodesk, request $request)
    {
        $keteranganKodesk = [];
        for ($i = 1; $i <= 100; $i++) {
            $fieldName = "keterangan_$i";
            $fieldValue = $request->$fieldName;
            if ($fieldValue !== null) {
                $keteranganKodesk[$fieldName] = $fieldValue;
            }
        }

       $kodesk=Kodesk::where('id_kodesk', $id_kodesk)->first();
        $form = array(
            'kode_sk' => $request->kode_sk,
        );
        Keterangansk::where('id_kodesk', $id_kodesk)->update($form);

        if ($request->hasFile('file')) {
            // Hapus file yang sudah ada sebelumnya
            Storage::delete("plugin/xls/". $kodesk->file_name);

            // Upload File Baru
            $file = $request->file('file');
            $namafile = $file->getClientOriginalName();
            $request->file->move(public_path('plugin/xls'),$namafile);
            $url = "plugin\\xls\\". $namafile;
        

        $form_data = array(
            'kode_sk'  => $request->kode_sk,
            'jenis_sk'  => $request->jenis_sk,
            'singkatan_sk'  => $request->singkatan_sk,
            'jumlah_warga' => $request->jumlah_warga,
            'file_name' =>  $namafile,
            'url_print' => $url,
            'keterangan_kodesk' => json_encode($keteranganKodesk),
              
           );
        } else {
            $form_data = array(
                'kode_sk'  => $request->kode_sk,
                'jenis_sk'  => $request->jenis_sk,
                'singkatan_sk'  => $request->singkatan_sk,
                'jumlah_warga' => $request->jumlah_warga,
                'keterangan_kodesk' => json_encode($keteranganKodesk),
               );
        }

        $kode=Kodesk::where('id_kodesk', $id_kodesk)->update($form_data);

        if($kode){
            return redirect('admindesa/kodesk')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function updatesk($id_kodesk, request $request)
    {
        $keteranganKodesk = [];
        for ($i = 1; $i <= 100; $i++) {
            $fieldName = "keterangan_$i";
            $fieldValue = $request->$fieldName;
            if ($fieldValue !== null) {
                $keteranganKodesk[$fieldName] = $fieldValue;
            }
        }
        

        $form_data = array(
        'kode_sk' => $request->kode_sk,
        'detail_keterangansk' => json_encode([
            'no_sk' => $request->no_sk,
            'warga' => [
                [
                    'nik' => $request->nik,
                    'nama_warga' => $request->nama_warga,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'jenis_pekerjaan' => $request->jenis_pekerjaan,
                    'agama' => $request->agama,
                ],
                [
                    'nik' => $request->nik_2,
                    'nama_warga' => $request->nama_warga_2,
                    'jenis_kelamin' => $request->jenis_kelamin_2,
                    'tempat_lahir' => $request->tempat_lahir_2,
                    'tanggal_lahir' => $request->tanggal_lahir_2,
                    'alamat' => $request->alamat_2,
                    'jenis_pekerjaan' => $request->jenis_pekerjaan_2,
                    'agama' => $request->agama_2,
                ],
                // Tambahkan warga ketiga atau lebih jika diperlukan
            ],
            'tanggal'=> $request->tanggal,
            'jabatan'=> $request->jabatan,
            'ttd_pengaju'=> $request->ttd_pengaju,
            'ttd_kepala'=> $request->ttd_kepala
        ]),
        'keterangan' => json_encode(
         $keteranganKodesk,
        )
                  
           );
        
        $cekkode=Keterangansk::where('id_kodesk', $id_kodesk)->get();

        if ($cekkode->isEmpty()) {
            $kode=Keterangansk::create($form_data);
        }else{
            $kode=Keterangansk::where('id_kodesk', $id_kodesk)->update($form_data);
        }

        if($kode){
            return redirect('admindesa/kodesk')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function delete($id_kodesk)
    { 
     $destroy = Kodesk::where('id_kodesk', $id_kodesk)->delete();

        if($destroy){
        return redirect('admindesa/kodesk')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }


}
