<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Jadwal;
use App\Pemesanan;
use View;
use DB;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function __construct()
	{
        //$data_komentar = Komentar::orderBy('id', 'DESC')->get();
		$data_notif = DB::table('jadwal')
		->join('pelanggan', 'jadwal.id_pelanggan', '=', 'pelanggan.id')
		->join('lapangan', 'jadwal.id_lapangan', '=', 'lapangan.id')
		->join('pemesanan', 'jadwal.id_pemesanan', '=', 'pemesanan.id')
		->select('pelanggan.nama_pelanggan','lapangan.nama_lapangan','pemesanan.status')
		->where('pemesanan.status',2)
		->orderBy('jadwal.id', 'DESC')
		->get();

		$jumlah_notif = Pemesanan::where('status',2)->count();

		View::share('data_notif',$data_notif);
		View::share('jumlah_notif',$jumlah_notif);

	}

}
