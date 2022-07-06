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
use Auth;
use DB;
use File;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index');
    }


    public function admin_lapangan(){

        return view('admin.lapangan.index');
    }

    public function admin_lapangan_add(Request $request){


        $data = ([
            'nama_lapangan' => $request['nama_lapangan'],
        ]);

        $lastid = Lapangan::create($data)->id; 

        foreach ($data as $key => $value) {

           $data_add = new DetailLapangan();

           $data_add->id_lapangan = $lastid;

           if ($request->hasFile('image')) {
              $file = $request->file('image');
              $extension = $file->getClientOriginalExtension();
              $filename = $file->getClientOriginalName();
              $path = $file->store('public/uploads/image_lapangan');
              $file->move('uploads/image_lapangan/', $filename);
              $data_add->image = $filename;
          } else {
              echo "Gagal upload gambar";
          }


          $data_add->save();
      }

       return redirect('/admin_lapangan')->with('success', 'Data Lapangan Berhasil Ditambahkan');
    }


    public function admin_pesan_lapangan(){

        $now = Carbon::now()->format('y-m-d');

        $lapangan = Lapangan::all();
        $jam = Jam::all();
        $pelanggan = Pelanggan::all();
        //$jadwal_lap1 = Jadwal::where('id_lapangan','2')->where('tanggal',$now)->get();
        //$jadwal_lap2 = Jadwal::where('id_lapangan','3')->where('tanggal',$now)->get();

        $jadwal_lap1 = DB::table('detail_jadwal')
        ->join('jadwal', 'detail_jadwal.id_jadwal', '=', 'jadwal.id')
        ->join('jam', 'detail_jadwal.id_jam', '=', 'jam.id')
        ->select('jadwal.*','jam.jam')
        ->where('id_lapangan','2')
        ->where('tanggal',$now)
        ->where('jadwal.status_jadwal',2)
        ->orderBy('jam.jam','ASC')
        ->get();

        $jadwal_lap2 = DB::table('detail_jadwal')
        ->join('jadwal', 'detail_jadwal.id_jadwal', '=', 'jadwal.id')
        ->join('jam', 'detail_jadwal.id_jam', '=', 'jam.id')
        ->select('jadwal.*','jam.jam')
        ->where('id_lapangan','2')
        ->where('tanggal',$now)
        ->where('jadwal.status_jadwal',2)
        ->orderBy('jam.jam','ASC')
        ->get();

        return view('admin.pemesanan_lapangan.index',compact('lapangan','jam','pelanggan','jadwal_lap1','jadwal_lap2'));
    }

    public function admin_pesan_lapangan_add(Request $request){

        $id_user_jadwal = Pelanggan::where('id', $request->id_pelanggan)->first();

        $data = ([
            'id_lapangan' => $request['id_lapangan'],
            'tanggal' => $request['tanggal'],
            'nama_tim' => $request['nama_tim'],
            'durasi' => $request['durasi'],
            'id_user_jadwal' => $id_user_jadwal->id_user,
            'id_pelanggan' =>  $request['id_pelanggan'],
            'status_jadwal' => 1,
        ]);

        $lastid = Jadwal::create($data)->id;

        $now = Carbon::now()->format('y-m-d');
    
            $data_add = new Pemesanan();

            $data_add->tanggal_pesan = $now;
            $data_add->id_jadwal = $lastid;
            $data_add->catatan = $request->input('catatan');
            $data_add->id_user_pelanggan = $request->input('id_user_pelanggan');
            $data_add->nominal_pembayaran = $request->input('nominal_pembayaran');
            $data_add->nominal_dp = $request->input('nominal_dp');
            $data_add->jenis_pembayaran = $request->input('jenis_pembayaran');
            $data_add->status = 'pending';


        $data_add->save();


        for ($i=1; $i <= $request->durasi ; $i++) { 

            $data_add = new DetailJadwal();

            $data_add->id_jam = $request->id_jam++;
            $data_add->id_jadwal = $lastid;

            $data_add->save();


        }

       return redirect('/admin_pesan_lapangan')->with('success', 'Data Pemesanan Lapangan Berhasil Ditambahkan');
    }

    public function admin_transaksi_berjalan(){

         $pemesanan = DB::table('pembayaran')
        ->join('pemesanan', 'pembayaran.id_pemesanan', '=', 'pemesanan.id')
        ->join('jadwal', 'pembayaran.id_jadwal', '=', 'jadwal.id')
        ->join('lapangan', 'jadwal.id_lapangan', '=', 'lapangan.id')
        ->select('pemesanan.*','lapangan.nama_lapangan','jadwal.tanggal','jadwal.nama_tim','pembayaran.metode_pembayaran','pembayaran.bukti_pembayaran','pembayaran.bank','pembayaran.wallet','pembayaran.status_pembayaran','pembayaran.id_jadwal')
        ->orderBy('pembayaran.id','DESC')
        ->get();

        foreach ($pemesanan as $key => $value) {
            $jam = DB::table("detail_jadwal")
            ->join('jadwal', 'detail_jadwal.id_jadwal', '=', 'jadwal.id')
            ->join('jam', 'detail_jadwal.id_jam', '=', 'jam.id')
            ->where('detail_jadwal.id_jadwal',$value->id_jadwal)
            ->pluck('jam.jam');

            // $jam = collect($detail_jam)->implode(' ', ', ');
            $value->jam =$jam;
        }

        //return $pemesanan;

        return view('admin.transaksi.index',compact('pemesanan'));
    }


    public function admin_verifikasi_pemesanan($id)
    {


      $data_update = Pemesanan::where('id', $id)->first();


            $input = [

             'status' => 3,

           ];

      $data_update->update($input);


      $update_pembayaran = Pembayaran::where('id_pemesanan',$id)->first();

            $input2 = [

             'status_pembayaran' => 1,
           
           ];

      $update_pembayaran->update($input2);


      $update_status_jadwal = Jadwal::where('id_pemesanan',$id)->first();

            $input3 = [

             'status_jadwal' => 3,
           
           ];

      $update_status_jadwal->update($input3);


     return redirect()->back()->with('success', 'Pemesanan Berhasil Diverifikasi');
    }




   public function admin_laporan(){

      $laporan = DB::table('jadwal')
      ->join('pelanggan','jadwal.id_pelanggan','=','pelanggan.id')
      ->select('jadwal.*','pelanggan.nama_pelanggan')
      ->orderBy('jadwal.id','DESC')
      ->where('jadwal.status_jadwal', 3)
      ->get();


        return view('admin.laporan.index',compact('laporan'));
    }


    public function admin_detail_laporan($id){

      $detail_laporan = DB::table('jadwal')
      ->join('pelanggan','jadwal.id_pelanggan','=','pelanggan.id')
      ->join('Lapangan','jadwal.id_lapangan','=','lapangan.id')
      ->select('jadwal.*','pelanggan.nama_pelanggan','lapangan.nama_lapangan')
      ->where('jadwal.id',$id)
      ->orderBy('jadwal.id','DESC')
      ->get();

      $detail_pembayaran = DB::table('pembayaran')
      ->join('jadwal','pembayaran.id_jadwal','=','jadwal.id')
      ->join('pemesanan','pembayaran.id_pemesanan','=','pemesanan.id')
      ->join('pelanggan','jadwal.id_pelanggan','=','pelanggan.id')
      ->select('jadwal.*','pembayaran.metode_pembayaran','pembayaran.bank','pembayaran.wallet','pembayaran.bukti_pembayaran','pemesanan.jenis_pembayaran','pemesanan.nominal_pembayaran','pemesanan.nominal_dp','pelanggan.nama_pelanggan')
      ->where('jadwal.id',$id)
      ->get();


      //return $detail_laporan;

        return view('admin.laporan.detail_laporan',compact('detail_laporan','detail_pembayaran'));
    }


    public function admin_data_pelanggan(){

        return view('admin.pelanggan.index');
    }


    public function admin_data_member(){

        return view('admin.member.index');
    }
}
