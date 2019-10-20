<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'a_id_territory';

    protected $primaryKey = 'KODE_WILAYAH';

    protected $fillable = ['KODE_WILAYAH', 'MST_KODE_WILAYAH', 'NAMA', 'LEVEL'];
}
