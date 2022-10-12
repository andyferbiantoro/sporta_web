@extends('layouts.app')

@section('title')
Menunggu Pembayaran
@endsection


@section('content')


<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                @foreach($pemesanan_dibayar as $data)
                <div class="row match-height">
                    <!-- Greetings Card starts -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body text-left">
                                <h1>Pembayaran Berhasil</h1><br><br>

                              <div class="text-left">
                                <div class="col-lg-8">
                                 <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Nama Tim</th>
                                            <th>:</th>
                                            <td>{{$data->nama_tim}}</td>
                                        </tr> 

                                        <tr>
                                            <th>Tanggal</th>
                                            <th>:</th>
                                            <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                                        </tr> 

                                        <tr>
                                            <th>Lapangan </th>
                                            <th>:</th>
                                            <td>{{$data->nama_lapangan}}</td>
                                        </tr> 

                                        <tr>
                                            <th>Jam </th>
                                            <th>:</th>
                                            <td>{{$data->jam}} WIB</td>
                                        </tr>    

                                        <tr>
                                            <th>Jenis Pembayaran</th>
                                            <th>:</th>
                                            <td>{{$data->jenis_pembayaran}}</td>
                                        </tr>  

                                        <tr>
                                            <th>Nominal Pembayaran Penuh</th>
                                            <th>:</th>
                                            <td>Rp. <?=number_format($data->nominal_pembayaran, 0, ".", ".")?>,00</td>
                                        </tr>  

                                        @if($data->nominal_dp != null)
                                         <tr>
                                            <th>Nominal DP</th>
                                            <th>:</th>
                                            <td>Rp. <?=number_format($data->nominal_dp, 0, ".", ".")?>,00</td>
                                        </tr>

                                        <tr>
                                            <th>Nominal Sisa Tagihan</th>
                                            <th>:</th>
                                            <td>Rp. <?=number_format($data->nominal_pembayaran-$data->nominal_dp, 0, ".", ".")?>,00</td>
                                        </tr>
                                        @endif


                                        <tr>
                                            <th>Metode Pembayaran</th>
                                            <th>:</th>
                                            <td>{{$data->metode_pembayaran}}</td>
                                        </tr> 

                                        @if($data->metode_pembayaran == "Transfer")
                                        <tr>
                                            <th>Bank</th>
                                            <th>:</th>
                                            <td>{{$data->bank}}</td>
                                        </tr>
                                        @endif

                                        @if($data->metode_pembayaran == "Wallet")
                                        <tr>
                                            <th>Wallet</th>
                                            <th>:</th>
                                            <td>{{$data->wallet}}</td>
                                        </tr>
                                        @endif

                                        @if($data->status_pembayaran == 0)
                                        <h5 style="color: orange">Pembayaran anda sedang diverifikasi oleh admin, mohon tunggu email konfirmasi</h5><br>
                                        @endif

                                        @if($data->status_pembayaran == 1)
                                        <h5 style="color: green">Pembayaran anda sudah diverifikasi oleh admin, silakan cek email anda</h5><br>
                                        @endif

                                        @if($data->status_pembayaran == 4)
                                        <h5 style="color: red">Pembayaran anda telah ditolak oleh admin, mohon periksa kembali pembayaran anda</h5><br>
                                        @endif

                                    </table>
                                </div>
                                </div>
                                @if($data->metode_pembayaran != "Bayar Ditempat")
                                <div class="col-lg-4">
                                    <div class="table-responsivele">
                                        <table id="dataTable" class="table table-hover">
                                            <tr>
                                                <th> bukti transfer</th>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                     <img style="border-radius: 0%" height="70" id="ImageTampil" src="{{asset('uploads/bukti_pembayaran/'.$data->bukti_pembayaran)}}"  data-toggle="modal" data-target="#myModal"></img>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
        <!-- Dashboard Analytics end -->

    </div>
</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body text-center">
          <img src="" id="img01" style="width: 450px; height: auto;" >
      </div>
  </div>
</div>
</div>



@section('js')



@endsection
@endsection