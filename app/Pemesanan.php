<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
   protected $table = "pemesanan";
   protected $fillable = [
    'tanggal_pesan','catatan','id_user_pelanggan','jenis_pembayaran','nominal_pembayaran','nominal_dp','status'
 ];
}
