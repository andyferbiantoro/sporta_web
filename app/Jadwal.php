<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = "jadwal";
    protected $fillable = [
        'id_lapangan','tanggal','id_jam','nama_tim','durasi','id_pemesanan','id_pelanggan','status_jadwal'
    ];
}
