<?php

namespace Module\Employe\Entities;

use Illuminate\Database\Eloquent\Model;

class EmployeScanning extends Model
{
    protected $fillable = [
        'photo_ktp',
        'photo_kk',
        'photo_kta',
        'ijazah',
        'sertifikat',
    ];
}
