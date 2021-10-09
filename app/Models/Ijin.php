<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijin extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'waktu_ijin',
        'mesin',
        'keterangan',
        'waktu_kembali',
        'status'
    ];
}
