<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use Illuminate\Support\Facades\Response;
use Image;

class KontakController extends Controller
{
    function index()
    {
     $data = kontak::latest()->paginate(5);
     return view('kontak.index', compact('data'))
       ;
    }

    function create()
    {
     $data = kontak::latest()->paginate(5);
     return view('kontak.create', compact('data'))
       ;
    }

    public function edit($id_kontak)
    {
        $item = kontak::where('kontak.id_kontak','=',$id_kontak)->get();

        return view('kontak.edit')->with('data', $item);
    }

    function store(Request $request)
    {
     $form_data = array(
      'alamat' => $request->alamat,
      'no_telepon' => $request->no_telepon,
      'email' => $request->email,
      'instagram' => $request->instagram,
      'facebook' => $request->facebook,
      'whatsapp' => $request->whatsapp
     );

     Kontak::create($form_data);

     if($form_data){
        return redirect('/kontak')->with('success','Berhasil Tambah Data');
    }else{
        return back()->with('error','Gagal Tambah Data');
    }
    }

    function update(Request $request, $id_kontak)
    {

        $form_data = array(
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp
           );
       

     kontak::where('id_kontak', $request->id_kontak)->update($form_data);

     if($form_data){
        return redirect('/kontak')->with('success','Berhasil Update Data');
    }else{
        return back()->with('error','Gagal Update Data');
    }
    }
    
}