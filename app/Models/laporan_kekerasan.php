<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_kekerasan extends Model
{
    public $table = "laporan_kekerasan";
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nim',
        'nama',
        'telepon',
        'jenis',
        'report',
        'filepath'
    ];
}
