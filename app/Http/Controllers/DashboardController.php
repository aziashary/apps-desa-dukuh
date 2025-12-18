<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SKKM;
use App\Models\Warga;
use App\Models\SK;
use App\Models\Kodesk;
use App\Models\Pengajuan;
use App\Charts\SuratBulananChart;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class DashboardController extends Controller
{
    function index()
    {
          $warga = Warga::count();
          $wargajp = Warga::selectRaw('COUNT(nik) as total_jp')
            ->groupby('jenis_pekerjaan')
            ->orderBy('jenis_pekerjaan')
            ->pluck('total_jp')
            ->toArray();
       
          $wargajk = Warga::selectRaw('COUNT(nik) as total_jk')
            ->groupby('jenis_kelamin')
            ->orderBy('jenis_kelamin')
            ->pluck('total_jk')
            ->toArray();

          $jp = Warga::distinct('jenis_pekerjaan')
              ->groupby('jenis_pekerjaan')
              ->orderBy('jenis_pekerjaan')
              ->pluck('jenis_pekerjaan')
              ->toArray();
       
          $jk = Warga::distinct('jenis_kelamin')
              ->groupby('jenis_kelamin')
              ->orderBy('jenis_kelamin')
              ->pluck('jenis_kelamin')
              ->toArray();

          $skbulan = SK::selectRaw('COUNT(id_sk) as total_sk, MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_sk')
            ->toArray();

          $skjenis = SK::selectRaw('COUNT(id_sk) as total_sk, kode_sk')
            ->groupBy('kode_sk')
            ->orderBy('kode_sk')
            ->pluck('total_sk')
            ->toArray();

          $kodesk = Kodesk::orderBy('kode_sk')
            ->pluck('singkatan_sk')
            ->toArray();
          
          $pengajuanproses = Pengajuan::where('status_pengajuan','Process')->count();
          $pengajuan = Pengajuan::count();
          $totalsk = SK::count();
          $totalkodesk = Kodesk::count();
          $laki = Warga::where('jenis_kelamin', 'Laki-laki')->count();
          $perempuan = Warga::where('jenis_kelamin', 'perempuan')->count();
          $anak = Warga::where('jenis_pekerjaan', 'Pelajar')->count();

          $months = array();
              for ($i = 1; $i <= 12; $i++) {
                     $month = date('F', mktime(0, 0, 0, $i, 1));
                     array_push($months, $month);
       
       }

     return view('/dashboard', compact(
        'warga',
        'wargajp',
        'wargajk',
        'jk',
        'jp',
        'skbulan',
        'skjenis',
        'kodesk',
        'totalsk', 
        'pengajuanproses',
        'pengajuan',
        'totalkodesk',
        'laki',
        'perempuan',
        'anak',
        'months') 
     );
    }
}
