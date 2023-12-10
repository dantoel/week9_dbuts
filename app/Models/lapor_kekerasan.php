<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lapor_kekerasan extends Model
{
    public $table = "lapor_kekerasan";
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nim',
        'nama',
        'telepon',
        'Jenis',
        'report',
    ];
}
