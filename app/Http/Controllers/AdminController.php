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
use App\Member;
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

        $lapangan1 = DetailLapangan::where('id_lapangan','2')->get();

        $lapangan2 = DetailLapangan::where('id_lapangan','3')->get();

        return view('admin.lapangan.index',compact('lapangan1','lapangan2'));
    }


    public function admin_foto_lapangan1_add(Request $request){

      $get_count = DetailLapangan::where('id_lapangan',2)->count();
      $data_add = new DetailLapangan();

      $data_add->id_lapangan = 2;
      $data_add->indeks = $get_count+1;

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
      

      return redirect()->back()->with('success', 'Foto Lapangan 1 Berhasil Ditambahkan');
    }


    public function admin_foto_lapangan2_add(Request $request){

      $get_count = DetailLapangan::where('id_lapangan',3)->count();
     $data_add = new DetailLapangan();

     $data_add->id_lapangan = 3;
     $data_add->indeks = $get_count+1;

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


    return redirect()->back()->with('success', 'Foto Lapangan 2 Berhasil Ditambahkan');
  }


  public function admin_foto_lapangan_delete($id){

    $data_lap = DetailLapangan::findOrFail($id);
    File::delete('uploads/image_lapangan/'.$data_lap->image);
    $data_lap->delete();

    return redirect()->back()->with('success', 'Data Lapangan Berhasil Dihapus');
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

          $jam1 = collect($detail_jadwal)->implode('jam',' ,');
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

        return view('admin.pemesanan_lapangan.index',compact('lapangan','jam','pelanggan','jadwal_lap1','jadwal_lap2'));
    }

    public function admin_pesan_lapangan_add(Request $request){

        $id_user_jadwal = Pelanggan::where('id', $request->id_pelanggan)->first();
        $now = Carbon::now()->format('y-m-d');
        
        $data = ([
            'tanggal_pesan' => $now,
            'catatan' => $request['catatan'],
            'id_user_pelanggan' => $request['id_user_pelanggan'],
            'nominal_pembayaran' => $request['nominal_pembayaran'],
            'nominal_dp' => $request['nominal_dp'],
            'jenis_pembayaran' => $request['jenis_pembayaran'],
            'status' => 2,
        ]);

        $id_pemesanan = Pemesanan::create($data)->id;

        $data = ([
            'id_lapangan' => $request['id_lapangan'],
            'tanggal' => $request['tanggal'],
            'nama_tim' => $request['nama_tim'],
            'durasi' => $request['durasi'],
            'id_user_jadwal' => $id_user_jadwal->id_user,
            'id_pelanggan' => $request['id_user_pelanggan'],
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

        $data_add = new Pembayaran();

        $data_add->metode_pembayaran = 'Bayar Ditempat';
        $data_add->id_pemesanan = $id_pemesanan;
        $data_add->bank = $request->input('bank');
        $data_add->wallet = $request->input('wallet');
        $data_add->id_jadwal = $lastid;
        $data_add->status_pembayaran = 1;

        $data_add->save();



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
         $detail_jadwal = DB::table('detail_jadwal')
         ->join('jam', 'detail_jadwal.id_jam','jam.id')
         ->select('detail_jadwal.id_jadwal','jam.jam')
         ->where('id_jadwal',$value->id)
         ->get();


             $jam = collect($detail_jadwal)->implode('jam',' ,');
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

     $confirm = Pemesanan::where('id', $id)->first();
     $this->received($confirm);

     return redirect()->back()->with('success', 'Pemesanan Berhasil Diverifikasi');
   }


    public function received($confirm)
    {
        
        $confirm= DB::table('pemesanan')
        ->join('users', 'pemesanan.id_user_pelanggan', '=', 'users.id')
        ->select('pemesanan.*','users.email')
        ->where('pemesanan.id', $confirm->id)
        ->orderBy('pemesanan.id','DESC')
        ->first();

        

        $this->_sendEmail($confirm);

    }

    public function _sendEmail($confirm)
    {
        $message = new \App\Mail\KonfirmasiMail($confirm);
        \Mail::to($confirm->email)->send($message);
    }




   public function admin_laporan(Request $request){

    $from = $request->from;
    $to = $request->to;

    if ($from == null && $to == null) {
      $laporan = DB::table('jadwal')
      ->join('pelanggan','jadwal.id_pelanggan','=','pelanggan.id')
      ->select('jadwal.*','pelanggan.nama_pelanggan')
      ->orderBy('jadwal.id','DESC')
      ->where('jadwal.status_jadwal', 3)
      ->get();

      foreach ($laporan as $key => $value) {
        $detail_jadwal = DB::table('detail_jadwal')
        ->join('jam', 'detail_jadwal.id_jam','jam.id')
        ->where('id_jadwal',$value->id)
        ->select('jam.jam')
        ->get();

        $jam = collect($detail_jadwal)->implode('jam', ', ');
        $value->jam =$jam;
      }
    }else{
      $laporan = DB::table('jadwal')
      ->join('pelanggan','jadwal.id_pelanggan','=','pelanggan.id')
      ->select('jadwal.*','pelanggan.nama_pelanggan')
      ->orderBy('jadwal.id','DESC')
      ->where('jadwal.status_jadwal', 3)
      ->whereBetween('jadwal.tanggal', [$from, $to])
      ->get();

      foreach ($laporan as $key => $value) {
        $detail_jadwal = DB::table('detail_jadwal')
        ->join('jam', 'detail_jadwal.id_jam','jam.id')
        ->where('id_jadwal',$value->id)
        ->select('jam.jam')
        ->get();

        $jam = collect($detail_jadwal)->implode('jam', ', ');
        $value->jam =$jam;
      }
    }



        return view('admin.laporan.index',compact('laporan','from','to'));
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

        $pelanggan = DB::table('pelanggan')
        ->join('users', 'pelanggan.id_user','users.id')
        ->select('pelanggan.*','users.email')
        ->get();


        return view('admin.pelanggan.index',compact('pelanggan'));
    }


    public function admin_detail_pelanggan($id){

       $detail_pelanggan = DB::table('pelanggan')
        ->join('users', 'pelanggan.id_user','users.id')
        ->select('pelanggan.*','users.email')
        ->where('pelanggan.id',$id)
        ->get();

        $riwayat_transaksi = DB::table('jadwal')
        ->join('pemesanan', 'jadwal.id_pemesanan', '=', 'pemesanan.id')
        ->join('lapangan', 'jadwal.id_lapangan', '=', 'lapangan.id')
        ->select('jadwal.*','lapangan.nama_lapangan','pemesanan.status')
        ->where('jadwal.id_pelanggan', $id)
        ->where('pemesanan.status', 3)
        ->get();

        foreach ($riwayat_transaksi as $key => $value) {
          $detail_jadwal = DB::table('detail_jadwal')
          ->join('jam', 'detail_jadwal.id_jam','jam.id')
          ->where('id_jadwal',$value->id)
          ->select('jam.jam')
          ->get();

          $jam = collect($detail_jadwal)->implode('jam', ', ');
          $value->jam =$jam;
        }


     // return $riwayat_transaksi;

        return view('admin.pelanggan.detail_pelanggan',compact('detail_pelanggan','riwayat_transaksi'));
    }


    public function admin_data_member(){

      $member = Member::orderBy('id','DESC')->get();


        return view('admin.member.index',compact('member'));
    }


     public function admin_data_member_add(Request $request){


       
          $data_add = new Member();

          $data_add->nama_tim = $request->input('nama_tim');
          $data_add->ketua_tim = $request->input('ketua_tim');
          $data_add->no_hp = $request->input('no_hp');


           if ($request->hasFile('logo_tim')) {
              $file = $request->file('logo_tim');
              $extension = $file->getClientOriginalExtension();
              $filename = $file->getClientOriginalName();
              $path = $file->store('public/uploads/logo_tim');
              $file->move('uploads/logo_tim/', $filename);
              $data_add->logo_tim = $filename;
          } else {
              echo "Gagal upload gambar";
          }


          $data_add->save();
     

       return redirect('/admin_data_member')->with('success', 'Data Member Berhasil Ditambahkan');
    }
}
