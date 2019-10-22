<?php

namespace Module\Employe\Entities;

use Illuminate\Database\Eloquent\Model;
use Module\Serikat\Entities\Serikat;

class Employe extends Model
{
    protected $fillable = [
        'nama',
        'nokta',
        'noregu',
        'noktp',
        'jabatan',
        'alokasi',
        'tmplahir',
        'tgllahir',
        'status',
        'agama',
        'goldarah',
        'alamat',
        'rt',
        'rw',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'pendidikan',
        'baju',
        'celana',
        'sepatu',
        'photo',
        'noreg',
        'verifikasi',
        'serikat_id',
        'tgl_pembuatan',
        'user_id'
    ];

    protected $hidden = [
        'serikat_id',
        'user_id'
    ];

    // public function setTglPembuatanAttribute($value) {
    //     $this->attributes['tgl_pembuatan'] = date('Y-m-d');
    // }

    // protected $hidden = ['serikat_id'];

    public function nonFormal() {
        return $this->hasMany(EmployeStudyNonFormal::class);
    }

    public function scanning() {
        return $this->hasOne(EmployeScanning::class);
    }

    public function serikat() {
        return $this->hasOne(Serikat::class, 'id', 'serikat_id');
    }
}
