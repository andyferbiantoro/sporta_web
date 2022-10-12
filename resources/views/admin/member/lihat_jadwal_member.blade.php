@extends('layouts.app')

@section('title')
Detail Jadwal Member
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
                                  <h1>Detail Jadwal Member</h1>

                                    
                                    <div class="text-left">
                                        @foreach($detail_jadwal_member as $data)
                                        <div class="table-responsive">
                                            <br>
                                            <table id="dataTable"  class="table table-hover">
                                            
                                            <tr>
                                                <th>Nama Tim</th>
                                                <th>:</th>
                                                <td>{{$data->nama_tim}}</td>
                                            </tr>   

                                             <tr>
                                                <th>Ketua Tim</th>
                                                <th>:</th>
                                                <td>{{$data->ketua_tim}}</td>
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
                                  <h1>Logo Tim</h1>

                                    
                                    <div class="text-center">
                                        @foreach($detail_jadwal_member as $data)
                                        <div class="table-responsive">
                                           
                                            <table   class="table table-hover">
                                            
                                            <tr>
                                                <td>
                                                    <br><br>
                                                    <img style="border-radius: 0%" height="110" id="ImageTampil" src="{{asset('uploads/logo_tim/'.$data->logo_tim)}}"  data-toggle="modal" data-target="#myModal"></img>
                                                </td>
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
                                            <h3>Jadwal Member</h3>
                                            <table id="dataTable2" class="table table-hover">
                                            
                                             <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Lapangan</th>
                                                        <th>hari</th>
                                                        <th>Durasi</th>
                                                        <th>jam</th>
                                                  
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php $no=1 @endphp
                                                    @foreach($detail_jadwal_member as $data)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$data->nama_lapangan}}</td>

                                                        @if($data->hari == 'Monday')    
                                                        <td>Senin</td>
                                                        @elseif($data->hari == 'Tuesday')
                                                        <td>Selasa</td>
                                                        @elseif($data->hari == 'Wednesday')
                                                        <td>Rabu</td>
                                                        @elseif($data->hari == 'Thrusday')
                                                        <td>Kamis</td>
                                                        @elseif($data->hari == 'Friday')
                                                        <td>Jum'at</td>
                                                        @elseif($data->hari == 'Saturday')
                                                        <td>Sabtu</td>
                                                        @elseif($data->hari == 'Sunday')
                                                        <td>Minggu</td>
                                                        @endif

                                                        <td>{{$data->durasi}} Jam</td>
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