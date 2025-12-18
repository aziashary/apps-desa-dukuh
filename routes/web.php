<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\SKKMController;
use App\Http\Controllers\SKController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\AparaturdesaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardwargaController;
use App\Http\Controllers\LoginwargaController;
use App\Http\Controllers\KodeskController;
use App\Http\Controllers\AkunController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/detaildokumentasi/{id_dokumentasi}', [HomeController::class, 'detail'])->name('/detaildokumentasi');

// Gambar
Route::get('sejarah/fetch_image/{id_sejarah}', [Sejarahcontroller::class, 'fetch_image']);
Route::get('dokumentasi/fetch_image/{id_dokumentasi}', [Dokumentasicontroller::class, 'fetch_image']);
Route::get('detaildokumentasi/fetch_image_detail/{id_detaildokumentasi}', [Dokumentasicontroller::class, 'fetch_image_detail']);
Route::get('aparaturdesa/fetch_image/{id_aparatur}', [AparaturdesaController::class, 'fetch_image']);

// Login Page
Route::get('/warga-login', [LoginwargaController::class, 'showLoginForm'])->name('warga.login');
Route::post('/warga-auth', [LoginwargaController::class, 'login']);

// Ajax Form Otomatis
Route::get('/get-form-input', [DashboardwargaController::class, 'getFormInput']);


Route::get('/', [HomeController::class, 'index']);

// Dashboard Warga
Route::group(['prefix' => 'dashboardwarga', 'middleware' => 'isWarga'], function () {
    Route::get('/', [DashboardwargaController::class, 'index'])->name('dashboardwarga');;
    Route::get('/profile', [DashboardwargaController::class, 'profile']);
    Route::get('/pengajuan', [DashboardwargaController::class, 'pengajuan']);

Route::group(['prefix' => 'pengajuan'], function () {
    Route::get('/create', [DashboardwargaController::class, 'create']);
    Route::post('/store', [DashboardwargaController::class, 'store']);
    Route::get('/print/{id_pengajuan}', [DashboardwargaController::class, 'print']);
    Route::get('/edit/{id_pengajuan}', [DashboardwargaController::class, 'edit']);
    Route::get('/delete/{id_pengajuan}', [DashboardwargaController::class, 'delete']);
    Route::patch('/update/{id_pengajuan}', [DashboardwargaController::class, 'update']);
    });

Route::get('/notifications/unread', [DashboardwargaController::class, 'getUnreadNotifications']);
});

