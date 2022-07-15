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

        //auth()->attempt buat proses login  request input username dan password,  request input  sama kayak $request->password dan usernamenya, ditambah $ingat jika pengen ingat
        if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $ingat)){
            //auth->user() untuk memanggil data user yang sudah login
        if(auth()->user()->role == "admin"){
            return redirect()->route('admin_lapangan')->with('success', 'Anda Berhasil Login');
        }else if(auth()->user()->role == "pelanggan"){
            return redirect()->route('pelanggan_lapangan')->with('success', 'Anda Berhasil Login');
        }
    }else{
       
            return redirect()->route('login')->with('error', 'Email / Password anda salah'); //route itu isinya name dari route di web.php

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

        if ($cekemail) {
            return redirect()->back()->with('error', 'Email Sudah Digunakan');
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
}
