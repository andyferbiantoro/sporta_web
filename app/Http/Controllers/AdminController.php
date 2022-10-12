<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapangan;
use App\DetailLapangan;
use App\DetailJadwal;
use App\DetailJadwalMember;
use App\Jam;
use App\Jadwal;
use App\JadwalMember;
use App\Pemesanan;
use App\Pembayaran;
use App\Pelanggan;
use App\Member;
use App\Konten;
use Auth;
use DB;
use File;
use Carbon\Carbon;

class AdminController extends Controller
{

  //menaplikan halman dashboard admin
    public function index(){

     $konten = Konten::where('foto_konten','!=',null)->orderBy('id','DESC')->get();
     $pengumuman = Konten::where('foto_pengumuman','!=',null)->orderBy('id','DESC')->get();
     $member = Member::orderBy('id','DESC')->get();

     return view('admin.index',compact('konten','member','pengumuman'));
   }

  //menampilkan halaman kelola konten
    public function admin_kelola_konten(){

     $konten = Konten::where('foto_konten','!=',null)->orderBy('id','DESC')->get();

     return view('admin.konten.index',compact('konten'));
   }

   //function untk mnambahkan konten dari admin
   public function admin_konten_add(Request $request){

      $get_count = Konten::where('foto_konten','!=',null )->count();
      $data_add = new Konten();

      $data_add->indeks_konten = $get_count+1;

      if ($request->hasFile('foto_konten')) {
        $file = $request->file('foto_konten');
        $extension = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName();
        $path = $file->store('public/uploads/foto_konten');
        $file->move('uploads/foto_konten/', $filename);
        $data_add->foto_konten = $filename;
      } else {
        echo "Gagal upload gambar";
      }


      $data_add->save();
      

      return redirect()->back()->with('success', 'Foto Konten Berhasil Ditambahkan');
    }


    //menghapus konten
    public function admin_konten_delete($id){

      $data_lap = Konten::findOrFail($id);
      File::delete('uploads/foto_konten/'.$data_lap->foto_konten);
      $data_lap->delete();

      return redirect()->back()->with('success', 'Data Lapangan Berhasil Dihapus');
    }

    //mengupdate konten
    public function admin_konten_update(Request $request, $id){

     $data_update = Konten::where('id', $id)->first();


     if ($file = $request->file('foto_konten')) {
       if ($data_update->foto_konten) {
        File::delete('uploads/foto_konten/' . $data_update->foto_konten);
      }
      $nama_file = $file->getClientOriginalName();
      $file->move(public_path() . '/uploads/foto_konten/', $nama_file);
      $input['foto_konten'] = $nama_file;
    }

    $data_update->update($input);


    return redirect()->back()->with('success', 'Data Lapangan Berhasil Diupdate');
  }

  //menampilkan halaman kelola pengumuman
   public function admin_kelola_pengumuman(){

     $pengumuman = Konten::where('foto_pengumuman','!=',null)->orderBy('id','DESC')->get();

     return view('admin.konten.pengumuman',compact('pengumuman'));
   }

   //menambahkan pengumuman
   public function admin_pengumuman_add(Request $request){

      $get_count = Konten::where('foto_pengumuman','!=',null )->count();
      $data_add = new Konten();

      $data_add->indeks_pengumuman = $get_count+1;
      $data_add->isi_pengumuman = $request->input('isi_pengumuman');

      if ($request->hasFile('foto_pengumuman')) {
        $file = $request->file('foto_pengumuman');
        $extension = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName();
        $path = $file->store('public/uploads/foto_pengumuman');
        $file->move('uploads/foto_pengumuman/', $filename);
        $data_add->foto_pengumuman = $filename;
      } else {
        echo "Gagal upload gambar";
      }


      $data_add->save();
      

      return redirect()->back()->with('success', 'Foto Konten Berhasil Ditambahkan');
    }


    //menghapus pengumuman
    public function admin_pengumuman_delete($id){

      $data_lap = Konten::findOrFail($id);
      File::delete('uploads/foto_pengumuman/'.$data_lap->foto_pengumuman);
      $data_lap->delete();

      return redirect()->back()->with('success', 'Data Lapangan Berhasil Dihapus');
    }

