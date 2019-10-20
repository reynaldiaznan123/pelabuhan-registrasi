<?php

namespace Module\Employe\Entities;

use Illuminate\Database\Eloquent\Model;

class EmployeStudyNonFormal extends Model
{
    protected $fillable = ['kursus', 'sertifikasi'];

    protected $hidden = ['employe_id'];
}
