<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visimisi;
use Illuminate\Support\Facades\Response;
use Image;

class VisimisiController extends Controller
{
    function index()
    {
     $data = Visimisi::latest()->paginate(5);
     return view('visimisi.index', compact('data'))
       ;
    }

    function create()
    {
     $data = Visimisi::latest()->paginate(5);
     return view('visimisi.create', compact('data'))
       ;
    }

    public function edit($id_visimisi)
    {
        $item = Visimisi::where('visimisi.id_visimisi','=',$id_visimisi)->get();

        return view('visimisi.edit')->with('data', $item);
    }

    function store(Request $request)
    {
     $form_data = array(
      'visi' => $request->visi,
      'misi' => $request->misi
     );

     Visimisi::create($form_data);

    if($form_data){
        return redirect('admindesa/visimisi')->with('success','Berhasil Tambah Data');
    }else{
        return back()->with('error','Gagal Tambah Data');
    }
    }

    function update(Request $request, $id_visimisi)
    {

        if($request->gambar_visimisi === null){
            $form_data = array(
                'visi' => $request->visi,
                'misi' => $request->misi
               );
        }

     Visimisi::where('id_visimisi', $request->id_visimisi)->update($form_data);

     if($form_data){
        return redirect('admindesa/visimisi')->with('success','Berhasil Update Data');
    }else{
        return back()->with('error','Gagal Update Data');
    }
    }
    
}