<?php

namespace App\Http\Controllers;

use App\Models\Keterangansk;
use Illuminate\Romans\Support\Facades\IntToRoman as IntToRomanFacade;

use Illuminate\Http\Request;
use App\Models\SK;
use App\Models\Kodesk;
use App\Models\Warga;
use App\Models\Aparaturdesa;
use App\Models\Pengajuan;
use App\Models\Notification;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf;

class SKController extends Controller
{
    function index()
    { 
     $data = SK::orderBy('no_sk', 'ASC')->with('wargas')->with('sks')->get();
     $aparaturdesa = Aparaturdesa::where('kategori_jabatan','Aparatur Desa')->orderBy('id_jabatan', 'ASC')->get();
     return view('sk.index', compact('data','aparaturdesa'));
    }

    function create()
    { 
        $data= Warga::orderBy('nama_warga', 'ASC')->get();
        $item= Kodesk::orderBy('jenis_sk', 'ASC')->get();
        return view('sk.create', compact('data','item'));
    }

    function selesai($id_sk)
    { 
        $status = Notification::where('id_sk', $id_sk)->get();

            // Periksa apakah $status kosong atau tidak
            if (!$status->isEmpty()) {
                // Jika kosong, artinya tidak ada notifikasi yang sesuai
                return back()->with('error', 'No Surat ini telah diupdate');
            }

            // Ambil data SK terkait
            $data = SK::where('id_sk', $id_sk)->with('wargas')->with('sks')->first();

            // Pastikan data SK ada sebelum mencoba membuat notifikasi baru
            if (!$data) {
                return back()->with('error', 'Data SK tidak ditemukan');
            }

            // Buat notifikasi surat selesai
            $selesai = Notification::create([
                'id_warga' => $data->id_warga,
                'id_sk' => $id_sk,
                'message' =>  "Status <strong>{$data->jenis_sk}</strong> Anda dengan nomor <strong>{$data->no_sk}</strong> telah <strong>SELESAI</strong>. Silahkan pergi ke kantor desa untuk pengambilan surat."
            ]);

        if ($selesai) {
                return redirect('admindesa/SK')->with('success', 'Berhasil Update Status Surat');
            } else {
                return back()->with('error', 'Gagal Memperbarui Data');
        }

    }

    public function pengajuan()
    {
        $data = Pengajuan::where('status_pengajuan', 'Denied')
            ->orWhere('status_pengajuan', 'Approved')
            ->orderBy('created_at', 'DESC')
            ->with('wargas')->get();
        return view('sk.pengajuan', compact('data'));
    }

