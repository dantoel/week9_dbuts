<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_login extends Model
{
    public $table = "account_login";
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nim',
        'nama',
        'nomor_telepon',
        'email',
        'password',
    ];
}
