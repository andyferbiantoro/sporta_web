<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapangan;
use App\DetailLapangan;
use App\DetailJadwal;
use App\Jam;
use App\Jadwal;
use App\Pemesanan;
use App\Pembayaran;
use App\Pelanggan;
use App\Konten;
use App\Member;
use Auth;
use DB;
use File;
use Carbon\Carbon;

class PelangganController extends Controller
{

  //menampilkan halaman dashboard pada pelanggan

  public function landingpage(){
    $lapangan1 = DB::table('detail_lapangan')
    ->join('lapangan', 'detail_lapangan.id_lapangan', '=', 'lapangan.id')
    ->select('detail_lapangan.*','lapangan.deskripsi')
    ->where('id_lapangan','2')
    ->get();

    $lapangan2 = DB::table('detail_lapangan')
    ->join('lapangan', 'detail_lapangan.id_lapangan', '=', 'lapangan.id')
    ->select('detail_lapangan.*','lapangan.deskripsi')
    ->where('id_lapangan','3')
    ->get();

//====================================================
    $now = Carbon::now()->format('y-m-d');

        $cek_hari = Carbon::now()->isoFormat('dddd');

        $cek_jam = DB::table('detail_jadwal')
        ->join('jadwal', 'detail_jadwal.id_jadwal', '=', 'jadwal.id')
        ->where('jadwal.tanggal', $now)
        ->pluck('detail_jadwal.id_jam');

        //return $cek_jam;
       
        $jam = Jam::whereNotIn('id', $cek_jam)->get();

        $lapangan = Lapangan::all();
        $pelanggan = Pelanggan::all();
        
        // $filter_tanggal = $request->filter_tanggal;

    $jadwal_lap1 = DB::table('jadwal')
        ->select('jadwal.*')
        ->where('id_lapangan','2')
        ->where('tanggal',$now)
        ->where('jadwal.status_jadwal',3)
        ->get();

        foreach ($jadwal_lap1 as $key => $value) {
          $detail_jadwal = DB::table('detail_jadwal')
          ->join('jam', 'detail_jadwal.id_jam','jam.id')
          ->select('detail_jadwal.id_jadwal','jam.jam')
          ->where('id_jadwal',$value->id)
          ->get();

          $jam1 = collect($detail_jadwal)->implode('jam',' WIB, ');
          $value->jam1 =$jam1;
        }



    $jadwal_lap2 = DB::table('jadwal')
        ->select('jadwal.*')
        ->where('id_lapangan','3')
        ->where('tanggal',$now)
        ->where('jadwal.status_jadwal',3)
        ->get();

        foreach ($jadwal_lap2 as $key => $value) {
          $detail_jadwal = DB::table('detail_jadwal')
          ->join('jam', 'detail_jadwal.id_jam','jam.id')
          ->select('detail_jadwal.id_jadwal','jam.jam')
          ->where('id_jadwal',$value->id)
          ->get();

          $jam2 = collect($detail_jadwal)->implode('jam',' ,');
          $value->jam2 =$jam2;
        }

        

        $pengumuman = Konten::where('foto_pengumuman','!=',null)->orderBy('id','DESC')->get();
     

      return view('pelanggan.landingpage.index',compact('lapangan2','lapangan1','jadwal_lap1','jadwal_lap2','pengumuman'));
    }

    public function index(){

      $konten = Konten::where('foto_konten','!=',null)->orderBy('id','DESC')->get();
      $pengumuman = Konten::where('foto_pengumuman','!=',null)->orderBy('id','DESC')->get();
      $member = Member::orderBy('id','DESC')->get();

      return view('pelanggan.index',compact('konten','member','pengumuman'));
    }

    //menampilkan lapangan pada pelanggan
    public function pelanggan_lapangan(){

        //$lapangan1 = DetailLapangan::where('id_lapangan','2')->get();
        $lapangan1 = DB::table('detail_lapangan')
        ->join('lapangan', 'detail_lapangan.id_lapangan', '=', 'lapangan.id')
        ->select('detail_lapangan.*','lapangan.deskripsi')
        ->where('id_lapangan','2')
        ->get();

        $lapangan2 = DB::table('detail_lapangan')
        ->join('lapangan', 'detail_lapangan.id_lapangan', '=', 'lapangan.id')
        ->select('detail_lapangan.*','lapangan.deskripsi')
        ->where('id_lapangan','3')
        ->get();

        //$lapangan2 = DetailLapangan::where('id_lapangan','3')->get();

        return view('pelanggan.lapangan.index',compact('lapangan1','lapangan2'));
    }

