<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Row;
use Module\Employe\Entities\Employe as EmployeModel;

class Employe implements OnEachRow, WithBatchInserts
{
    public function onRow(Row $row) {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();
        if ($rowIndex >= 7) {
            echo $row[2] . '<br>';
            // if (!empty($row[1])) {
            //     $chck = EmployeModel::where([
            //         ['nokta', $row[2]],
            //         ['noregu', $row[3]]
            //     ])->first();
            //     if (!$chck) {
            //         $q1 = [$row[17], $row[18], $row[19]];
            //         $q2 = [$row[22], $row[23], $row[24]];
            //         $data = EmployeModel::create([
            //             'nama' => $row[1],
            //             'nokta' => $row[2],
            //             'noregu' => $row[3],
            //             'jabatan' => $row[4],
            //             'alokasi' => $row[5],
            //             'tmplahir' => $row[6],
            //             'tgllahir' => date('Y-m-d', strtotime($row[7])),
            //             'alamat' => $row[9],
            //             'kelurahan' => $row[10],
            //             'agama' => $row[13],
            //             'kecamatan' => $row[14],
            //             'pendidikan' => $row[16],
            //             'baju' => $row[20],
            //             'sepatu' => $row[21]
            //             // 'noreg' => 'OPTKBM' . $row[25]
            //         ]);
            //         foreach ($q1 as $k => $v) {
            //             if (!empty($v)) {
            //                 $data->nonFormal()->create([
            //                     'kursus' => $v,
            //                     'sertifikasi' => $q2[$k] ?? null
            //                 ]);
            //             }
            //         }
            //     } else {
            //         $data = EmployeModel::find($chck->id);
            //         $data->update([
            //             'nama' => $row[1],
            //             'nokta' => $row[2],
            //             'noregu' => $row[3],
            //             'jabatan' => $row[4],
            //             'alokasi' => $row[5],
            //             'tmplahir' => $row[6],
            //             'tgllahir' => date('Y-m-d', strtotime($row[7])),
            //             'alamat' => $row[9],
            //             'kelurahan' => $row[10],
            //             'agama' => $row[13],
            //             'kecamatan' => $row[14],
            //             'pendidikan' => $row[16],
            //             'baju' => $row[20],
            //             'sepatu' => $row[21]
            //             // 'noreg' => 'OPTKBM' . $row[25]
            //         ]);
            //     }
            // }
        }
    }

    public function batchSize(): int
    {
        return 3000;
    }
}
