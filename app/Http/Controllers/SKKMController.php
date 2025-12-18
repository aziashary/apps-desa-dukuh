<?php

namespace App\Http\Controllers;
use Illuminate\Romans\Support\Facades\IntToRoman as IntToRomanFacade;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SKKM;
use App\Models\Warga;
use TCPDF;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;


class SKKMController extends Controller
{
    function index()
    { 

     $data = SKKM::orderBy('no_skkm', 'ASC')->with('wargas')->get();
     return view('SKKM.index', compact('data'));
    }

    function create()
    { 
        $data= Warga::orderBy('nama_warga', 'ASC')->get();
        return view('SKKM.create', compact('data'));
    }

    function print($id_skkm)
    { 
    //  $data = SKKM::where('id_skkm', $id_skkm)->with('wargas')->get();
    //  return view('SKKM.print', compact('data'));

    // Load the XLS file
    $inputFileType = 'Xls';
    $inputFileName = public_path('plugin\tws.xls');
    $spreadsheet = IOFactory::load($inputFileName);

    // Get the active sheet of the XLS file
    $worksheet = $spreadsheet->getActiveSheet();

    // Retrieve data from the database using Laravel's query builder
    $item = SKKM::where('id_skkm', $id_skkm)->with('wargas')->first();

    // Insert the data into the appropriate cells in the XLS file
    $worksheet->setCellValue('A1', $item->id_skkm);
    $worksheet->setCellValue('A2', $item->keterangan);

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
              <title>Print SKKM</title>
            </head>
            <body onload="window.print();">';
    echo file_get_contents('plugin\file.html');
    echo '</body>
          </html>';
}

    function edit($id_skkm)
    {
     $item = Warga::orderBy('nama_warga', 'ASC')->get();
     $data = SKKM::where('id_skkm', $id_skkm)->get();
        return view('SKKM.edit', [
        'data' => $data,
        'item' => $item,
        ]);
    }

    function store(Request $request)
    {
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
        $id_skkm = SKKM::latest('id_skkm')->select('id_skkm')->value('id_skkm');
        $no_skkm = "140"." /"."  ".($id_skkm+1)."  "."/ ".$returnValue." / ".$yearNow;

     $form_data = array(
      'no_skkm'  => $no_skkm,
      'id_warga'  => $request->id_warga,
      'keterangan'  => $request->keterangan,
      'usulan_surat'  => $request->usulan_surat,
      
     );

     SKKM::create($form_data);

        if($form_data){
            return redirect('/SKKM')->with('success','Berhasil Tambah Data');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function update(Request $request, $id_skkm)
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
        // $id_skkm = SKKM::latest('id_skkm')->select('id_skkm')->value('id_skkm');
        // $no_skkm = "140"." /"."  ".($id_skkm+1)."  "."/ ".$returnValue." / ".$yearNow;

     $form_data = array(
      'id_warga'  => $request->id_warga,
      'keterangan'  => $request->keterangan,
      'usulan_surat'  => $request->usulan_surat,
      
     );

     SKKM::where('id_skkm', $id_skkm)->update($form_data);

        if($form_data){
            return redirect('/SKKM')->with('success','Berhasil Update Data');
        }else{
            return back()->with('error','Gagal Update Data');
        }
    }

    function delete($id_skkm)
    { 
     $destroy = SKKM::where('id_skkm', $id_skkm)->delete();

        if($destroy){
        return redirect('/SKKM')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }


    
}