    //menampilkan halaman pemesanan lapangan
    public function pelanggan_pesan_lapangan(Request $request){

        $now = Carbon::now()->format('y-m-d');

        $cek_hari = Carbon::now()->isoFormat('dddd');

        $cek_jam = DB::table('detail_jadwal')
        ->join('jadwal', 'detail_jadwal.id_jadwal', '=', 'jadwal.id')
        ->where('jadwal.tanggal', $now)
        ->pluck('detail_jadwal.id_jam');

        //return $cek_jam;
       
        $jam = Jam::whereNotIn('id', $cek_jam)->get();

        $lapangan = Lapangan::all();
        $pelanggan = Pelanggan::all();
        
        $filter_tanggal = $request->filter_tanggal;

if ($filter_tanggal == null) {
 
        $jadwal_lap1 = DB::table('jadwal')
        ->select('jadwal.*')
        ->where('id_lapangan','2')
        ->where('tanggal',$now)
        ->where('jadwal.status_jadwal',3)
        ->get();

        foreach ($jadwal_lap1 as $key => $value) {
          $detail_jadwal = DB::table('detail_jadwal')
          ->join('jam', 'detail_jadwal.id_jam','jam.id')
          ->select('detail_jadwal.id_jadwal','jam.jam')
          ->where('id_jadwal',$value->id)
          ->get();

          $jam1 = collect($detail_jadwal)->implode('jam',' WIB, ');
          $value->jam1 =$jam1;
        }



        $jadwal_lap2 = DB::table('jadwal')
        ->select('jadwal.*')
        ->where('id_lapangan','3')
        ->where('tanggal',$now)
        ->where('jadwal.status_jadwal',3)
        ->get();

        foreach ($jadwal_lap2 as $key => $value) {
          $detail_jadwal = DB::table('detail_jadwal')
          ->join('jam', 'detail_jadwal.id_jam','jam.id')
          ->select('detail_jadwal.id_jadwal','jam.jam')
          ->where('id_jadwal',$value->id)
          ->get();

          $jam2 = collect($detail_jadwal)->implode('jam',' ,');
          $value->jam2 =$jam2;
        }
}else{
  $jadwal_lap1 = DB::table('jadwal')
        ->select('jadwal.*')
        ->where('id_lapangan','2')
        ->whereDate('tanggal',$filter_tanggal)
        ->where('jadwal.status_jadwal',3)
        ->get();

        foreach ($jadwal_lap1 as $key => $value) {
          $detail_jadwal = DB::table('detail_jadwal')
          ->join('jam', 'detail_jadwal.id_jam','jam.id')
          ->select('detail_jadwal.id_jadwal','jam.jam')
          ->where('id_jadwal',$value->id)
          ->get();

          $jam1 = collect($detail_jadwal)->implode('jam',' WIB, ');
          $value->jam1 =$jam1;
        }



        $jadwal_lap2 = DB::table('jadwal')
        ->select('jadwal.*')
        ->where('id_lapangan','3')
        ->whereDate('tanggal', $filter_tanggal)
        ->where('jadwal.status_jadwal',3)
        ->get();

        foreach ($jadwal_lap2 as $key => $value) {
          $detail_jadwal = DB::table('detail_jadwal')
          ->join('jam', 'detail_jadwal.id_jam','jam.id')
          ->select('detail_jadwal.id_jadwal','jam.jam')
          ->where('id_jadwal',$value->id)
          ->get();

          $jam2 = collect($detail_jadwal)->implode('jam',' ,');
          $value->jam2 =$jam2;
        }
       
    }
      

        return view('pelanggan.pemesanan_lapangan.index',compact('lapangan','jam','pelanggan','jadwal_lap1','jadwal_lap2'));
    }

    //mengambil data jam sesuai dengan tanggal dalam bentuk json
    public function get_booking_jam(Request $request){

       $cek_jam = DB::table('detail_jadwal')
        ->join('jadwal', 'detail_jadwal.id_jadwal', '=', 'jadwal.id')
        ->select('jadwal.id_lapangan', 'detail_jadwal.id_jadwal')
        ->get();
        // ->pluck('detail_jadwal.id_jam');

        return response()->json([

            'cek_jam' => $cek_jam
        ]);  
    }

