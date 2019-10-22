<?php

use App\Imports\Employe;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Module\Employe\Entities\Employe as ModuleEmploye;

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

Route::get('/', function () {
    request()->session()->forget('form_steps');
    return view('welcome');
    // Excel::import(new Employe, '/home/reynaldiaznan/Downloads/asda.xls');
})->middleware('auth')->name('dashboard');

Auth::routes();

Route::get('/import-data', function () {
    Excel::import(new Employe, '/home/reynaldiaznan/Downloads/aasda.xls');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test-data', function() {
    // $data = ModuleEmploye::where([
    //     ['noreg', '!=', null],
    //     ['tgl_pembuatan', null]
    //     // ['updated_at', 'like', '%2019-10-22%']
    // ])->get();
    // $i = 1;
    // foreach ($data as $row) {
    //     if (date('Y-m-d', strtotime($row->updated_at)) === '2019-10-22') {
    //         // echo $i . '  ' . $row->nama . '<br>';
    //         ModuleEmploye::find($row->id)
    //             ->update([
    //                 'tgl_pembuatan' => '2019-10-22'
    //             ]);

    //         $i++;
    //     }
    // }

    $s = [
        '0069-006',
        '2107-018',
        '0207-018',
        '2157-015',
        '1101-012',
        '3548-013',
        '4488-010',
        '1574-016',
        '0218-019',
        '2161-004',
        '1736-018',
        // '0138-012',

        '0104-009',
        '4115-003',
        '0552-019',
        '0141-012',
        '0024-002',
        '3734-011',
        '0150-013',
        '0072-006',
        '0200-017',
        '0071-006',
        '4636-006',
        '0139-012',
        '0124-011',
        '0920-015',
        '0148-013',
        '2033-007',
        '4576-003',
        '1024-013',
        '0136-012',
        '0160-014',
        '0013-002',
        '0372-011',
        '0065-005',
        '0408-013',
        '0171-015',
        '0034-003',
        '0552-019',
        '3589-014',
        '3121-079',
        '3006-018',
        '0058-005',
        '0186-016',
        '4104-007',
        '4729-004',
        '0093-008',
        '4510-015',
    ];
    // foreach ($s as $a) {
    //     $n = explode('-', $a);
    //     $d = ModuleEmploye::where([
    //         ['nokta', $n[0]],
    //         ['noregu', $n[1]]
    //     ])->first();
    //     $d->update([
    //         'tgl_pembuatan' => '2019-10-21'
    //     ]);
    //     // if (file_exists(storage_path('app' . $ktp))) {
    //     //     echo 'asd';
    //     // }
    //     // if (isset($d->scanning)) {
    //     //     $ktp = $d->scanning->photo_ktp;
    //     //     $kta = $d->scanning->photo_kta;
    //     //     $kk = $d->scanning->photo_kk;
    //     //     var_dump($kk);
    //     //     echo '<br>';

    //     //     if (file_exists(storage_path('app/' . $ktp) && file_exists(storage_path('app/' . $kta) && file_exists(storage_path('app/' . $kk))))) {
    //     //         echo $d->nama;
    //     //     }
    //     // } else {
    //     //     echo $a . '<br>';
    //     // }
    // }
});

Route::get('test-date', function() {
    $d = ModuleEmploye::selectRaw("*, timestampdiff(year, tgllahir, DATE_FORMAT(NOW(),'%Y%m%d')) as age")
        // ->groupBy('age')
        ->having('age', 49)
        ->having('tgl_pembuatan', 'like', '%2019-10-22%')
        ->get();
    $i = 1;

    echo $d->count();
    // foreach ($d->get() as $r) {
    //     // var_dump($r);
    //     if ($i === 1) {
    //         var_dump($r->age);
    //     }
    //     echo $r['tgllahir'] . '<br>';
    //     $i++;
    // }
});

Route::get('test-mv-file', function() {
    // $path = null;
    // if (file_exists(storage_path('app/public/sulaika.png'))) {
    //     $c = Storage::disk('public')->move('sulaika.png', 'berkas/asda.png');
    //     echo $c;
    //     if ($c && Storage::disk('public')->exists('berkas/asda.png')) {
    //         $path = public/berkas/asda.png;
    //     }
    // }
    // echo $path;
    $d = ModuleEmploye::where('noreg', '!=', null)->get();
    foreach ($d as $r) {
        $file = $r->scanning;
        $ktp = $file->photo_ktp;
        $kta = $file->photo_kta;
        $kk = $file->photo_kk;
        $ijazah = $file->ijazah;
        $sertifikat = $file->sertifikat;
        $path = [];

        if (file_exists(storage_path('app/' . $ktp)) && file_exists(storage_path('app/' . $kta)) && file_exists(storage_path('app/' . $kk))) {
            $ktp_old = $ktp;
            $ktp = explode('/', $ktp);
            unset($ktp[0]);
            $ktp = implode('/', $ktp);

            Storage::disk('local')->copy($ktp_old, 'public/scanning/' . $ktp);
            $path[0] = 'public/scanning/' . $ktp;

            $kta_old = $kta;
            $kta = explode('/', $kta);
            unset($kta[0]);
            $kta = implode('/', $kta);

            Storage::disk('local')->copy($kta_old, 'public/scanning/' . $kta);
            $path[1] = 'public/scanning/' . $kta;

            $kk_old = $kk;
            $kk = explode('/', $kk);
            unset($kk[0]);
            $kk = implode('/', $kk);

            Storage::disk('local')->copy($kk_old, 'public/scanning/' . $kk);
            $path[2] = 'public/scanning/' . $kk;
        }

        if (!empty($ijazah) && file_exists(storage_path('app/' . $ijazah))) {
            $ijazah_old = $ijazah;
            $ijazah = explode('/', $ijazah);
            unset($ijazah[0]);
            $ijazah = implode('/', $ijazah);

            Storage::disk('local')->copy($ijazah_old, 'public/scanning/' . $ijazah);
            $path[3] = 'public/scanning/' . $ijazah;
        } else {
            $path[3] = null;
        }

        if (!empty($sertifikat) && file_exists(storage_path('app/' . $sertifikat))) {
            $sertifikat_old = $sertifikat;
            $sertifikat = explode('/', $sertifikat);
            unset($sertifikat[0]);
            $sertifikat = implode('/', $sertifikat);

            Storage::disk('local')->copy($sertifikat_old, 'public/scanning/' . $sertifikat);
            $path[4] = 'public/scanning/' . $sertifikat;
        } else {
            $path[4] = null;
        }

        ModuleEmploye::find($r->id)->scanning()->update([
            'photo_ktp' => $path[0],
            'photo_kta' => $path[1],
            'photo_kk' => $path[2],
            'ijazah' => $path[3],
            'sertifikat' => $path[4],
        ]);
    }
});
