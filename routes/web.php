<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', 'PelangganController@landingpage')->name('landingpage');
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@register')->name('register');


Route::get('/forgot_password', 'AuthController@forgot_password')->name('forgot_password');
Route::post('send_kode_forgot', 'AuthController@send_kode_forgot')->name('send_kode_forgot')->middleware('guest');


Route::get('/cek_kode', 'AuthController@cek_kode')->name('cek_kode');
Route::post('cek_kode_forgot', 'AuthController@cek_kode_forgot')->name('cek_kode_forgot')->middleware('guest');


Route::get('/reset_password', 'AuthController@reset_password')->name('reset_password');
Route::post('reset_password_proses', 'AuthController@reset_password_proses')->name('reset_password_proses')->middleware('guest');


//proses register
Route::post('proses-register', 'AuthController@proses_register')->name('proses-register')->middleware('guest');

//proses login
Route::post('proses-login','AuthController@proses_login')->name('proses-login')->middleware('guest');

//Untuk Admin
Route::group(['middleware' => ['auth', 'admin']],function(){
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin_kelola_konten', 'AdminController@admin_kelola_konten')->name('admin_kelola_konten');
    Route::get('/admin_kelola_pengumuman', 'AdminController@admin_kelola_pengumuman')->name('admin_kelola_pengumuman');


    Route::post('/admin_konten_add', 'AdminController@admin_konten_add')->name('admin_konten_add');
    Route::post('/admin_konten_update/{id}', 'AdminController@admin_konten_update')->name('admin_konten_update');
    Route::post('/admin_konten_delete/{id}', 'AdminController@admin_konten_delete')->name('admin_konten_delete');

    Route::post('/admin_pengumuman_add', 'AdminController@admin_pengumuman_add')->name('admin_pengumuman_add');
    Route::post('/admin_pengumuman_update/{id}', 'AdminController@admin_pengumuman_update')->name('admin_pengumuman_update');
    Route::post('/admin_pengumuman_delete/{id}', 'AdminController@admin_pengumuman_delete')->name('admin_pengumuman_delete');

    Route::get('/admin_lapangan', 'AdminController@admin_lapangan')->name('admin_lapangan');
    Route::post('/admin_lapangan_add', 'AdminController@admin_lapangan_add')->name('admin_lapangan_add');
    Route::post('/admin_foto_lapangan1_add', 'AdminController@admin_foto_lapangan1_add')->name('admin_foto_lapangan1_add');
    Route::post('/admin_foto_lapangan_delete/{id}', 'AdminController@admin_foto_lapangan_delete')->name('admin_foto_lapangan_delete');

    Route::post('/admin_foto_lapangan2_add', 'AdminController@admin_foto_lapangan2_add')->name('admin_foto_lapangan2_add');
    Route::post('/admin_foto_lapangan2_delete/{id}', 'AdminController@admin_foto_lapangan2_delete')->name('admin_foto_lapangan2_delete');
    Route::post('/admin_deskripsi_lapangan_update/{id}', 'AdminController@admin_deskripsi_lapangan_update')->name('admin_deskripsi_lapangan_update');


    Route::get('/admin_pesan_lapangan', 'AdminController@admin_pesan_lapangan')->name('admin_pesan_lapangan');
    Route::post('/admin_pesan_lapangan_add', 'AdminController@admin_pesan_lapangan_add')->name('admin_pesan_lapangan_add');


    Route::get('/admin_transaksi_berjalan', 'AdminController@admin_transaksi_berjalan')->name('admin_transaksi_berjalan');
    Route::post('/admin_verifikasi_pemesanan/{id}', 'AdminController@admin_verifikasi_pemesanan')->name('admin_verifikasi_pemesanan');
    Route::post('/admin_cancel_pemesanan/{id}', 'AdminController@admin_cancel_pemesanan')->name('admin_cancel_pemesanan');


    Route::get('/admin_laporan', 'AdminController@admin_laporan')->name('admin_laporan');
    Route::get('/admin_detail_laporan{id}', 'AdminController@admin_detail_laporan')->name('admin_detail_laporan');

    Route::get('/admin_data_pelanggan', 'AdminController@admin_data_pelanggan')->name('admin_data_pelanggan');
    Route::get('/admin_detail_pelanggan{id}', 'AdminController@admin_detail_pelanggan')->name('admin_detail_pelanggan');

    Route::get('/admin_data_member', 'AdminController@admin_data_member')->name('admin_data_member');
    Route::post('/admin_data_member_add', 'AdminController@admin_data_member_add')->name('admin_data_member_add');

    Route::post('/admin_jadwal_member_add', 'AdminController@admin_jadwal_member_add')->name('admin_jadwal_member_add');
    Route::get('/admin_lihat_jadwal_member{id}', 'AdminController@admin_lihat_jadwal_member')->name('admin_lihat_jadwal_member');

}); 


//Untuk Pelanggan
Route::group(['middleware' => ['auth', 'pelanggan']],function(){
    Route::get('/pelanggan_dashboard', 'PelangganController@index')->name('pelanggan_dashboard');


    Route::get('/pelanggan_lapangan', 'PelangganController@pelanggan_lapangan')->name('pelanggan_lapangan');
    Route::post('/pelanggan_lapangan_add', 'PelangganController@pelanggan_lapangan_add')->name('pelanggan_lapangan_add');

    Route::get('/pelanggan_pesan_lapangan', 'PelangganController@pelanggan_pesan_lapangan')->name('pelanggan_pesan_lapangan');
    Route::post('/pelanggan_pesan_lapangan_add', 'PelangganController@pelanggan_pesan_lapangan_add')->name('pelanggan_pesan_lapangan_add');
    Route::post('/pelanggan_batalkan_pemesanan/{id}', 'PelangganController@pelanggan_batalkan_pemesanan')->name('pelanggan_batalkan_pemesanan');

    Route::get('/pelanggan_pemesanan_pending', 'PelangganController@pelanggan_pemesanan_pending')->name('pelanggan_pemesanan_pending');
    Route::post('/pelanggan_tambah_pembayaran/{id}', 'PelangganController@pelanggan_tambah_pembayaran')->name('pelanggan_tambah_pembayaran');

    Route::get('/pelanggan_pemesanan_dibayar', 'PelangganController@pelanggan_pemesanan_dibayar')->name('pelanggan_pemesanan_dibayar');

    Route::get('/pelanggan_riwayat_transaksi', 'PelangganController@pelanggan_riwayat_transaksi')->name('pelanggan_riwayat_transaksi');

});



Route::get('/get_booking_jam', 'PelangganController@get_booking_jam')->name('get_booking_jam');
Route::get('/get_id_lapangan', 'PelangganController@get_id_lapangan')->name('get_id_lapangan');
Route::get('/get_id_jadwal/{tanggal}', 'PelangganController@get_id_jadwal')->name('get_id_jadwal');



Route::get('logout-admin', 'AuthController@logout')->name('logout-admin')->middleware(['admin', 'auth']);
Route::get('logout-pelanggan', 'AuthController@logout')->name('logout-pelanggan')->middleware(['pelanggan', 'auth']);