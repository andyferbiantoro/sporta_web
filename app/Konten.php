<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
	protected $table = "konten";
	protected $fillable = [
		'foto_konten','foto_pengumuman','isi_pengumuman','indeks_konten','indeks_pengumuman'
	];
}
