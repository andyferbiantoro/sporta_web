<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailJadwal extends Model
{
	protected $table = "detail_jadwal";
	protected $fillable = [
		'id_jam','id_jadwal'
	];
}