// Admin Desa
Route::group(['prefix' => 'admindesa', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'warga'], function () {
    Route::get('/', [WargaController::class, 'index']);
    Route::get('/kartu-keluarga', [WargaController::class, 'kk']);
    Route::get('/create', [WargaController::class, 'create']);
    Route::post('/store', [WargaController::class, 'store']);
    Route::get('/edit/{id_warga}', [WargaController::class, 'edit']);
    Route::get('/editkk/{no_kk}', [WargaController::class, 'editkk']);
    Route::get('/delete/{id_warga}', [Wargacontroller::class, 'delete']);
    Route::patch('/update/{id_warga}', [WargaController::class, 'update']);
    Route::patch('/updatekk/{no_kk}', [WargaController::class, 'updatekk']);
        });

         Route::group(['prefix' => 'akun'], function () {
    Route::get('/', [AkunController::class, 'index']);
    Route::get('/admin', [AkunController::class, 'admin']);
    Route::post('/store', [AkunController::class, 'store']);
    Route::get('/delete/{id_aparatur}', [Akuncontroller::class, 'delete']);
    Route::patch('/updateadmin/{id_aparatur}', [AkunController::class, 'updateadmin']);
    Route::patch('/updatewarga/{id_warga}', [AkunController::class, 'updatewarga']);
        });

    //     Route::group(['prefix' => 'SKKM'], function () {
    // Route::get('/', [SKKMController::class, 'index']);
    // Route::get('/create', [SKKMController::class, 'create']);
    // Route::post('/store', [SKKMController::class, 'store']);
    // Route::get('/print/{id_skkm}', [SKKMController::class, 'print']);
    // Route::get('/edit/{id_skkm}', [SKKMController::class, 'edit']);
    // Route::get('/delete/{id_skkm}', [SKKMController::class, 'delete']);
    // Route::patch('/update/{id_skkm}', [SKKMController::class, 'update']);
    //     });

        Route::group(['prefix' => 'SK'], function () {
    Route::get('/', [SKcontroller::class, 'index']);
    Route::get('/create', [SKcontroller::class, 'create']);
    Route::get('/pengajuan', [SKcontroller::class, 'pengajuan']);
    Route::get('/selesai/{id_sk}', [SKcontroller::class, 'selesai']);
    Route::get('/pengajuan_baru', [SKcontroller::class, 'pengajuan_baru']);
    Route::patch('/detail/{id_pengajuan}', [SKcontroller::class, 'detail']);
    Route::post('/store', [SKcontroller::class, 'store']);
    Route::post('/print', [SKcontroller::class, 'print']);
    Route::post('/excel', [SKcontroller::class, 'excel']);
    Route::get('/edit/{id_sk}', [SKcontroller::class, 'edit']);
    Route::get('/delete/{id_sk}', [SKcontroller::class, 'delete']);
    Route::patch('/update/{id_sk}', [SKcontroller::class, 'update']);
        });

        Route::group(['prefix' => 'kodesk'], function () {
    Route::get('/', [Kodeskcontroller::class, 'index']);
    Route::get('/editsk/{id_kodesk}', [Kodeskcontroller::class, 'editsk']);
    Route::get('/edit/{id_kodesk}', [Kodeskcontroller::class, 'edit']);
    Route::get('/create', [Kodeskcontroller::class, 'create']);
    Route::get('/getketerangan', [Kodeskcontroller::class, 'getketerangan']);
    Route::post('/store', [Kodeskcontroller::class, 'store']);
    Route::patch('/update/{id_kodesk}', [Kodeskcontroller::class, 'update']);
    Route::patch('/updatesk/{id_kodesk}', [Kodeskcontroller::class, 'updatesk']);
    Route::get('/delete/{id_kodesk}', [Kodeskcontroller::class, 'delete']);
        });

        Route::group(['prefix' => 'sejarah'], function () {
    Route::get('/', [Sejarahcontroller::class, 'index']);
    Route::get('/create', [Sejarahcontroller::class, 'create']);
    Route::get('/edit/{id_sejarah}', [Sejarahcontroller::class, 'edit']);
    Route::post('/insert_image', [Sejarahcontroller::class, 'insert_image']);
    Route::patch('/update/{id_sejarah}', [Sejarahcontroller::class, 'update']);
    });

        Route::group(['prefix' => 'visimisi'], function () {
    Route::get('/', [Visimisicontroller::class, 'index']);
    Route::get('/create', [Visimisicontroller::class, 'Create']);
    Route::get('/edit/{id_visimisi}', [Visimisicontroller::class, 'edit']);
    Route::post('/store', [Visimisicontroller::class, 'store']);
    Route::patch('/update/{id_visimisi}', [Visimisicontroller::class, 'update']);
    });

        Route::group(['prefix' => 'kontak'], function () {
    Route::get('/', [Kontakcontroller::class, 'index']);
    Route::get('/create', [Kontakcontroller::class, 'create']);
    Route::get('/edit/{id_kontak}', [Kontakcontroller::class, 'edit']);
    Route::post('/store', [Kontakcontroller::class, 'store']);
    Route::patch('/update/{id_kontak}', [Kontakcontroller::class, 'update']);
    });

        Route::group(['prefix' => 'komentar'], function () {
    Route::get('/', [Komentarcontroller::class, 'index']);
    Route::get('/detail/{id_komentar}',  [Komentarcontroller::class, 'detail']);
    Route::patch('/update/{id_komentar}',  [Komentarcontroller::class, 'update']);
    Route::get('/delete/{id_komentar}',  [Komentarcontroller::class, 'delete']);
    });

        Route::group(['prefix' => 'dokumentasi'], function () {
    Route::get('/',   [Dokumentasicontroller::class, 'index']);
    Route::get('/create',  [Dokumentasicontroller::class, 'Create']);
    Route::get('/edit/{id_dokumentasi}',  [Dokumentasicontroller::class, 'edit']);
    Route::get('/detail/{id_dokumentasi}',  [Dokumentasicontroller::class, 'detail']);
    Route::post('/store', [Dokumentasicontroller::class, 'store']);
    Route::patch('/update/{id_dokumentasi}',  [Dokumentasicontroller::class, 'update']);
    Route::patch('/storedetail/{id_dokumentasi}',  [Dokumentasicontroller::class, 'storedetail']);
    Route::get('/delete/{id_dokumentasi}', [Dokumentasicontroller::class, 'delete']);
    });

        Route::group(['prefix' => 'aparaturdesa'], function () {
    Route::get('/', [AparaturdesaController::class, 'index']);
    Route::get('/create', [AparaturdesaController::class, 'create']);
    Route::get('/edit/{id_aparatur}', [AparaturdesaController::class, 'edit']);
    Route::post('/store', [AparaturdesaController::class, 'store']);
    Route::patch('/update/{id_aparatur}', [AparaturdesaController::class, 'update']);
    Route::get('/delete/{id_Aparatur}', [AparaturdesaController::class, 'delete']);
    });

        Route::group(['prefix' => 'jabatan'], function () {
    Route::get('/', [JabatanController::class, 'index']);
    Route::get('/create', [JabatanController::class, 'create']);
    Route::get('/edit/{id_jabatan}', [JabatanController::class, 'edit']);
    Route::post('/store', [JabatanController::class, 'store']);
    Route::patch('/update/{id_jabatan}', [JabatanController::class, 'update']);
    Route::get('/delete/{id_jabatan}', [JabatanController::class, 'delete']);
    });
    Route::get('detaildokumentasi/delete/{id_detaildokumentasi}',  [Dokumentasicontroller::class, 'deletedetail']);

});
require __DIR__.'/auth.php';


