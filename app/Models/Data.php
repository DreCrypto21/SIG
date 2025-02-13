<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'datas';
    protected $fillable = ['kecamatan', 'jumlah_kasus', 'info', 'latitude', 'longitude'];
    use HasFactory;
}
