<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailJadwalMember extends Model
{
    protected $table = "detail_jadwal_member";
	protected $fillable = [
		'id_jam','id_jadwal_member'
	];
}
