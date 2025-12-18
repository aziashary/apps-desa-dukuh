<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Illuminate\Support\Facades\Response;
use Image;

class KomentarController extends Controller
{
    function index()
    {
     $data = Komentar::latest()->paginate();
     return view('komentar.index', compact('data'))
       ;
    }

    function create()
    {
     $data = Komentar::latest()->paginate();
     return view('komentar.create', compact('data'))
       ;
    }

    public function detail($id_komentar)
    {
        $item = Komentar::where('komentar.id_komentar','=',$id_komentar)->get();

        return view('komentar.detail')->with('data', $item);
    }

    function store(Request $request)
    {

     $form_data = array(
      'nama'  => $request->nama,
      'email'  => $request->email,
      'subjek' => $request->subjek,
      'komentar' => $request->komentar
     );

     Komentar::create($form_data);

     if($form_data){
        echo 'OK';
    }else{
        echo 'Gagal terkirim';
    }
    }

    // function update(Request $request, $id_komentar)
    // {

    //     $form_data = array(
    //         'alamat' => $request->alamat,
    //         'no_telepon' => $request->no_telepon,
    //         'email' => $request->email,
    //         'instagram' => $request->instagram,
    //         'facebook' => $request->facebook,
    //         'whatsapp' => $request->whatsapp
    //        );
       

    // Komentar::where('id_komentar', $request->id_komentar)->update($form_data);

    //  if($form_data){
    //     return redirect('/komentar')->with('success','Berhasil Update Data');
    // }else{
    //     return back()->with('error','Gagal Update Data');
    // }
    // }

    public function delete($id_komentar)
    {
        $destroy = Komentar::where('id_komentar',$id_komentar)->delete();

        return redirect('/komentar')->with('success','Berhasil menghapus data');
    }

    
}