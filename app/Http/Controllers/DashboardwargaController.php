<?php

namespace App\Http\Controllers;

use App\Models\Kodesk;
use Illuminate\Http\Request;
use App\Models\SKKM;
use App\Models\Warga;
use App\Models\Pengajuan;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class DashboardwargaController extends Controller
{
    public function index()
    {
     $warga = Warga::count();
     $skkm = SKKM::count();
     $chart = LarapexChart::setType('donut')
                ->setDataset([
                    SKKM::count()
                ])
                ->setColors(['#435ebe','#55c6e8'])
                ->setLabels(['SKKM', 'SKU']);
    
     $char = LarapexChart::setType('bar')
                ->setDataset([
                    SKKM::whereMonth('created_at','01')->count(),
                    SKKM::whereMonth('created_at','02')->count()
                ])
                ->setColors(['#435ebe','#55c6e8'])
                ->setLabels(['Jan', 'Feb']);

    $pengajuanproses = Pengajuan::where('id_warga', auth()->user()->id_warga)->count();
    $approve =  Pengajuan::where('status_pengajuan','Approved')->where('id_warga', auth()->user()->id_warga)->count();
    $selesai = Notification::where('id_warga', auth()->user()->id_warga)
                       ->whereNotNull('id_sk')
                       ->count();


     return view('dashboardwarga', [
        'warga' => $warga, 
        'skkm' => $skkm,
        'pengajuan' => $pengajuanproses,
        'approve' =>$approve,
        'selesai' =>$selesai,
        'chart' => $chart,
        'char' => $char
     ]);
    }

    public function profile()
    {
        $username = auth()->user()->username;
        $data = Warga::where('nik', $username)->get();
            return view('lamanwarga.profile', compact('data'));
    }

    public function pengajuan()
    {
        $username = auth()->user()->username;
        $warga = Warga::where('nik', $username)->first();
        $no_kk = $warga->no_kk;

        // Ambil semua warga yang memiliki no_kk tersebut
        $wargasDenganNoKK = Warga::where('no_kk', $no_kk)->pluck('id_warga');

        // Ambil data pengajuan untuk semua id_warga yang memiliki no_kk tersebut
        $data = Pengajuan::whereIn('id_warga', $wargasDenganNoKK)->get();

        return view('lamanwarga.index', compact('data'));
    }

    public function getUnreadNotifications()
    {
        // Pastikan Auth::user() mengembalikan pengguna yang sedang login
        $id_warga = Auth::user()->id_warga;

        $notifications = Notification::where('id_warga', $id_warga)
                                     ->where('is_read', false)
                                     ->orderBy('created_at', 'desc')
                                     ->get(['message', 'created_at']);

        return response()->json($notifications);
    }

    function create()
    { 
        $username = auth()->user()->username;
        $no_kk = Warga::where('nik', $username)->pluck('no_kk')->first();

        $data= Warga::where('no_kk', $no_kk)->orderBy('nama_warga', 'ASC')->get();
        $item= Kodesk::orderBy('jenis_sk', 'ASC')->get();
        return view('lamanwarga.create', compact('data','item'));
    }

    public function getFormInput(Request $request)
{
    $jenisSkId = $request->input('jenis_sk_id'); // Mengambil nilai jenis_sk_id dari permintaan Ajax

    // Menghasilkan form input otomatis berdasarkan nilai jenis_sk_id
    $kodesk = Kodesk::where('kode_sk', $jenisSkId)->first();
    $data = Warga::orderBy('nama_warga', 'ASC')->get();

    $keteranganKodesk = json_decode($kodesk->keterangan_kodesk, true);

    if ($kodesk->jumlah_warga == 2) {
        $formInput = "<h6>Nama Warga Kedua</h6>
        <div class='form-group'>
            <select class='choices form-select' name='id_warga_2'>";
        
        foreach ($data as $warga) {
            $formInput .= "<option value='{$warga->id_warga}'>{$warga->nama_warga}</option>";
        }
        
        $formInput .= "</select></div><br>";
    } else {
        $formInput = "";
    }

    // Surat
        foreach ($keteranganKodesk as $key => $value) {
    $formInput .= "<h6>$value</h6>
        <small class='text-muted'><i>Maks. 100 Karakter</i></small>
        <div class='form-group'>
            <input type='text' class='form-control' id='$key' name='$key' value='' maxlength='100' required>
        </div>
        <br>";
    }
    

    return $formInput; // Mengirimkan form input otomatis sebagai respons
}

    function edit($id_pengajuan)
    {
     $item = Warga::orderBy('nama_warga', 'ASC')->get();
     $data = Pengajuan::where('id_pengajuan', $id_pengajuan)->get();
        return view('lamanwarga.edit', [
        'data' => $data,
        'item' => $item,
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            'berkas_1' => 'required|file|max:2048', // Berkas 1 wajib diunggah dan maksimum 2MB
            'berkas_2' => 'file|max:2048', // Berkas 2 maksimum 2MB (opsional)
            'berkas_3' => 'file|max:2048', // Berkas 3 maksimum 2MB (opsional)
        ]);

        $MonthNow = date('m'); // Ambil bulan saat ini dalam format angka (01 - 12)
        $yearNow = date('Y'); // Ambil tahun saat ini

// Mendapatkan angka bulan dalam format Romawi
        $map = array(
            'XII' => 12, 'XI' => 11, 'X' => 10, 'IX' => 9, 'VIII' => 8, 'VII' => 7,
            'VI' => 6, 'V' => 5, 'IV' => 4, 'III' => 3, 'II' => 2, 'I' => 1
        );

        $returnValue = '';
        foreach ($map as $roman => $int) {
            if ($MonthNow == $int) {
                $returnValue = $roman;
                break;
            }
        }

        // Mendapatkan nomor urutan pengajuan terakhir
        $id_pengajuan = Pengajuan::latest('id_pengajuan')->select('id_pengajuan')->value('id_pengajuan');

        // Membuat nomor pengajuan baru dengan format yang diinginkan
        $no_pengajuan = "PNG-" . ($id_pengajuan + 1) . $yearNow . date('dm');
        $jenis_sk = Kodesk::where('kode_sk', $request->kode_sk)->pluck('jenis_sk')->first();

        // Array Keterangan
        $keterangansk = [];
        for ($i = 1; $i <= 100; $i++) {
            $fieldName = "keterangan_$i";
            $fieldValue = $request->$fieldName;
            if ($fieldValue !== null) {
                $keterangansk[$fieldName] = $fieldValue;
            }
        }

        $warga_1 = Warga::where('id_warga', $request->id_warga_1)->first();
        $warga_2 = Warga::where('id_warga', $request->id_warga_2)->first();
        
        if ($request->hasFile('berkas_1')) {
            $berkas1 = $request->file('berkas_1');
            
            // Membuat nama file yang unik dengan menambahkan timestamp atau ID warga, dll.
            $namaBerkas1 = uniqid() . '_' . $berkas1->getClientOriginalName();
            
            // Menentukan path tujuan
            $destinationPath = public_path('plugin/berkas');
            
            // Memastikan direktori tujuan ada, jika tidak maka dibuat
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            // Memindahkan file ke direktori tujuan
            $berkas1->move($destinationPath, $namaBerkas1);
            
            // Membuat URL untuk file yang diunggah
            $url_berkas_1 = "plugin/berkas/" . $namaBerkas1;
        
            // Lakukan sesuatu dengan $url_berkas_1, misalnya menyimpannya ke database
        }
        
        // Meng-handle upload berkas 2 (opsional)
        if ($request->hasFile('berkas_2')) {
            $berkas2 = $request->file('berkas_2');
            
            // Membuat nama file yang unik dengan menambahkan timestamp atau ID warga, dll.
            $namaBerkas2 = uniqid() . '_' . $berkas2->getClientOriginalName();
            
            // Menentukan path tujuan
            $destinationPath = public_path('plugin/berkas');
            
            // Memastikan direktori tujuan ada, jika tidak maka dibuat
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            // Memindahkan file ke direktori tujuan
            $berkas2->move($destinationPath, $namaBerkas2);
            
            // Membuat URL untuk file yang diunggah
            $url_berkas_2 = "plugin/berkas/" . $namaBerkas2;
        
            // Lakukan sesuatu dengan $url_berkas_2, misalnya menyimpannya ke database
        }
        

        // Meng-handle upload berkas 3 (opsional)
        if ($request->hasFile('berkas_3')) {
            $berkas3 = $request->file('berkas_3');
            
            // Membuat nama file yang unik dengan menambahkan timestamp atau ID warga, dll.
            $namaBerkas3 = uniqid() . '_' . $berkas3->getClientOriginalName();
            
            // Menentukan path tujuan
            $destinationPath = public_path('plugin/berkas');
            
            // Memastikan direktori tujuan ada, jika tidak maka dibuat
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            // Memindahkan file ke direktori tujuan
            $berkas3->move($destinationPath, $namaBerkas3);
            
            // Membuat URL untuk file yang diunggah
            $url_berkas_3 = "plugin/berkas/" . $namaBerkas3;
        
            // Lakukan sesuatu dengan $url_berkas_1, misalnya menyimpannya ke database
        }
        

     $form_data = array(
      'no_pengajuan'  => $no_pengajuan,
      'kode_sk' => $request->kode_sk,
      'id_warga'  =>  $warga_1->id_warga,
      'jenis_pengajuan' => $jenis_sk,
      'status_pengajuan' => 'Process',
      'detail_pengajuan' => json_encode([
        'no_pengajuan' => $no_pengajuan,
        'warga' => [
            [
                'nik' => $warga_1->nik,
                'nama_warga' => $warga_1->nama_warga,
                'jenis_kelamin' => $warga_1->jenis_kelamin,
                'tempat_lahir' => $warga_1->tempat_lahir,
                'tanggal_lahir' => $warga_1->tanggal_lahir,
                'alamat' => $warga_1->alamat,
                'jenis_pekerjaan' => $warga_1->jenis_pekerjaan,
                'agama' => $warga_1->agama,
            ],
            $warga_2 !== null ? [
                'nik' => $warga_2->nik,
                'nama_warga' => $warga_2->nama_warga,
                'jenis_kelamin' => $warga_2->jenis_kelamin,
                'tempat_lahir' => $warga_2->tempat_lahir,
                'tanggal_lahir' => $warga_2->tanggal_lahir,
                'alamat' => $warga_2->alamat,
                'jenis_pekerjaan' => $warga_2->jenis_pekerjaan,
                'agama' => $warga_2->agama,
            ] : [],
            // Tambahkan warga ketiga atau lebih jika diperlukan
        ],
    ]),
    'keterangan_pengajuan' => json_encode($keterangansk),
    'berkas_1' => $url_berkas_1,
    'berkas_2' => $url_berkas_2,
    'berkas_3' => $url_berkas_3,
      
     );

     Pengajuan::create($form_data);

        if($form_data){
            return redirect('/dashboardwarga/pengajuan')->with('success','Berhasil Tambah Data');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function update(Request $request, $id_pengajuan)
    {
        // $MonthNow = date('M');
        // $month_number = date("n",strtotime($MonthNow));

        // $map = array('X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        // $returnValue = '';
        // while ($month_number > 0) {
        // foreach ($map as $roman => $int) {
        //     if($month_number >= $int) {
        //         $month_number -= $int;
        //         $returnValue .= $roman;
        //         break;
        //         }
        //     }
        // }
        

        // $yearNow = date('Y');
        // $id_pengajuan = Pengajuan::latest('id_pengajuan')->select('id_pengajuan')->value('id_pengajuan');
        // $no_pengajuan = "140"." /"."  ".($id_pengajuan+1)."  "."/ ".$returnValue." / ".$yearNow;

     $form_data = array(
      'id_warga'  => $request->id_warga,
      'keterangan_1'  => $request->keterangan_1,
      'keterangan_2'  => $request->keterangan_2,
      'keterangan_3'  => $request->keterangan_3,
      'keterangan_4'  => $request->keterangan_4,
      
     );

     Pengajuan::where('id_pengajuan', $id_pengajuan)->update($form_data);

        if($form_data){
            return redirect('dashboardwarga/edit')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function delete($id_pengajuan)
    { 
     $destroy = Pengajuan::where('id_pengajuan', $id_pengajuan)->delete();

        if($destroy){
        return redirect('dashboardwarga/pengajuan')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }
}
