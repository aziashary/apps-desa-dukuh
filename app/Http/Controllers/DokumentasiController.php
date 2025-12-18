<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumentasi;
use App\Models\Detaildokumentasi;
use Illuminate\Support\Facades\Response;
use Image;

class DokumentasiController extends Controller
{
    function index()
    {
     $data = Dokumentasi::latest()->paginate();
     return view('dokumentasi.index', compact('data'))
       ;
    }

    function create()
    {
     $data = Dokumentasi::latest()->paginate();
     return view('dokumentasi.create', compact('data'))
       ;
    }

    public function edit($id_dokumentasi)
    {
        $item = Dokumentasi::where('dokumentasi.id_dokumentasi','=',$id_dokumentasi)->get();

        return view('dokumentasi.edit')->with('data', $item);
    }

    public function detail($id_dokumentasi)
    {
        $item = Dokumentasi::where('dokumentasi.id_dokumentasi','=',$id_dokumentasi)->get();
        $detail = Detaildokumentasi::where('detaildokumentasi.id_dokumentasi','=',$id_dokumentasi)->get();

        return view('dokumentasi.detail', [
                    'item' => $item,
                    'detail' => $detail,
                ]);
    }

    public function storedetail(Request $request, $id_dokumentasi)
    {
        $count = Detaildokumentasi::where('detaildokumentasi.id_dokumentasi','=',$id_dokumentasi)->count();
        if($count >= 20){
            return back()->with('error','Gagal Update Data, Foto pendukung sudah melebihi batas (20 foto)');
        }elseif($request->gambar_detaildokumentasi=== null){
            return back()->with('error','Gagal Update Data');
        }else{
                $image_file = $request->gambar_detaildokumentasi;
                $image = Image::make($image_file);

                Response::make($image->encode('jpeg'));

                $form_data = array(
                    'id_dokumentasi'  => $id_dokumentasi,
                    'gambar_detaildokumentasi' => $image
                );
        }

        Detaildokumentasi::create($form_data);

     if($form_data){
        return redirect('admindesa/dokumentasi/detail/'.$id_dokumentasi)->with('success','Berhasil Update Data');
    }else{
        return back()->with('error','Gagal Update Data');
    }
    }

    function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

     $image_file = $request->gambar_dokumentasi;

     $image = Image::make($image_file);

     Response::make($image->encode('jpeg'));
     

     $form_data = array(
      'nama_dokumentasi'  => $request->nama_dokumentasi,
      'kategori_dokumentasi'  => $request->kategori_dokumentasi,
      'tanggal_dokumentasi' => $request->tanggal_dokumentasi,
      'deskripsi' => $request->deskripsi,
      'gambar_dokumentasi' => $image
     );

     Dokumentasi::create($form_data);

     if($form_data){
        return redirect('admindesa/dokumentasi')->with('success','Berhasil Tambah Data');
    }else{
        return back()->with('error','Gagal Tambah Data');
    }
    }

    function update(Request $request, $id_dokumentasi)
    {

        if($request->gambar_dokumentasi === null){
            $form_data = array(
                'nama_dokumentasi'  => $request->nama_dokumentasi,
                'kategori_dokumentasi'  => $request->kategori_dokumentasi,
                'tanggal_dokumentasi' => $request->tanggal_dokumentasi,
                'deskripsi'  => $request->deskripsi,
               );
        }else{
                $image_file = $request->gambar_dokumentasi;
                $image = Image::make($image_file);

                Response::make($image->encode('jpeg'));

                $form_data = array(
                    'nama_dokumentasi'  => $request->nama_dokumentasi,
                    'kategori_dokumentasi'  => $request->kategori_dokumentasi,
                    'tanggal_dokumentasi' => $request->tanggal_dokumentasi,
                    'deskripsi'  => $request->deskripsi,
                    'gambar_dokumentasi' => $image
                );
        }

     Dokumentasi::where('id_dokumentasi', $request->id_dokumentasi)->update($form_data);

     if($form_data){
        return redirect('admindesa/dokumentasi')->with('success','Berhasil Update Data');
    }else{
        return back()->with('error','Gagal Update Data');
    }
    }
    

    function fetch_image($image_id)
    {
     $image = Dokumentasi::where('dokumentasi.id_dokumentasi', $image_id)->first();

     $image_file = Image::make($image->gambar_dokumentasi);

     $response = Response::make($image_file->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     return $response;
    }

    function fetch_image_detail($image_id)
    {
     $image = Detaildokumentasi::where('detaildokumentasi.id_detaildokumentasi', $image_id)->first();

     $image_file = Image::make($image->gambar_detaildokumentasi);

     $response = Response::make($image_file->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     return $response;
    }
    

    public function delete($id_dokumentasi)
    {
        $destroy = Dokumentasi::where('id_dokumentasi',$id_dokumentasi)->delete();

        return redirect('admindesa/dokumentasi')->with('success','Berhasil menghapus data');
    }

    public function deletedetail($id_detaildokumentasi)
    {
        $destroy = Detaildokumentasi::where('id_detaildokumentasi',$id_detaildokumentasi)->delete();

        return back()->with('success','Berhasil menghapus data');
    }


    
}