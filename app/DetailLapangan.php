<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailLapangan extends Model
{
    protected $table = "detail_lapangan";
    protected $fillable = [
        'image','id_lapangan','indeks'
    ];
}
