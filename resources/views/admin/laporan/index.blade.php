@extends('layouts.app')

@section('title')
Data Laporan
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
                            <div class="card"><br>
                                  <h1 class="text-center">Laporan</h1><br>
                                <div class="card-body text-left">
                                  <div class="col-lg-10">
                                    <form action="{{route('admin_laporan')}}" method="GET">
                                      <div class="row">
                                        <div class="col-lg-3">
                                          <div class="form-row">
                                            <label>Mulai Tanggal</label>
                                            <input type="date" class="form-control" name="from" placeholder="Cari tanggal .." value="{{ old('from') }}">
                                          </div>
                                        </div>

                                        <div class="col-lg-3">
                                         <div class="form-row">
                                          <label>Sampai Tanggal</label>
                                          <input type="date" class="form-control" name="to" placeholder="Cari tanggal .." value="{{ old('to') }}">
                                        </div>
                                      </div>

                                      <div class="col-lg-2">
                                        <label></label>
                                        <input type="submit" class="btn btn-primary" value="Filter Tanggal">
                                      </div>
                                    </div> 
                                  </form>
                                </div><br>

                                @if($from == null && $to == null)
                                <div class="row">
                                  <div class="col-lg-12"><p style="color: red" class="text-center">Tanggal Tidak Difilter</p></div>
                                </div><br>
                                @endif
                                @if($from != null && $to != null)
                                <div class="row">
                                  <div class="col-lg-3"></div>
                                  <div class="col-lg-3">Mulai tanggal : {{date("j F Y", strtotime($from))}}</div>
                                  <div class="col-lg-3">Sampai tanggal : {{date("j F Y", strtotime($to))}}</div>
                                  <div class="col-lg-3"></div>
                                </div><br><br>
                                @endif
                                    
                                    <div class="text-center">
                                          <div class="table-responsive">
                                            <table id="dataTable"  class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Nama Tim</th>
                                                        <th>Tanggal</th>
                                                        <th>jam</th>
                                                        <th>Aksi</th>
                                                  
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php $no=1 @endphp
                                                    @foreach($laporan as $data)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$data->nama_pelanggan}}</td>
                                                        <td>{{$data->nama_tim}}</td>
                                                        <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                                                        <td>{{$data->jam}}</td>
                                                        <td> 
                                                          <a href="{{ route('admin_detail_laporan',$data->id) }}"><button class="btn btn-success ">Detail</button></a> 
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