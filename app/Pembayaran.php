<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $fillable = [
       'metode_pembayaran','bukti_pembayaran','status_pembayaran','id_pemesanan','bank','wallet','id_jadwal'
   ];
}