    //mengambil data id lapangan
    public function get_id_lapangan($cek_jam){

         $cek_id_lapangan = DB::table('detail_jadwal')
        ->join('jadwal', 'detail_jadwal.id_jadwal', '=', 'jadwal.id')
        ->where('jadwal.id',$cek_jam->id_jadwal)
        ->pluck('jadwal.id_lapangan');
        

        return response()->json([

            'cek_id_lapangan' => $cek_id_lapangan
        ]);

    }
    //megnambil data id jadwal
    public function get_id_jadwal($tanggal){

       $get_tanggal = Jadwal::where('tanggal',$tanggal)->pluck("id");


      // return $get_tanggal;
       // foreach ($get_tanggal as $key => $value) {
    
       $get_id_jam = DetailJadwal::whereIn('id_jadwal',$get_tanggal)->pluck('id_jam');
       
       // }
       $get_jam_value = Jam::whereNotIn('id', $get_id_jam)->get();

        return response()->json([

            'get_tanggal' => $get_jam_value
        ]);

    }

//=====================================================================================================================
    //function untuk melakukan pemesanan lapangan pada pelanggan
    public function pelanggan_pesan_lapangan_add(Request $request){

        //return $request->durasi;
        $pelanggan = Pelanggan::where('id_user', Auth::user()->id)->first();


        $now = Carbon::now()->format('y-m-d');
        $tanggal_main = $request->input('tanggal');
        // dd($now);
        $tenggat_bayar = Carbon::now()->addDay();
        if (strtotime($tanggal_main) < strtotime($now)) {
         
          // dd($tanggal_main);
          return redirect()->back()->with('error', 'Tanggal pemesanan anda tidak valid, silahkan ulangi pemesanan');

        }else{
          if ($request->nominal_dp == null) {
           $data = ([
            'tanggal_pesan' => $now,
            'tenggat_bayar' => $tenggat_bayar,
            'catatan' => $request['catatan'],
            'id_user_pelanggan' => $request['id_user_pelanggan'],
            'nominal_pembayaran' => $request['nominal_pembayaran'],
            'nominal_dp' => $request['nominal_dp'],
            'jenis_pembayaran' => $request['jenis_pembayaran'],
            'status' => 1,
          ]);

           $id_pemesanan = Pemesanan::create($data)->id;
         }else{

           $data = ([
            'tanggal_pesan' => $now,
            'tenggat_bayar' => $tenggat_bayar,
            'catatan' => $request['catatan'],
            'id_user_pelanggan' => $request['id_user_pelanggan'],
            'nominal_pembayaran' => $request['nominal_pembayaran'],
            'nominal_dp' => str_replace('.','',$request->nominal_dp),
            'jenis_pembayaran' => $request['jenis_pembayaran'],
            'status' => 1,
          ]);

           $id_pemesanan = Pemesanan::create($data)->id;
         }
        


        $data = ([
            'id_lapangan' => $request['id_lapangan'],
            'tanggal' => $request['tanggal'],
            'nama_tim' => $request['nama_tim'],
            'durasi' => $request['durasi'],
            'id_user_jadwal' => $request['id_user_pelanggan'],
            'id_pelanggan' => $pelanggan->id,
            'id_pemesanan' => $id_pemesanan,
            'status_jadwal' => 1,
        ]);

        $lastid = Jadwal::create($data)->id;

        for ($i=1; $i <= $request->durasi ; $i++) { 

            $data_add = new DetailJadwal();

            $data_add->id_jam = $request->id_jam++;
            $data_add->id_jadwal = $lastid;

            $data_add->save();


        }

       return redirect('/pelanggan_pemesanan_pending')->with('success', 'Data Pemesanan Lapangan Berhasil Ditambahkan');
        }
    }


//============================================================================================================================
     //menampilkan halaman pemesanan sebelum dibayar 
     public function pelanggan_pemesanan_pending(){

        //$pemesanan_pending = Pemesanan::where('id_user_pelanggan', Auth::user()->id)->where('status','pending')->get();

        $pemesanan_pending = DB::table('jadwal')
        ->join('pemesanan', 'jadwal.id_pemesanan', '=', 'pemesanan.id')
        ->join('lapangan', 'jadwal.id_lapangan', '=', 'lapangan.id')
        ->select('pemesanan.*','lapangan.nama_lapangan','jadwal.tanggal','jadwal.nama_tim')
        ->where('pemesanan.id_user_pelanggan', Auth::user()->id)
        ->where('pemesanan.status',1)
        ->orderBy('pemesanan.id','DESC')
        ->get();

       // return $pemesanan_pending;

        
       
        return view('pelanggan.transaksi.pemesanan_pending',compact('pemesanan_pending'));
    }

    //function untuk melakukan pembatalan pemesanan
    public function pelanggan_batalkan_pemesanan($id){

        $data_jadwal = Jadwal::where('id_pemesanan',$id)->first();

        $detail_jadwal = DetailJadwal::where('id_jadwal',$data_jadwal->id)->get();
        foreach ($detail_jadwal as $delete_detail) {
            $delete_detail->delete();
        // code...
        }

        $jadwal_delete = Jadwal::where('id_pemesanan',$id)->first();
        $jadwal_delete->delete();

        $pemesanan_delete = Pemesanan::where('id',$id)->first();
        $pemesanan_delete->delete();

        return redirect()->back()->with('success', 'Data Pemesanan Berhasil Dibatalkan');
    }