    //updte pengumuman
    public function admin_pengumuman_update(Request $request, $id){

     $data_update = Konten::where('id', $id)->first();

      $input = [

       'isi_pengumuman' => $request['isi_pengumuman'],

     ];

     if ($file = $request->file('foto_pengumuman')) {
       if ($data_update->foto_pengumuman) {
        File::delete('uploads/foto_pengumuman/' . $data_update->foto_pengumuman);
      }
      $nama_file = $file->getClientOriginalName();
      $file->move(public_path() . '/uploads/foto_pengumuman/', $nama_file);
      $input['foto_pengumuman'] = $nama_file;
    }

    $data_update->update($input);


    return redirect()->back()->with('success', 'Data Lapangan Berhasil Diupdate');
  }

//=================================================================================================================
   
   //menampilkan halaman untuk mengelola lapangan
    public function admin_lapangan(){

        $lapangan1 = DetailLapangan::where('id_lapangan','2')->get();

        $lapangan2 = DetailLapangan::where('id_lapangan','3')->get();

        $deskripsi = Lapangan::orderBy('id', 'DESC')->get();

        return view('admin.lapangan.index',compact('lapangan1','lapangan2','deskripsi'));
    }

    //menambahkan foto lapangan 1
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

    //menambahkan foto lapangan 1
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

//hapus foto lapangan
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


    public function admin_deskripsi_lapangan_update(Request $request, $id)
    {


      $data_update = Lapangan::where('id', $id)->first();


      $input = [

       'deskripsi' => $request['deskripsi'],

     ];

     $data_update->update($input);


     return redirect()->back()->with('success', 'Deskripsi Berhasil Diupdate');
   }

  


//============================================================================================================================

    //menampilkan halaman pesan laapngan pada admin
    public function admin_pesan_lapangan(Request $request){

        $now = Carbon::now()->format('y-m-d');

        $lapangan = Lapangan::all();
        $jam = Jam::all();
        $pelanggan = Pelanggan::all();
        //$jadwal_lap1 = Jadwal::where('id_lapangan','2')->where('tanggal',$now)->get();
        //$jadwal_lap2 = Jadwal::where('id_lapangan','3')->where('tanggal',$now)->get();

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

        return view('admin.pemesanan_lapangan.index',compact('lapangan','jam','pelanggan','jadwal_lap1','jadwal_lap2'));
    }


    //melakukan proses pemesanan lapangan
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

//==============================================================================================================================


    //menampilkan halaman transaksi berjalan 
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


            $jam = collect($detail_jadwal)->implode('jam',' WIB, ');
            $value->jam =$jam;
        }

        //return $pemesanan;

        return view('admin.transaksi.index',compact('pemesanan'));
    }

    //function untuk melakukan verifikasi pemesanan oelh admin
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


   

   //memberikan notifikasi ke email pelangan setelah pesanan dikonfirmasi oleh admin
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



public function admin_cancel_pemesanan($id)
   {

//semua status berubah menjadi 4 = (status cancel)
   $data_update = Pemesanan::where('id', $id)->first();

      $input = [

       'status' => 4,

     ];

     $data_update->update($input);


     $update_pembayaran = Pembayaran::where('id_pemesanan',$id)->first();

     $input2 = [

       'status_pembayaran' => 4,

     ];

     $update_pembayaran->update($input2);


     $update_status_jadwal = Jadwal::where('id_pemesanan',$id)->first();

     $input3 = [

       'status_jadwal' => 4,

     ];

     $update_status_jadwal->update($input3);
    
     $cancel = Pemesanan::where('id', $id)->first();
     $this->received2($cancel);

   return redirect()->back()->with('error', 'Pemesanan Telah Ditolak');
  }

  //memberikan notifikasi ke email pelangan setelah pesanan dicancel oleh admin
    public function received2($cancel)
    {
        
        $cancel= DB::table('pemesanan')
        ->join('users', 'pemesanan.id_user_pelanggan', '=', 'users.id')
        ->select('pemesanan.*','users.email')
        ->where('pemesanan.id', $cancel->id)
        ->orderBy('pemesanan.id','DESC')
        ->first();

        

        $this->_sendEmail2($cancel);

    }

    public function _sendEmail2($cancel)
    {
        $message = new \App\Mail\CancelMail($cancel);
        \Mail::to($cancel->email)->send($message);
    }


