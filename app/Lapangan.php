<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = "lapangan";
    protected $fillable = [
        'nama_lapangan','deskripsi'
    ];
}
