<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalMember extends Model
{
	protected $table = "jadwal_member";
	protected $fillable = [
		'id_member','id_lapangan','durasi','hari'
	];
}
