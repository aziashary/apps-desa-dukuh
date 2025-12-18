<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aparaturdesa;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Image;

class AparaturdesaController extends Controller
{
    function index()
    {
     $data = Aparaturdesa::orderBy('id_jabatan', 'ASC')->get();
     return view('aparaturdesa.index', compact('data'))
       ;
    }

    function create()
    {
     $data = Aparaturdesa::latest()->paginate();
     $jabatan = Jabatan::orderBy('id_kategori_jabatan', 'ASC')->get();
     return view('aparaturdesa.create',[ 
                    'aparaturdesa' => $data,
                    'jabatan' => $jabatan,])
       ;
    }

    public function edit($id_aparatur)
    {
        $data = Aparaturdesa::where('aparaturdesa.id_aparatur','=',$id_aparatur)->get();
        $jabatan = Jabatan::latest()->paginate(20);
        return view('aparaturdesa.edit',[ 
                       'data' => $data,
                       'jabatan' => $jabatan,])
        ;
    }

    function store(Request $request)
    {

    //  $image_file = $request->foto_aparatur;

    //  $image = Image::make($image_file);

    //  Response::make($image->encode('jpeg'));
    
     $jabatan = Jabatan::where('id_jabatan', $request->id_jabatan)->select('nama_jabatan')->value('nama_jabatan');
     $kategorijabatan = Jabatan::where('id_jabatan', $request->id_jabatan)->select('kategori_jabatan')->value('kategori_jabatan');

     $form_data = array(
      'nama_aparatur'  => $request->nama_aparatur,
      'id_jabatan'  => $request->id_jabatan,
      'nama_jabatan'  => $jabatan,
      'kategori_jabatan'  => $kategorijabatan,
      'facebook_aparatur'  => $request->facebook_aparatur,
      'instagram_aparatur'  => $request->instagram_aparatur,
    //   'foto_aparatur' => $image
     );

     Aparaturdesa::create($form_data);

     if($form_data){
        return redirect('/admindesa/aparaturdesa/')->with('success','Berhasil Tambah Data');
    }else{
        return back()->with('error','Gagal Tambah Data');
    }
    }

    function update(Request $request, $id_aparatur)
    {
      
        // if($request->foto_aparatur === null){
            $jabatan = Jabatan::where('id_jabatan', $request->id_jabatan)->select('nama_jabatan')->value('nama_jabatan'); 
            $kategorijabatan = Jabatan::where('id_jabatan', $request->id_jabatan)->select('kategori_jabatan')->value('kategori_jabatan');

                $form_data = array(
                'nama_aparatur'  => $request->nama_aparatur,
                'id_jabatan'  => $request->id_jabatan,
                'nama_jabatan'  => $jabatan,
                'kategori_jabatan'  => $kategorijabatan,
                'facebook_aparatur'  => $request->facebook_aparatur,
                'instagram_aparatur'  => $request->instagram_aparatur
               );
        // }else{
        //     $image_file = $request->foto_aparatur;
        //     $image = Image::make($image_file);
        //     Response::make($image->encode('jpeg'));
        //     $jabatan2 = Jabatan::where('id_jabatan', $request->id_jabatan)->select('nama_jabatan')->value('nama_jabatan'); 
        //     $kategorijabatan2 = Jabatan::where('id_jabatan', $request->id_jabatan)->select('kategori_jabatan')->value('kategori_jabatan');
        //     $form_data = array(
        //      'nama_aparatur'  => $request->nama_aparatur,
        //      'id_jabatan'  => $request->id_jabatan,
        //      'nama_jabatan'  => $jabatan2,
        //      'kategori_jabatan'  => $kategorijabatan2,
        //      'facebook_aparatur'  => $request->facebook_aparatur,
        //      'instagram_aparatur'  => $request->instagram_aparatur,
        //      'foto_aparatur' => $image
        //     );
        // }

        $updateadmin = array(
            'name' => $request->nama_aparatur,
        );

    //  Aparaturdesa::where('id_aparatur', $request->id_aparatur)->update($form_data);
     User::where('id_aparatur', $id_aparatur)->update($updateadmin);

     if($form_data){
        return redirect('/admindesa/aparaturdesa/')->with('success','Berhasil Update Data');
    }else{
        return back()->with('error','Gagal Update Data');
    }
    }
    

    // function fetch_image($image_id)
    // {
    //  $image = Aparaturdesa::where('aparaturdesa.id_aparatur', $image_id)->first();

    //  $image_file = Image::make($image->foto_aparatur);

    //  $response = Response::make($image_file->encode('jpeg'));

    //  $response->header('Content-Type', 'image/jpeg');

    //  return $response;
    // }

    public function delete($id_aparatur)
    {
        $destroy = Aparaturdesa::where('id_aparatur',$id_aparatur)->delete();

        return redirect('/admindesa/aparaturdesa/')->with('success','Berhasil menghapus data');
    }

    
}