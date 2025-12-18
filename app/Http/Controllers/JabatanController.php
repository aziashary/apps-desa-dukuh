<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Response;
use Image;

class jabatanController extends Controller
{
    function index()
    {
     $data = Jabatan::orderBy('id_kategori_jabatan', 'ASC')->get();
     return view('jabatan.index', compact('data'))
       ;
    }

    function create()
    {
     $data = Jabatan::latest()->paginate();
     return view('jabatan.create', compact('data'))
       ;
    }

    public function edit($id_jabatan)
    {
        $item = Jabatan::where('jabatan.id_jabatan','=',$id_jabatan)->get();
        return view('jabatan.edit')->with('data', $item);
    }

    function store(Request $request)
    {
        if($request->id_kategori_jabatan =='JBTN1'){
            $kategori_jabatan = 'Aparatur Desa';
        }elseif($request->id_kategori_jabatan =='JBTN2'){
            $kategori_jabatan = 'BPD';
        }elseif($request->id_kategori_jabatan =='JBTN3'){
            $kategori_jabatan = 'RT/RW';
        }elseif($request->id_kategori_jabatan =='JBTN4'){
            $kategori_jabatan = 'LINMAS';
        }elseif($request->id_kategori_jabatan =='JBTN5'){
            $kategori_jabatan = 'LPM';
        }else{
            $kategori_jabatan = 'Uncategorized';
        }
        
     $form_data = array(
      'nama_jabatan'  => $request->nama_jabatan,
      'id_kategori_jabatan'  => $request->id_kategori_jabatan,
      'kategori_jabatan'  => $kategori_jabatan
     );

     Jabatan::create($form_data);

     if($form_data){
        return redirect('admindesa/jabatan')->with('success','Berhasil Tambah Data');
    }else{
        return back()->with('error','Gagal Tambah Data');
    }
    }

    function update(Request $request, $id_jabatan)
    {
        if($request->id_kategori_jabatan =='JBTN1'){
            $kategori_jabatan = 'Aparatur Desa';
        }elseif($request->id_kategori_jabatan =='JBTN2'){
            $kategori_jabatan = 'BPD';
        }elseif($request->id_kategori_jabatan =='JBTN3'){
            $kategori_jabatan = 'RT/RW';
        }elseif($request->id_kategori_jabatan =='JBTN4'){
            $kategori_jabatan = 'LINMAS';
        }elseif($request->id_kategori_jabatan =='JBTN5'){
            $kategori_jabatan = 'LPM';
        }else{
            $kategori_jabatan = 'Uncategorized';
        }

        $form_data = array(
            'nama_jabatan'  => $request->nama_jabatan,
            'id_kategori_jabatan'  => $request->id_kategori_jabatan,
            'kategori_jabatan'  => $kategori_jabatan
           );
       

    Jabatan::where('id_jabatan', $request->id_jabatan)->update($form_data);

     if($form_data){
        return redirect('admindesa/jabatan')->with('success','Berhasil Update Data');
    }else{
        return back()->with('error','Gagal Update Data');
    }
    }

    public function delete($id_jabatan)
    {
        $destroy = Jabatan::where('id_jabatan',$id_jabatan)->delete();

        return redirect('admindesa/jabatan')->with('success','Berhasil menghapus data');
    }

    
}