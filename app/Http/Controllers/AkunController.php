<?php

namespace App\Http\Controllers;

use App\Models\Aparaturdesa;
use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    function index()
    {
     $data = user::where('level','2')->orderBy('name', 'ASC')->get();
     return view('akun.index', compact('data'));
    }

    function admin()
    {
     $data = user::where('level','1')->orderBy('name', 'ASC')->get();

     $existingUserIds = User::pluck('id_aparatur')->all();

     // Ambil data aparatur desa yang id_aparaturnya belum ada di tabel user
     $aparaturdesa = Aparaturdesa::where('kategori_jabatan', 'Aparatur Desa')
    ->whereNotExists(function ($query) {
        $query->select('id_aparatur')
            ->from('users')
            ->whereRaw('aparaturdesa.id_aparatur = users.id_aparatur');
    })
    ->orderBy('id_jabatan', 'ASC')
    ->get();
         
     return view('akun.admin', compact('data','aparaturdesa'));
    }

    function store(Request $request)
    {
     $data = Aparaturdesa::where('id_aparatur', $request->id_aparatur)->first();
     $user = User::create([
    'name' => $data->nama_aparatur,
    'id_aparatur' => $data->id_aparatur,
    'username' => $request->username,
    // 'email' => $data->email,
    'password' => $request->password,
    'level' => 1,
]);

        if($user){
            return redirect('admindesa/akun/admin')->with('success','Berhasil Tambah Akun Admin');
        }else{
            return back()->with('error','Gagal Tambah Akun');
        }
    }

    function updateadmin(Request $request, $id_aparatur)
    {

     $updateadmin = array(
        'username' => $request->username,
        'password' => Hash::make($request->password),
    );
    //  Update User
    $update = User::where('id_aparatur', $id_aparatur)->update($updateadmin);

        if($update){
            return redirect('admindesa/akun/admin')->with('success','Berhasil Update Akun Admin');
        }else{
            return back()->with('error','Gagal Update Akun Admin');
        }
    }

    function updatewarga(Request $request, $id_warga)
    {

     $updatewarga = array(
        'password' => Hash::make($request->password),
    );

    //  Update User
    $update = User::where('id_warga', $id_warga)->update($updatewarga);

        if($update){
            return redirect('admindesa/akun')->with('success','Berhasil Update Akun');
        }else{
            return back()->with('error','Gagal Update Akun');
        }
    }

    function delete($id_aparatur)
    { 
    $destroy_user = User::where('id_aparatur', $id_aparatur)->delete();

        if($destroy_user){
        return redirect('admindesa/akun/admin')->with('success','Berhasil menghapus akses');
        }else{
            return back()->with('error','Gagal hapus akses');
        }
    }
}
