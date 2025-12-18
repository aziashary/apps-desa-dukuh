<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;
use App\Models\Visimisi;
use App\Models\Dokumentasi;
use App\Models\Aparaturdesa;
use App\Models\Kontak;
use App\Models\Warga;
use App\Models\Detaildokumentasi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sejarah = Sejarah::latest()->paginate(5);
        $visimisi = Visimisi::latest()->paginate(5);
        $dokumentasi = Dokumentasi::latest()->paginate(50);
        $aparaturdesa = Aparaturdesa::where('kategori_jabatan', 'Aparatur Desa')->paginate(20);
        $BPD = Aparaturdesa::where('kategori_jabatan', 'BPD')->paginate(20);
        $RT = Aparaturdesa::where('kategori_jabatan', 'RT/RW')->paginate(20);
        $LINMAS = Aparaturdesa::where('kategori_jabatan', 'LINMAS')->paginate(20);
        $LPM = Aparaturdesa::where('kategori_jabatan', 'LPM')->paginate(20);
        $kontak = kontak::latest()->paginate(1);
        $warga = Warga::orderBy('nama_warga', 'ASC')->get();
        $laki = warga::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = warga::where('jenis_kelamin', 'Perempuan')->count();
        $anak = warga::where('jenis_pekerjaan', 'Pelajar')->count();

        return view('layouts.dashboard', [
            'sejarah' => $sejarah,
            'visimisi' => $visimisi,
            'dokumentasi' => $dokumentasi,
            'aparaturdesa' => $aparaturdesa,
            'BPD' => $BPD,
            'RT' => $RT,
            'LINMAS' => $LINMAS,
            'LPM' => $LPM,
            'kontak' => $kontak,
            'warga' => $warga,
            'laki' => $laki,
            'perempuan' => $perempuan,
            'anak' => $anak,

        ]);
    }

    public function detail($id_dokumentasi)
    {
        $dokumentasi = Dokumentasi::where('dokumentasi.id_dokumentasi','=',$id_dokumentasi)->get();
        $kontak = kontak::latest()->paginate(1);
        $detail = Detaildokumentasi::where('detaildokumentasi.id_dokumentasi','=',$id_dokumentasi)->get();

        return view('layouts.deskripsidokumentasi', [
            'dokumentasi' => $dokumentasi,
            'kontak' => $kontak,
            'detail' => $detail
        ]);
    }
}