//===============================================================================================================================
   //menampilkan haalaman laproan pada admin
   public function admin_laporan(Request $request){
    
    $lapangan = Lapangan::all();

    $from = $request->from;
    $to = $request->to;
    $lap = $request->lap;
    $nama_lapangan = Lapangan::where('id', $lap)->first();

    if ($from == null && $to == null) {
      $laporan = DB::table('jadwal')
      ->join('pelanggan','jadwal.id_pelanggan','=','pelanggan.id')
      ->join('pemesanan','jadwal.id_pemesanan','=','pemesanan.id')
      ->select('jadwal.*','pemesanan.nominal_pembayaran','pelanggan.nama_pelanggan')
      ->orderBy('jadwal.id','DESC')
      ->where('jadwal.status_jadwal', 3)
      ->get();

      foreach ($laporan as $key => $value) {
        $detail_jadwal = DB::table('detail_jadwal')
        ->join('jam', 'detail_jadwal.id_jam','jam.id')
        ->where('id_jadwal',$value->id)
        ->select('jam.jam')
        ->get();

        $jam = collect($detail_jadwal)->implode('jam',' WIB, ');
        $value->jam =$jam;
      }

      $most_tim = Jadwal::groupBy('nama_tim')->select('nama_tim', \DB::raw('count(*) as total'))->orderBy('total', 'DESC')->first();
      
      $get_lap = Jadwal::groupBy('id_lapangan')->select('id_lapangan', \DB::raw('count(*) as total'))->orderBy('total', 'DESC')->first();
      $most_lap = Lapangan::where('id', $get_lap->id_lapangan)->first();


      $get_jam = DetailJadwal::groupBy('id_jam')->select('id_jam', \DB::raw('count(*) as total'))->orderBy('total', 'DESC')->first();
      $most_jam = Jam::where('id', $get_jam->id_jam)->first();
      // return $get_jam;
       
    }elseif($lap == null){
      $laporan = DB::table('jadwal')
      ->join('pelanggan','jadwal.id_pelanggan','=','pelanggan.id')
      ->join('pemesanan','jadwal.id_pemesanan','=','pemesanan.id')
      ->select('jadwal.*','pemesanan.nominal_pembayaran','pelanggan.nama_pelanggan')
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

        $jam = collect($detail_jadwal)->implode('jam',' WIB, ');
        $value->jam =$jam;
      }


      $most_tim = Jadwal::groupBy('nama_tim')->select('nama_tim', \DB::raw('count(*) as total'))->orderBy('total', 'DESC')->whereBetween('tanggal', [$from, $to])->first();
      
      $get_lap = Jadwal::groupBy('id_lapangan')->select('id_lapangan', \DB::raw('count(*) as total'))->orderBy('total', 'DESC')->whereBetween('tanggal', [$from, $to])->first();
      $most_lap = Lapangan::where('id', $get_lap->id_lapangan)->first();

      $tanggal = Jadwal::whereBetween('tanggal', [$from, $to])->get();
      foreach ($tanggal as $key => $value) {
        # code...
      $get_jam = DetailJadwal::groupBy('id_jam')->select('id_jam', \DB::raw('count(*) as total'))->orderBy('total', 'DESC')->where('id_jadwal', $value->id)->first();
      }
      $most_jam = Jam::where('id', $get_jam->id_jam)->first();
      // return $most_jam;
   
    }else{
      $laporan = DB::table('jadwal')
      ->join('pelanggan','jadwal.id_pelanggan','=','pelanggan.id')
      ->join('pemesanan','jadwal.id_pemesanan','=','pemesanan.id')
      ->select('jadwal.*','pemesanan.nominal_pembayaran','pelanggan.nama_pelanggan')
      ->orderBy('jadwal.id','DESC')
      ->where('jadwal.status_jadwal', 3)
      ->whereBetween('jadwal.tanggal', [$from, $to])
      ->where('jadwal.id_lapangan', $lap)
      ->get();

      foreach ($laporan as $key => $value) {
        $detail_jadwal = DB::table('detail_jadwal')
        ->join('jam', 'detail_jadwal.id_jam','jam.id')
        ->where('id_jadwal',$value->id)
        ->select('jam.jam')
        ->get();

        $jam = collect($detail_jadwal)->implode('jam',' WIB, ');
        $value->jam =$jam;
      }


      $most_tim = Jadwal::groupBy('nama_tim')->select('nama_tim', \DB::raw('count(*) as total'))->orderBy('total', 'DESC')->whereBetween('tanggal', [$from, $to])->where('jadwal.id_lapangan', $lap)->first();
      
      $get_lap = Jadwal::groupBy('id_lapangan')->select('id_lapangan', \DB::raw('count(*) as total'))->orderBy('total', 'DESC')->whereBetween('tanggal', [$from, $to])->where('jadwal.id_lapangan', $lap)->first();
      $most_lap = Lapangan::where('id', $get_lap->id_lapangan)->first();

      $tanggal = Jadwal::whereBetween('tanggal', [$from, $to])->where('jadwal.id_lapangan', $lap)->get();
      foreach ($tanggal as $key => $value) {
        # code...
      $get_jam = DetailJadwal::groupBy('id_jam')->select('id_jam', \DB::raw('count(*) as total'))->orderBy('total', 'DESC')->where('id_jadwal', $value->id)->first();
      }
      $most_jam = Jam::where('id', $get_jam->id_jam)->first();
      // return $most_jam;
    }



        return view('admin.laporan.index',compact('laporan','from','to','lapangan','nama_lapangan','most_tim','most_lap','most_jam'));
    }

    //menampilkan halaman detail laporan
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


    //menampilkan halaman data pelanggan
    public function admin_data_pelanggan(){

        $pelanggan = DB::table('pelanggan')
        ->join('users', 'pelanggan.id_user','users.id')
        ->select('pelanggan.*','users.email')
        ->get();


        return view('admin.pelanggan.index',compact('pelanggan'));
    }

    //menampilkan halaman detail pelanggan
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

          $jam = collect($detail_jadwal)->implode('jam',' WIB, ');
          $value->jam =$jam;
        }


     // return $riwayat_transaksi;

        return view('admin.pelanggan.detail_pelanggan',compact('detail_pelanggan','riwayat_transaksi'));
    }


