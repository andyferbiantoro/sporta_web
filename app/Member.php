<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     protected $table = "member";
    protected $fillable = [
        'nama_tim','ketua_tim','no_hp','logo_tim'
    ];
}
