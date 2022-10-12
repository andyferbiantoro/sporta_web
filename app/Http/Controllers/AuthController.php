<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Pelanggan;
class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function proses_login(Request $request){
        //remember
        $ingat = $request->remember ? true : false; //jika di ceklik true jika tidak gfalse
        //akan ingat selama 5 tahun jika tidak logout

        if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $ingat)){
            //auth->user() untuk memanggil data user yang sudah login
            
            if(auth()->user()->role == "admin"){
                return redirect()->route('admin')->with('success', 'Anda Berhasil Login');
            }else if(auth()->user()->role == "pelanggan"){
                return redirect()->route('pelanggan_dashboard')->with('success', 'Anda Berhasil Login');
            }
        }else {
            return redirect()->back()->with('error', 'Email / Password anda salah'); //route itu isinya name dari route di web.php
        }

    }

    

    public function register()
    {
        return view('register');
    }


    public function proses_register(Request $request){
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'same' => ':attribute harus sama dengan konfirmasi password',
        ];

            //validasi
        $this->validate($request, [
            //pasword validasinya repassword
            'password' => 'min:5|required_with:repassword|same:repassword',
            'repassword' => 'min:5'
        ], $messages);

        $cekemail = User::where('email', $request->email)->where('role','pelanggan')->first();
        $ceknohp = Pelanggan::where('no_hp',$request->no_hp)->first();

        if ($cekemail) {
            return redirect()->back()->with('error', 'Email Sudah Digunakan');
        }elseif($ceknohp){
            return redirect()->back()->with('error', 'No Telepon Sudah Digunakan');

        }else{

           $data = ([
            'email' => $request['email'],
            'role' => $request['role']="pelanggan",
            'password' => Hash::make($request['password']),
            
        ]);

           $lastid = User::create($data)->id; 

           $data_add = new Pelanggan();

           $data_add->nama_pelanggan = $request->input('nama_pelanggan');
           $data_add->no_hp = $request->input('no_hp');
           $data_add->id_user = $lastid;

           $data_add->save();

           return redirect('/login')->with('success', 'Anda Berhasil Register, Silakan Login');
       }       
   }





   public function logout(){

        auth()->logout(); //logout
        
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
        
    }


    public function forgot_password()
    {
        return view('lupa_password');
    }


    public function send_kode_forgot(Request $request){

        $cekemail = User::where('email', $request->email)->where('role','pelanggan')->first();
        
        if ($cekemail) {

            $data_update = User::where('email', $request->email)->where('role','pelanggan')->first();
            
            $kode = mt_rand(100000, 999999);
            $input = [

             'forgot_code' => $kode,

         ];

         $data_update->update($input);

         $this->received($cekemail);
         return redirect()->route('cek_kode')->with('success', 'Kode verifikasi telah dikirim ke email anda, silahkan cek email');
     }else{
        return redirect()->back()->with('error', 'Email belum terdaftar');
    }

}


public function received($cekemail)
{

    $cekemail= User::where('id', $cekemail->id)->first();



    $this->_sendEmail($cekemail);

}

public function _sendEmail($cekemail)
{
    $message = new \App\Mail\ForgotMail($cekemail);
    \Mail::to($cekemail->email)->send($message);
}

public function cek_kode()
{
    return view('cek_kode');
}


public function cek_kode_forgot(Request $request){

    $cekkode = User::where('forgot_code', $request->forgot_code)->where('role','pelanggan')->first();

    if ($cekkode->forgot_code = $request->forgot_code) {




            // return $cookie;
       return redirect()->route('reset_password')->with('success', 'password berhasi diperbarui')->withCookie('kode',$cekkode->forgot_code);
   }else{
    return redirect()->back()->with('error', 'Kode Tidak Valid');
}

}

public function reset_password()
{


    return view('reset_password');
}


public function reset_password_proses(Request $request){

    $messages = [
        'required' => ':attribute wajib diisi',
        'min' => ':attribute harus diisi minimal :min karakter',
        'max' => ':attribute harus diisi maksimal :max karakter',
        'same' => ':attribute harus sama dengan konfirmasi password',
    ];

            //validasi
    $this->validate($request, [
            //pasword validasinya repassword
        'password' => 'min:5|required_with:repassword|same:repassword',
        'repassword' => 'min:5'
    ], $messages);

    $get_cookie = $request->cookie('kode');

    $user = User::where('forgot_code', $get_cookie)->where('role','pelanggan')->first();

    $input = [
        'password' => Hash::make($request['password']),

    ];
    $user->update($input);

    if(auth()->attempt(['password' => $input=['password']])){
            //auth->user() untuk memanggil data user yang sudah login
        
        if(auth()->user()->role == "admin"){
            return redirect()->route('admin')->with('success', 'Anda Berhasil Login');
        }else if(auth()->user()->role == "pelanggan"){
            return redirect()->route('pelanggan_dashboard')->with('success', 'Anda Berhasil Login');
        }
    }else {
            return redirect()->back()->with('error', 'Email / Password anda salah'); //route itu isinya name dari route di web.php
        }


    }
}
