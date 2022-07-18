@extends('layouts.app')

@section('title')
Riwayat Transaksi
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
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body text-left">
                                  <h1>Menunggu Pembayaran</h1><br><br>

                                    
                                    <div class="text-center">
                                       <div class="table-responsive">
                                            <table id="dataTable"  class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Tim</th>
                                                        <th>Tanggal</th>
                                                        <th>Lapangan</th>
                                                        <th>jam</th>
                                                        <th>Durasi</th>
                                                        <th>Jenis Pembayaran</th>
                                                        <th>Nominal Pembayaran</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php $no=1 @endphp
                                                    @foreach($riwayat as $data)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$data->nama_tim}}</td>
                                                        <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                                                        <td>{{$data->nama_lapangan}}</td>
                                                        <td>{{$data->jam}} WIB</td>
                                                        <td>{{$data->durasi}} Jam</td>
                                                        <td>{{$data->jenis_pembayaran}}</td>
                                                        <td>Rp. <?=number_format($data->nominal_pembayaran, 0, ".", ".")?>,00</td>
                                                        
                                                       
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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


   
   

    @section('js')

   


     @endsection
    @endsection