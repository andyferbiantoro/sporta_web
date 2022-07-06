@extends('layouts.app')

@section('title')
Detail Laporan
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
                    <div class="row match-height">
                        <!-- Greetings Card starts -->
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body text-left">
                                  <h1>Detail Pemesanan</h1><br>
                                    
                                    <div class="text-left">
                                        @foreach($detail_laporan as $data)
                                          <div class="table-responsive">
                                            <table id="dataTable"  class="table table-hover">
                                            
                                            <tr>
                                                <th>Tanggal Pemesanan</th>
                                                <th>:</th>
                                                <td>{{date("j F Y", strtotime($data->created_at))}}</td>
                                            </tr>   

                                             <tr>
                                                <th>Jam Pemesanan</th>
                                                <th>:</th>
                                                <td>{{date("H:i", strtotime($data->created_at))}} WIB</td>
                                            </tr> 

                                            <tr>
                                                <th>Lapangan</th>
                                                <th>:</th>
                                                <td>{{$data->nama_lapangan}}</td>
                                            </tr>  

                                            <tr>
                                                <th>Tanggal Main</th>
                                                <th>:</th>
                                                <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                                            </tr> 

                                            <tr>
                                                <th>Jam</th>
                                                <th>:</th>
                                                <td>belum disetting</td>
                                            </tr> 

                                            <tr>
                                                <th>Nama Tim</th>
                                                <th>:</th>
                                                <td>{{$data->nama_tim}}</td>
                                            </tr> 

                                        </table>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body text-left">
                                  <h1>Detail Pembayaran</h1><br>
                                    
                                    <div class="text-left">
                                        @foreach($detail_pembayaran as $data)
                                          <div class="table-responsive">
                                            <table id="dataTable"  class="table table-hover">
                                             <tr>
                                                <th>Nama Pelanggan</th>
                                                <th>:</th>
                                                <td>{{$data->nama_pelanggan}}</td>
                                            </tr> 

                                            <tr>
                                                <th>Metode Pembayaran</th>
                                                <th>:</th>
                                                <td>{{$data->metode_pembayaran}}</td>
                                            </tr>   

                                            @if($data->metode_pembayaran == 'Transfer')
                                            <tr>
                                                <th>Bank</th>
                                                <th>:</th>
                                                <td>{{$data->bank}}</td>
                                            </tr>   
                                            @endif

                                            @if($data->metode_pembayaran == 'Wallet')
                                            <tr>
                                                <th>Bank</th>
                                                <th>:</th>
                                                <td>{{$data->wallet}}</td>
                                            </tr>   
                                            @endif

                                            @if($data->jenis_pembayaran == 'DP')
                                            <tr>
                                                <th>Nominal DP</th>
                                                <th>:</th>
                                                <td>Rp. <?=number_format($data->nominal_dp, 0, ".", ".")?>,00</td>
                                            </tr>   
                                            @endif

                                             <tr>
                                                <th>Nominal Pembayaran</th>
                                                <th>:</th>
                                                <td>Rp. <?=number_format($data->nominal_pembayaran, 0, ".", ".")?>,00</td>
                                            </tr>  

                                            
                                        </table>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body text-left">
                                  <h1>Bukti Pembayaran</h1><br>
                                    
                                    <div class="text-center">
                                        @foreach($detail_pembayaran as $data)
                                          <div class="table-responsive">
                                            <table id="dataTable"  class="table table-hover">

                                            <tr>
                                                <td>
                                                    <img height="400" id="myImg" src="{{asset('uploads/bukti_pembayaran/'.$data->bukti_pembayaran)}}"></img>
                                                </td>
                                            </tr>
                                             
                                        </table>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>


    <

    @endsection