    //function untuk menambahakan pembayaran dari peemsanan yang telah dilakukan
     public function pelanggan_tambah_pembayaran(Request $request, $id){
        

            $jadwal = Jadwal::where('id_pemesanan',$id)->first();
            $data_add = new Pembayaran();

            $data_add->metode_pembayaran = $request->input('metode_pembayaran');
            $data_add->id_pemesanan = $request->input('id_pemesanan');
            $data_add->bank = $request->input('bank');
            $data_add->wallet = $request->input('wallet');
            $data_add->id_jadwal = $jadwal->id;
            $data_add->status_pembayaran = 0;

            if ($request->hasFile('bukti_pembayaran')) {
              $file = $request->file('bukti_pembayaran');
              $extension = $file->getClientOriginalExtension();
              $filename = $file->getClientOriginalName();
              $path = $file->store('public/uploads/bukti_pembayaran');
              $file->move('uploads/bukti_pembayaran/', $filename);
              $data_add->bukti_pembayaran = $filename;
          } else {
              echo "Gagal upload gambar";
          }

        $data_add->save();

        $data_update = Pemesanan::where('id', $id)->first();

        $input = [
            'status' => 2,
        ];


        $data_update->update($input);

       return redirect('/pelanggan_pemesanan_dibayar')->with('success', 'Pembayaran berhasil dilakukan, Tunggu verifkasi dari admin');
    }


//=======================================================================================================================================
    //menampilkan halaman pemesanan yang sudh dibayar
     public function pelanggan_pemesanan_dibayar(){

        //$pemesanan_pending = Pemesanan::where('id_user_pelanggan', Auth::user()->id)->where('status','pending')->get();

        $pemesanan_dibayar = DB::table('pembayaran')
        ->join('pemesanan', 'pembayaran.id_pemesanan', '=', 'pemesanan.id')
        ->join('jadwal', 'pembayaran.id_jadwal', '=', 'jadwal.id')
        ->join('lapangan', 'jadwal.id_lapangan', '=', 'lapangan.id')
        ->select('pemesanan.*','lapangan.nama_lapangan','jadwal.tanggal','jadwal.nama_tim','pembayaran.metode_pembayaran','pembayaran.bukti_pembayaran','pembayaran.bank','pembayaran.wallet','pembayaran.status_pembayaran','pembayaran.id_jadwal')
        ->where('id_user_pelanggan', Auth::user()->id)
        ->where('pemesanan.status', '>', 1)
        ->orderBy('pembayaran.id','DESC')
        ->get();

       // return $pemesanan_dibayar;


        foreach ($pemesanan_dibayar as $key => $value) {
          $detail_jadwal = DB::table('detail_jadwal')
          ->join('jam', 'detail_jadwal.id_jam','jam.id')
          ->where('id_jadwal',$value->id_jadwal)
          ->select('jam.jam')
          ->get();

          $jam = collect($detail_jadwal)->implode('jam',' WIB, ');
          $value->jam =$jam;
        }

        
            //return $pemesanan_dibayar;

        return view('pelanggan.transaksi.pemesanan_dibayar',compact('pemesanan_dibayar'));
    }

    //menampilkan halaman dan data riwyat transksi
    public function pelanggan_riwayat_transaksi(){

        //$pemesanan_pending = Pemesanan::where('id_user_pelanggan', Auth::user()->id)->where('status','pending')->get();

       $riwayat = DB::table('pembayaran')
        ->join('pemesanan', 'pembayaran.id_pemesanan', '=', 'pemesanan.id')
        ->join('jadwal', 'pembayaran.id_jadwal', '=', 'jadwal.id')
        ->join('lapangan', 'jadwal.id_lapangan', '=', 'lapangan.id')
        ->select('pemesanan.*','lapangan.nama_lapangan','jadwal.tanggal','jadwal.nama_tim','jadwal.durasi','pembayaran.metode_pembayaran','pembayaran.bukti_pembayaran','pembayaran.bank','pembayaran.wallet','pembayaran.status_pembayaran','pembayaran.id_jadwal')
        ->where('id_user_pelanggan', Auth::user()->id)
        ->where('pemesanan.status', '>', 1)
        ->orderBy('pembayaran.id','DESC')
        ->get();

       // return $riwayat;

        foreach ($riwayat as $key => $value) {
        $detail_jadwal = DB::table('detail_jadwal')
          ->join('jam', 'detail_jadwal.id_jam','jam.id')
          ->where('id_jadwal',$value->id_jadwal)
          ->select('jam.jam')
          ->get();

         $jam = collect($detail_jadwal)->implode('jam',' WIB, ');
          $value->jam =$jam;
       }

       //return $riwayat;
        return view('pelanggan.transaksi.riwayat_transaksi',compact('riwayat'));
    }
}
