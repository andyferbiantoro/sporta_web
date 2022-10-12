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
                                       <div class="form-row">
                                        <label>Lapangan</label>
                                        <select type="text" class="form-control" id="lap" name="lap" value="{{ old('lap') }}">
                                         <option selected disabled> -- Pilih Lapangan -- </option>
                                         @foreach($lapangan as $data)
                                         <option value="{{$data->id}}">{{$data->nama_lapangan}}</option>
                                         @endforeach
                                        </select>
                                      </div>
                                    </div>


                                      <div class="col-lg-2">
                                        <label></label>
                                        <input type="submit" class="btn btn-primary" value="Filter">
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
                                  <div class="col-lg-2"></div>
                                  <div class="col-lg-3">Mulai tanggal : {{date("j F Y", strtotime($from))}}</div>
                                  <div class="col-lg-3">Sampai tanggal : {{date("j F Y", strtotime($to))}}</div>
                                  @if($nama_lapangan != null)
                                  <div class="col-lg-3">Lapangan : {{$nama_lapangan->nama_lapangan}}</div>
                                  @else
                                  <div class="col-lg-3">Lapangan tidak difilter</div>
                                  @endif
                                  <div class="col-lg-1"></div>
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
                                        </div><br><br>



                                         <div class="table-responsive">
                                            <table id="dataTable"  class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Pelanggan</th>
                                                        <th>Nominal</th>
                                                  
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php $no=1 @endphp
                                                    <?php $jumlah = 0 ?>

                                                    @foreach($laporan as $data)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$data->nama_pelanggan}}</td>
                                                        <td>Rp. <?=number_format($data->nominal_pembayaran, 0, ".", ".")?>,00</td>
                                                       
                                                       
                                                    </tr>
                                                    
                                                    <?php $jumlah += $data->nominal_pembayaran ?>
                                                    @endforeach
                                                    <tr>
                                                      <td colspan="2"><b>Jumlah Penghasilan</b></td>
                                                      <td>Rp. <?=number_format($jumlah, 0, ".", ".")?>,00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><br><br><br>

                                        <div class="col-lg-8 text-left">
                                          <div class="table-responsive">
                                            <table class="table table-hover">
                                             <tr>
                                              <th>Tim paling banyak menyewa</th>
                                              <th>:</th>
                                              <td>{{$most_tim->nama_tim}}</td>
                                            </tr>


                                             <tr>
                                              <th>Lapangan yang sering dipakai</th>
                                              <th>:</th>
                                              <td>{{$most_lap->nama_lapangan}}</td>
                                            </tr>

                                            <tr>
                                              <th>Jam yang sering dipakai</th>
                                              <th>:</th>
                                              <td>{{date("H:i ", strtotime($most_jam->jam))}} WIB</td>
                                            </tr>
                                          </table>
                                        </div>

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