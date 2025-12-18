<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\Kartukeluarga;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    function index()
    {
     $data = Warga::orderBy('nama_warga', 'ASC')->get();
     return view('warga.index', compact('data'));
    }

    function kk()
    {
     $item = [];
     $data = Kartukeluarga::orderBy('no_kk', 'ASC')->with('wargas')->get();
     return view('warga.kk', compact('data','item'));
    }

    public function getnokk(Request $request)
    {
        $no_kk = $request->input('no_kk');
        $item = Warga::where('no_kk', $no_kk)->get();

        return response()->json(['html' => view('partial.table', compact('item'))->render()]);
    }



    function create()
    {
     return view('warga.create');
    }

    function edit($id_warga)
    {
     $data = Warga::where('id_warga', $id_warga)->get();
     return view('warga.edit', compact('data'));
    }

    function editkk($no_kk)
    {
     $data = Kartukeluarga::where('no_kk', $no_kk)->first();
     $item = Warga::where('no_kk', $no_kk)->get();
     return view('warga.editkk', compact('data','item'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'nik'=>'required|max:30|unique:warga,nik',
        ]);

     $form_data = array(
      'nik'  => $request->nik,
      'no_kk' => $request->no_kk,
      'nama_warga'  => $request->nama_warga,
      'tempat_lahir'  => $request->tempat_lahir,
      'tanggal_lahir'  => $request->tanggal_lahir,
      'RT'  => $request->RT,
      'RW'  => $request->RW,
      'desa'  => $request->desa,
      'alamat'  => $request->alamat,
      'jenis_pekerjaan'  => $request->jenis_pekerjaan,
      'jenis_kelamin'  => $request->jenis_kelamin,
      'agama'  => $request->agama,
      'email' => $request->email,
      
     );

     $kk = Kartukeluarga::where('no_kk', $request->no_kk)->first();

    if (empty($kk)) {
     $form_kk = array(
        'no_kk' => $request->no_kk,
        'kepala_keluarga'  => $request->nama_warga,
       );
    Kartukeluarga::create($form_kk);
    }
      
      Warga::create($form_data);
      


//      $id_warga = Warga::latest('id_warga')->select('id_warga')->value('id_warga');

//      $user = User::create([
//     'name' => $request->nama_warga,
//     'id_warga' => $id_warga,
//     'username' => $request->nik,
//     'email' => $request->email,
//     'password' => Hash::make($request->nik),
//     'level' => 2,
// ]);

        if($form_data){
            return redirect('admindesa/warga')->with('success','Berhasil Tambah Data');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
}

    function update(Request $request, $id_warga)
    {

     $form_data = array(
      'nik'  => $request->nik,
      'nama_warga'  => $request->nama_warga,
      'no_kk' => $request->no_kk,
      'tempat_lahir'  => $request->tempat_lahir,
      'tanggal_lahir'  => $request->tanggal_lahir,
      'RT'  => $request->RT,
      'RW'  => $request->RW,
      'desa'  => $request->desa,
      'alamat'  => $request->alamat,
      'jenis_pekerjaan'  => $request->jenis_pekerjaan,
      'jenis_kelamin'  => $request->jenis_kelamin,
      'agama'  => $request->agama,
      'email' => $request->email,
     );

     $updateuser = array(
        'name' => $request->nama_warga,
        'username' => $request->nik,
        'email' => $request->email,
    );

    $kk = Kartukeluarga::where('no_kk', $request->no_kk)->first();
    if (empty($kk)) {
        $form_kk = array(
           'no_kk' => $request->no_kk,
           'kepala_keluarga'  => $request->nama_warga,
          );
       Kartukeluarga::create($form_kk);
       }
    
    // Update Data User
     Warga::where('id_warga', $id_warga)->update($form_data);

    //  Update User
     User::where('id_warga', $id_warga)->update($updateuser);

        if($form_data){
            return redirect('admindesa/warga')->with('success','Berhasil Tambah Data Warga');
        }else{
            return back()->with('error','Gagal Tambah Data');
        }
    }

    function updatekk(Request $request, $no_kk)
    {

     $form_data = array(
      'no_kk'  => $request->no_kk,
      'kepala_keluarga'  => $request->nama_warga,
     );

     $form_warga= array(
        'no_kk'  => $request->no_kk,
       );


    $kk = Kartukeluarga::where('no_kk', $request->no_kk)->first();
    if (empty($kk)) {
        $form_kk = array(
           'no_kk' => $request->no_kk,
           'kepala_keluarga'  => $request->nama_warga,
          );
       Kartukeluarga::create($form_kk);
       }
    
    // Update Data User
     Kartukeluarga::where('no_kk', $no_kk)->update($form_data);
     Warga::where('no_kk', $no_kk)->update($form_warga);

        if($form_data){
            return redirect('admindesa/warga/kartu-keluarga')->with('success','Berhasil Edit Data KK');
        }else{
            return back()->with('error','Gagal Edit Data');
        }
    }

    function delete($id_warga)
    { 
    $data = Warga::where('id_warga', $id_warga)->first();
    
    $destroy = Warga::where('id_warga', $id_warga)->delete();
    $destroy_user = User::where('username', $data->nik)->delete();

        if($destroy && $destroy_user){
        return redirect('admindesa/warga')->with('success','Berhasil menghapus data');
        }else{
            return back()->with('error','Gagal Hapus Data');
        }
    }
}
