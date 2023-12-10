<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login_mhs extends Model
{
    public $table = "login_mhs";
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nim',
        'nama_mhs',
        'status_akhir',
        'ipk',
        'total_sks',
    ];
}
