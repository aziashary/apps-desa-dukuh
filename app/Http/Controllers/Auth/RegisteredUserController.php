<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Kartukeluarga;
use App\Models\Warga;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.daftar');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|max:30|unique:users,username',
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $form_data = array(
            'nik'  => $request->username,
            'no_kk' => $request->no_kk,
            'nama_warga'  => $request->nama_warga,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat'  => $request->alamat,
            'jenis_pekerjaan'  => $request->jenis_pekerjaan,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'agama'  => $request->agama,
            'desa' => "DUKUH"
            
           );
           if (!is_null($request->no_kk)) {

           $kk = Kartukeluarga::where('no_kk', $request->no_kk)->first();

           if (empty($kk)) {
            $form_kk = array(
               'no_kk' => $request->no_kk,
               'kepala_keluarga'  => $request->nama_warga,
              );
           Kartukeluarga::create($form_kk);
           }
             
            $tambah_warga = Warga::create($form_data);

           }else{

             $tambah_warga = Warga::create($form_data);

           }

        $id_warga = Warga::latest()->value('id_warga');
        $user = User::create([
            'name' => $request->nama_warga,
            'id_warga' => $id_warga,
            'username' => $request->username,
            // 'email' => $request->email,
            'password' => Hash::make($request->password),
            'level'=>2,
        ]);

        if($user){
            event(new Registered($user));

            Auth::login($user);


            return redirect(RouteServiceProvider::HOME);
            
        }else{
            
            return back()->with('error','Gagal Tambah Data');
        
         }
    }
}