    public function pengajuan_baru()
    {
        $data = Pengajuan::where('status_pengajuan', 'Process')
            ->orderBy('created_at', 'DESC')
            ->with('wargas')->get();
            foreach ($data as $pengajuan) {
                $pengajuan->keterangan_pengajuan = json_decode($pengajuan->keterangan_pengajuan, true);
            }
        return view('sk.pengajuan_baru', compact('data'));
    }

    
    public function detail(Request $request, $id_pengajuan)
    {
        $request->validate([
            'status_pengajuan' => 'required', // Add validation rule for status_pengajuan field
        ]);
        $update = Pengajuan::where('id_pengajuan', $id_pengajuan)->update([
            'status_pengajuan' => $request->status_pengajuan,
        ]);
        Notification::create([
            'id_warga' => $request->id_warga,
            'message' =>  "Status pengajuan <strong>{$request->jenis_pengajuan}</strong> Anda dengan nomor <strong>{$request->no_pengajuan}</strong> 
            telah di <strong>{$request->status_pengajuan}</strong>."
        ]);

        // Variable Memasukan data ke table SK
            if($request->status_pengajuan == 'Approved'){
                $MonthNow = date('M');
            $month_number = date("n",strtotime($MonthNow));

            $map = array('X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
            $returnValue = '';
            while ($month_number > 0) {
            foreach ($map as $roman => $int) {
                if($month_number >= $int) {
                    $month_number -= $int;
                    $returnValue .= $roman;
                    break;
                    }
                }
            }
            

            $yearNow = date('Y');
            $regis_sk = SK::where('kode_sk', $request->kode_sk)->count();
            $no_sk = ($request->kode_sk)." /"."  ".($regis_sk+1)."  "."/ ".$returnValue." / ".$yearNow;
            $id_kodesk = Kodesk::where('kode_sk', $request->kode_sk)->select('id_kodesk')->value('id_kodesk');
            $pengajuan = Pengajuan::where('no_pengajuan', $request->no_pengajuan)->first();

        $form_data = array(
        'no_sk'  => $no_sk,
        'id_kodesk' => $id_kodesk,
        'kode_sk' => $request->kode_sk,
        'jenis_sk' => $request->jenis_pengajuan,
        'id_warga'  => $request->id_warga,
        'detail_sk' => $pengajuan->detail_pengajuan,
        'keterangan_sk' => $pengajuan->keterangan_pengajuan,
        'jenis_sk' => $pengajuan->jenis_pengajuan
        
        );

        $sk=SK::create($form_data);
        
        
            }

        if($update){
            return redirect('admindesa/SK/pengajuan_baru')->with('success','Berhasil Update Status Data');
        }else{
            return back()->with('error','Gagal Memperbarui Data');
        } 
    }

    function print(Request $request)
    { 
    //  $data = SK::where('id_sk', $id_sk)->with('wargas')->get();
    //  return view('sk.print', compact('data'));

    // Load the XLS file
    $data = SK::where('id_sk', $request->id_sk)->with('sks')->first();
    $inputFileType = 'Xls';
    $inputFileName = public_path($data->sks->url_print);
    $spreadsheet = IOFactory::load($inputFileName);

    // Get the active sheet of the XLS file
    $worksheet = $spreadsheet->getActiveSheet();

    // Retrieve data from the database using Laravel's query builder
    // Data SK
    $item = SK::where('id_sk', $request->id_sk)->with('wargas')->first();
    $kets = Keterangansk::where('id_kodesk', $data->id_kodesk)->first();
    $aparatur = Aparaturdesa::where('id_aparatur', $request->ttd_kepala)->first();

    $keterangankodesk = json_decode($kets->keterangan, true);
    $detailkodesk = json_decode($kets->detail_keterangansk, true);
    $detailsk = json_decode($item->detail_sk, true);
    $keterangansk = json_decode($item->keterangan_sk, true);
    
    // Keterangan SK
    

    // Insert the data into the appropriate cells in the XLS file
    if (!empty($detailkodesk['no_sk'])) {
        $worksheet->setCellValue($detailkodesk['no_sk'], $item->no_sk);
    }
    
    if (!empty($detailkodesk['warga'][0]['nama_warga'])) {
        $worksheet->setCellValue($detailkodesk['warga'][0]['nama_warga'], $detailsk['warga'][0]['nama_warga']);
    }

    if (!empty($detailkodesk['warga'][0]['tanggal_lahir'])) {
        $worksheet->setCellValue($detailkodesk['warga'][0]['tanggal_lahir'], date('d-m-Y', strtotime($detailsk['warga'][0]['tanggal_lahir'])));
    }

    if (!empty($detailkodesk['warga'][0]['tempat_lahir'])) {
        $worksheet->setCellValue($detailkodesk['warga'][0]['tempat_lahir'], $detailsk['warga'][0]['tempat_lahir']);
    }

    if (!empty($detailkodesk['warga'][0]['jenis_kelamin'])) {
        $worksheet->setCellValue($detailkodesk['warga'][0]['jenis_kelamin'], $detailsk['warga'][0]['jenis_kelamin']);
    }
    
    if (!empty($detailkodesk['warga'][0]['nik'])) {
        $worksheet->setCellValue($detailkodesk['warga'][0]['nik'], $detailsk['warga'][0]['nik']);
    }
    
    if (!empty($detailkodesk['warga'][0]['jenis_pekerjaan'])) {
        $worksheet->setCellValue($detailkodesk['warga'][0]['jenis_pekerjaan'], $detailsk['warga'][0]['jenis_pekerjaan']);
    }
    
    if (!empty($detailkodesk['warga'][0]['agama'])) {
        $worksheet->setCellValue($detailkodesk['warga'][0]['agama'], $detailsk['warga'][0]['agama']);
    
    if (!empty($detailkodesk['warga'][0]['alamat'])) {
        $worksheet->setCellValue($detailkodesk['warga'][0]['alamat'], $detailsk['warga'][0]['alamat']);
    }

    if (!empty($detailkodesk['warga'][1]['nama_warga'])) {
        $worksheet->setCellValue($detailkodesk['warga'][1]['nama_warga'], $detailsk['warga'][1]['nama_warga']);
    }

    if (!empty($detailkodesk['warga'][1]['tanggal_lahir'])) {
        $worksheet->setCellValue($detailkodesk['warga'][1]['tanggal_lahir'], date('d-m-Y', strtotime($detailsk['warga'][1]['tanggal_lahir'])));
    }

    if (!empty($detailkodesk['warga'][1]['tempat_lahir'])) {
        $worksheet->setCellValue($detailkodesk['warga'][1]['tempat_lahir'], $detailsk['warga'][1]['tempat_lahir']);
    }

    if (!empty($detailkodesk['warga'][1]['jenis_kelamin'])) {
        $worksheet->setCellValue($detailkodesk['warga'][1]['jenis_kelamin'], $detailsk['warga'][1]['jenis_kelamin']);
    }
    
    if (!empty($detailkodesk['warga'][1]['nik'])) {
        $worksheet->setCellValue($detailkodesk['warga'][1]['nik'], $detailsk['warga'][1]['nik']);
    }
    
    if (!empty($detailkodesk['warga'][1]['jenis_pekerjaan'])) {
        $worksheet->setCellValue($detailkodesk['warga'][1]['jenis_pekerjaan'], $detailsk['warga'][1]['jenis_pekerjaan']);
    }
    
    if (!empty($detailkodesk['warga'][1]['agama'])) {
        $worksheet->setCellValue($detailkodesk['warga'][1]['agama'], $detailsk['warga'][1]['agama']);
    }
    
    if (!empty($detailkodesk['warga'][1]['alamat'])) {
        $worksheet->setCellValue($detailkodesk['warga'][1]['alamat'], $detailsk['warga'][1]['alamat']);
    }
    
    for ($i = 1; $i <= 20; $i++) {
        $kunci = "keterangan_$i";
    
        if (!empty($keterangankodesk[$kunci]) && !empty($keterangansk[$kunci])) {
            $worksheet->setCellValue($keterangankodesk[$kunci], $keterangansk[$kunci]);
        }
    }
    
    
    if (!empty($detailkodesk['tanggal'])) {
    $worksheet->setCellValue($detailkodesk['tanggal'], date('d-m-Y', strtotime($item->created_at)));
    }

    if (!empty($detailkodesk['ttd_kepala'])) {
        $worksheet->setCellValue($detailkodesk['ttd_kepala'], $aparatur->nama_aparatur);
    }

    if (!empty($detailkodesk['jabatan'])) {
        $worksheet->setCellValue($detailkodesk['jabatan'], $aparatur->nama_jabatan);
    }
    
    if (!empty($detailkodesk['ttd_pengaju'])) {
        $worksheet->setCellValue($detailkodesk['ttd_pengaju'], $item->wargas->nama_warga);
    }
    
}   
    
    


    // Convert the Excel file to HTML
    $writer = new Html($spreadsheet);
    $writer->save('plugin\file.html');

    // Set the headers to display the HTML directly in the browser
    header('Content-Type: text/html; charset=utf-8');
    header('Content-Disposition: inline; filename="file.html"');
    header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');

    // Output the HTML file to the browser
    echo '<!DOCTYPE html>
          <html>
            <head>
              <title>Print SKU</title>
            </head>
            <body onload="window.print();">';
    echo file_get_contents('plugin\file.html');
    echo '</body>
          </html>';
}

    function excel(Request $request)
    { 
    //  $data = SK::where('id_sk', $id_sk)->with('wargas')->get();
    //  return view('sk.print', compact('data'));

    // Load the XLS file
    $data = SK::where('id_sk', $request->id_sk)->with('sks')->first();
    $inputFileType = 'Xls';
    $inputFileName = public_path($data->sks->url_print);
    $spreadsheet = IOFactory::load($inputFileName);

    // Get the active sheet of the XLS file
    $worksheet = $spreadsheet->getActiveSheet();

    // Retrieve data from the database using Laravel's query builder
    // Data SK
    $item = SK::where('id_sk', $request->id_sk)->with('wargas')->first();
    $kets = Keterangansk::where('kode_sk', $data->kode_sk)->first();
    $aparatur = Aparaturdesa::where('id_aparatur', $request->ttd_kepala)->first();
    
    // Keterangan SK
    $namafile = $data->sks->singkatan_sk . ' - ' . $item->wargas->nama_warga . ' - ' . $item->no_sk;

    // Insert the data into the appropriate cells in the XLS file
    if (!empty($kets->no_sk)) {
        $worksheet->setCellValue($kets->no_sk, $item->no_sk);
    }
    
    if (!empty($kets->nama_warga)) {
        $worksheet->setCellValue($kets->nama_warga, $item->wargas->nama_warga);
    }

    if (!empty($kets->tanggal_lahir)) {
        $worksheet->setCellValue($kets->tanggal_lahir, date('d-m-Y', strtotime($item->wargas->tanggal_lahir)));
    }

    if (!empty($kets->tempat_lahir)) {
        $worksheet->setCellValue($kets->tempat_lahir, $item->wargas->tempat_lahir);
    }
    
    if (!empty($kets->nik)) {
        $worksheet->setCellValue($kets->nik, $item->wargas->nik);
    }
    
    if (!empty($kets->jenis_pekerjaan)) {
        $worksheet->setCellValue($kets->jenis_pekerjaan, $item->wargas->jenis_pekerjaan);
    }
    
    if (!empty($kets->agama)) {
        $worksheet->setCellValue($kets->agama, $item->wargas->agama);
    }
    
    if (!empty($kets->alamat)) {
        $worksheet->setCellValue($kets->alamat, $item->wargas->alamat);
    }
    
    if (!empty($kets->keterangan_1)) {
        $worksheet->setCellValue($kets->keterangan_1, $item->keterangan_1);
    }
    
    if (!empty($kets->keterangan_2)) {
        $worksheet->setCellValue($kets->keterangan_2, $item->keterangan_2);
    }
    
    if (!empty($kets->keterangan_3)) {
        $worksheet->setCellValue($kets->keterangan_3, $item->keterangan_3);
    }
    
    if (!empty($kets->keterangan_4)) {
        $worksheet->setCellValue($kets->keterangan_4, $item->keterangan_4);
    }
    
    if (!empty($kets->tanggal)) {
    $worksheet->setCellValue($kets->tanggal, date('d-m-Y', strtotime($item->created_at)));
    }

    if (!empty($kets->ttd_kepala)) {
        $worksheet->setCellValue($kets->ttd_kepala, $aparatur->nama_aparatur);
    }

    if (!empty($kets->jabatan)) {
        $worksheet->setCellValue($kets->jabatan, $aparatur->nama_jabatan);
    }
    
    if (!empty($kets->ttd_pengaju)) {
        $worksheet->setCellValue($kets->ttd_pengaju, $item->wargas->nama_warga);
    }
    
    


    // Simpan file Excel yang telah diperbarui dalam memory
    ob_start();
    $writer = new Xls($spreadsheet);
    $writer->save('php://output');
    $excelData = ob_get_clean();

    // Set the appropriate headers for file download
    $headers = [
        'Content-Type' => 'application/vnd.ms-excel',
        'Content-Disposition' => 'attachment; filename="' . $namafile . '.xls"',
    ];

    // Menggunakan response()->make() untuk mengirimkan file sebagai respons unduhan dari data yang disimpan dalam memory
    return response()->make($excelData, 200, $headers);
}

    function edit($id_sk)
    {
     $item = Warga::orderBy('nama_warga', 'ASC')->get();
     $data = SK::where('id_sk', $id_sk)->with('wargas')->with('sks')->get();
     $kodesk = SK::where('id_sk', $id_sk)->first();
     $kode = Kodesk::where('kode_sk', $kodesk->kode_sk)->get();
        return view('sk.edit', [
        'data' => $data,
        'item' => $item,
        'kode' => $kode,
        ]);
    }

    function store(Request $request)
    {
        // Penentuan NO surat
        $MonthNow = date('M');
        $month_number = date("n",strtotime($MonthNow));

        $map = array('X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($month_number > 0) {
        foreach ($map as $roman => $int) {
            if($month_number >= $int) {
                $month_number -= $int;
                $returnValue .= $roman;
                break;
                }
            }
        }

        $yearNow = date('Y');
        $regis_sk = SK::where('kode_sk', $request->kode_sk)->count();
        $no_sk = ($request->kode_sk)." /"."  ".($regis_sk+1)."  "."/ ".$returnValue." / ".$yearNow;
        
        // Array Keterangan
        $keterangansk = [];
        for ($i = 1; $i <= 100; $i++) {
            $fieldName = "keterangan_$i";
            $fieldValue = $request->$fieldName;
            if ($fieldValue !== null) {
                $keterangansk[$fieldName] = $fieldValue;
            }
        }

        //Elemen yang diperlukan
        $jenis_sk = Kodesk::where('kode_sk', $request->kode_sk)->first();
        $warga_1 = Warga::where('id_warga', $request->id_warga_1)->first();
        $warga_2 = Warga::where('id_warga', $request->id_warga_2)->first();

     $form_data = array(
      'no_sk'  => $no_sk,
      'kode_sk' => $request->kode_sk,
      'jenis_sk' => $jenis_sk->jenis_sk,
      'id_kodesk' => $jenis_sk->id_kodesk,
      'id_warga'  => $request->id_warga_1,
      'detail_sk' => json_encode([
        'no_sk' => $no_sk,
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
      'keterangan_sk' => json_encode($keterangansk),
      
     );

     $sk = SK::create($form_data);

        if($sk){
            return redirect('admindesa/SK')->with('success','Data berhasil ditambahkan!');
        } else {
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function update(Request $request, $id_sk)
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
        // $id_sk = SK::latest('id_sk')->select('id_sk')->value('id_sk');
        // $no_sk = "140"." /"."  ".($id_sk+1)."  "."/ ".$returnValue." / ".$yearNow;

        $keterangansk = [];
        for ($i = 1; $i <= 100; $i++) {
            $fieldName = "keterangan_$i";
            $fieldValue = $request->$fieldName;
            if ($fieldValue !== null) {
                $keterangansk[$fieldName] = $fieldValue;
            }
        }

     $form_data = array(
      'id_warga'  => $request->id_warga,
      'keterangan_sk' => json_encode($keterangansk),
      
     );

     SK::where('id_sk', $id_sk)->update($form_data);

        if($form_data){
            return redirect('admindesa/SK')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function delete($id_sk)
    { 
     $destroy = SK::where('id_sk', $id_sk)->delete();

        if($destroy){
        return redirect('admindesa/SK')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }

    
}