//==================================================================================================================================
    //halaman untuk data member
    public function admin_data_member(){

      $member = Member::orderBy('id','DESC')->get();
      $lapangan = Lapangan::all();
      $jam = Jam::all();


        return view('admin.member.index',compact('member','lapangan','jam'));
    }


    //menambahkan data member
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

    //menambahkan jadwal member
     public function admin_jadwal_member_add(Request $request){

        // $id_user_jadwal = Pelanggan::where('id', $request->id_pelanggan)->first();
        // $now = Carbon::now()->format('y-m-d');
        
        // $data = ([
        //     'tanggal_pesan' => $now,
        //     'catatan' => $request['catatan'],
        //     'id_user_pelanggan' => $request['id_user_pelanggan'],
        //     'nominal_pembayaran' => $request['nominal_pembayaran'],
        //     'nominal_dp' => $request['nominal_dp'],
        //     'jenis_pembayaran' => $request['jenis_pembayaran'],
        //     'status' => 2,
        // ]);

        // $id_pemesanan = Pemesanan::create($data)->id;

        $data = ([
            'id_lapangan' => $request['id_lapangan'],
            'id_member' => $request['id_member'],
            'hari' => $request['hari'],
            'durasi' => $request['durasi'],
           
        ]);

        $lastid = JadwalMember::create($data)->id;

        for ($i=1; $i <= $request->durasi ; $i++) { 

            $data_add = new DetailJadwalMember();

            $data_add->id_jam = $request->id_jam++;
            $data_add->id_jadwal_member = $lastid;

            $data_add->save();

        }
        
        // $data_add = new Pembayaran();

        // $data_add->metode_pembayaran = 'Bayar Ditempat';
        // $data_add->id_pemesanan = $id_pemesanan;
        // $data_add->bank = $request->input('bank');
        // $data_add->wallet = $request->input('wallet');
        // $data_add->id_jadwal = $lastid;
        // $data_add->status_pembayaran = 1;

        // $data_add->save();



       return redirect('/admin_data_member')->with('success', 'Data Jadwal Member Berhasil Ditambahkan');
    }

    //melihat jadwal meember
    public function admin_lihat_jadwal_member($id){

      $detail_jadwal_member = DB::table('jadwal_member')
      ->join('member','jadwal_member.id_member','=','member.id')
      ->join('lapangan','jadwal_member.id_lapangan','=','lapangan.id')
      ->select('jadwal_member.*','member.nama_tim','member.ketua_tim','member.logo_tim','member.no_hp','lapangan.nama_lapangan')
      ->where('member.id',$id)
      ->orderBy('jadwal_member.id','DESC')
      ->get();

     foreach ($detail_jadwal_member as $key => $value) {
          $detail_jadwal = DB::table('detail_jadwal_member')
          ->join('jam', 'detail_jadwal_member.id_jam','jam.id')
          ->where('id_jadwal_member',$value->id)
          ->select('jam.jam')
          ->get();

         $jam = collect($detail_jadwal)->implode('jam',' WIB, ');
          $value->jam =$jam;
        }


      return view('admin.member.lihat_jadwal_member',compact('detail_jadwal_member'));
    }
}
