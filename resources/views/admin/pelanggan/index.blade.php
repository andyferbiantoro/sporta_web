@extends('layouts.app')

@section('title')
Data Pelanggan
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
                                  <h1>Pelanggan</h1>

                                    
                                    <div class="text-center">
                                        <div class="table-responsive">
                                            <table id="dataTable"  class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Pelanggan</th>
                                                        <th>Email</th>
                                                        <th>No Handphone</th>
                                                        <th>Aksi</th>
                                                  
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php $no=1 @endphp
                                                    @foreach($pelanggan as $data)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$data->nama_pelanggan}}</td>
                                                        <td>{{$data->email}}</td>
                                                        <td>{{$data->no_hp}}</td>
                                                        <td> 
                                                          <a href="{{ route('admin_detail_pelanggan',$data->id) }}"><button class="btn btn-success ">Detail</button></a> 
                                                        </td>
                                                       
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