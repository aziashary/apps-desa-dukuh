<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Response;
use Image;

class SejarahController extends Controller
{
    function index()
    {
     $data = Sejarah::latest()->paginate(5);
     return view('sejarah.index', compact('data'))
       ;
    }

    function create()
    {
     $data = Sejarah::latest()->paginate(5);
     return view('sejarah.create', compact('data'))
       ;
    }

    public function edit($id_sejarah)
    {
        $item = sejarah::where('sejarah.id_sejarah','=',$id_sejarah)->get();

        return view('sejarah.edit')->with('data', $item);
    }

    function insert_image(Request $request)
    {
     $request->validate([
      'user_name'  => 'required',
      'user_image' => 'required|image|max:2048'
     ]);

     $image_file = $request->user_image;

     $image = Image::make($image_file);

     Response::make($image->encode('jpeg'));

     $form_data = array(
      'isi_sejarah'  => $request->user_name,
      'gambar_sejarah' => $image
     );

     Sejarah::create($form_data);

     if($form_data){
        return redirect('/sejarah')->with('success','Berhasil Tambah Data');
    }else{
        return back()->with('error','Gagal Tambah Data');
    }
    }

    function update(Request $request, $id_sejarah)
    {

        if($request->gambar_sejarah === null){
            $form_data = array(
                'isi_sejarah'  => $request->isi_sejarah,
               );
        }else{
                $image_file = $request->gambar_sejarah;
                $image = Image::make($image_file);

                Response::make($image->encode('jpeg'));

                $form_data = array(
                'isi_sejarah'  => $request->isi_sejarah,
                'gambar_sejarah' => $image
         );
        }

     Sejarah::where('id_sejarah', $request->id_sejarah)->update($form_data);

     if($form_data){
        return redirect('admindesa/sejarah')->with('success','Berhasil Update Data');
    }else{
        return back()->with('error','Gagal Update Data');
    }
    }
    

    function fetch_image($image_id)
    {
     $image = Sejarah::where('sejarah.id_sejarah', $image_id)->first();

     $image_file = Image::make($image->gambar_sejarah);

     $response = Response::make($image_file->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     return $response;
    }

    
}