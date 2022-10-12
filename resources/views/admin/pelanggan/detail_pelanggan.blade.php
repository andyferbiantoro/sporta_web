@extends('layouts.app')

@section('title')
Detail Pelanggan
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
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body text-left">
                                  <h1>Detail Pelanggan</h1>

                                    
                                    <div class="text-left">
                                        @foreach($detail_pelanggan as $data)
                                        <div class="table-responsive">
                                            <h3>Informasi Pribadi</h3><br>
                                            <table id="dataTable"  class="table table-hover">
                                            
                                            <tr>
                                                <th>Nama Pelanggan</th>
                                                <th>:</th>
                                                <td>{{$data->nama_pelanggan}}</td>
                                            </tr>   

                                             <tr>
                                                <th>Email</th>
                                                <th>:</th>
                                                <td>{{$data->email}}</td>
                                            </tr> 

                                            <tr>
                                                <th>No Handphone</th>
                                                <th>:</th>
                                                <td>{{$data->no_hp}}</td>
                                            </tr>  

                                            </table>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body text-left">
                                  <h1>Foto Pelanggan</h1>

                                    
                                    <div class="text-left">
                                        @foreach($detail_pelanggan as $data)
                                        <div class="table-responsive">
                                           
                                            <table id="dataTable"  class="table table-hover">
                                            
                                            <tr>
                                               <td></td>
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
                                    
                                    <div class="text-left">
                                        
                                        <div class="table-responsive">
                                            <h3>Riwayat Transaksi</h3>
                                            <table id="dataTable2"  class="table table-hover">
                                            
                                             <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Nama Tim</th>
                                                        <th>Jam</th>
                                                  
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php $no=1 @endphp
                                                    @foreach($riwayat_transaksi as $data)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                                                        <td>{{$data->nama_tim}}</td>
                                                        <td>{{$data->jam}}</td>
                                                      
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


    <

    @endsection