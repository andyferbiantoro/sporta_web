@extends('layouts.app')

@section('title')
Data Member
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

                              @if (session('success'))
                              <div class="alert alert-success">
                                {{ session('success') }}
                              </div>
                              @endif
                              @if (session('error'))
                              <div class="alert alert-danger">
                                {{ session('error') }}
                              </div>
                              @endif
                                <div class="card-body text-left">
                                  <button type="button" class="btn btn-success " data-toggle="modal" data-target="#ModalAdd">
                                    Tambah Member
                                  </button>

                                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#JadwalMemberAdd">
                                    Tambah Jadwal Member
                                  </button><br><br>

                                    
                                    <div class="text-center">
                                       <div class="table-responsive">
                                            <table id="dataTable"  class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Tim</th>
                                                        <th>Ketua Tim</th>
                                                        <th>No Handphone</th>
                                                        <th>Tanggal Bergabung</th>
                                                        <th>Logo Tim</th>
                                                        <th>Aksi</th>

                                                  
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php $no=1 @endphp
                                                    @foreach($member as $data)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$data->nama_tim}}</td>
                                                        <td>{{$data->ketua_tim}}</td>
                                                        <td>{{$data->no_hp}}</td>
                                                        <td>{{date("j F Y", strtotime($data->created_at))}}</td>
                                                        <td>
                                                          <img style="border-radius: 0%" height="70" id="ImageTampil" src="{{asset('uploads/logo_tim/'.$data->logo_tim)}}"  data-toggle="modal" data-target="#myModal"></img>
                                                        </td>
                                                        <td>
                                                          <a href="{{ route('admin_lihat_jadwal_member',$data->id) }}"><button class="btn btn-success ">Detail</button></a> 
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


    <!-- Modal Tambah  -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Member</h5>

              </div>
              <div class="modal-body">
               <form method="post" action="{{route('admin_data_member_add')}}" enctype="multipart/form-data">


                {{csrf_field()}}
                <div class="form-group">
                  <label for="nama_tim">Nama Tim</label>
                  <input type="text" class="form-control" id="nama_tim" name="nama_tim" required=""></input>
                </div>


                <div class="form-group">
                  <label for="ketua_tim">Nama Ketua Tim</label>
                  <input type="text" class="form-control" id="ketua_tim" name="ketua_tim" required=""></input>
                </div>


                <div class="form-group">
                  <label for="no_hp">Nomor Handphone</label>
                  <input type="number" class="form-control" id="no_hp" name="no_hp" required=""></input>
                </div>
   

                <div class="form-group">
                  <label for="logo_tim">Logo Tim</label>
                  <input type="file" class="form-control" id="logo_tim" name="logo_tim" required="" ></input>
                </div>

                <!-- <div class="form-group">
                  <input type="hidden" class="form-control" id="jenis" name="jenis" value="1" />
                </div> -->

                <button class="btn btn-primary" type="Submit">Tambahkan</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

            </div>
          </div>
        </div>
      </div>






<!-- Modal Tambah  -->
<div class="modal fade" id="JadwalMemberAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan Lapangan</h5>

    </div>
    <div class="modal-body">
        <form method="post" action="{{route('admin_jadwal_member_add')}}" enctype="multipart/form-data">


        {{csrf_field()}}

        <div class="form-group">
            <label>Member</label>
            <select type="text" class="form-control" id="id_member" name="id_member" required="">
                <option selected disabled> -- Pilih Member -- </option>
                @foreach($member as $data)
                <option value="{{$data->id}}">{{$data->ketua_tim}}</option>
                @endforeach
            </select><br>
        </div>

        <div class="form-group">
            <label>Lapangan</label>
            <select type="text" class="form-control" id="id_lapangan" name="id_lapangan" required="">
                <option selected disabled> -- Pilih Lapangan -- </option>
                @foreach($lapangan as $data)
                <option value="{{$data->id}}">{{$data->nama_lapangan}}</option>
                @endforeach
            </select><br>
        </div>

       <div class="form-group">
            <label>Hari</label>
            <select type="text" class="form-control" id="hari" name="hari" required="" onclick="hariFunction()">
                <option selected disabled> -- Pilih Hari -- </option>
                <option value="Monday">Senin</option>
                <option value="Tuesday">Selasa</option>
                <option value="Wednesday">Rabu</option>
                <option value="Thrusday">Kamis</option>
                <option value="Friday">Jum'at</option>
                <option value="Saturday">Sabtu</option>
                <option value="Sunday">Minggu</option>         
            </select><br>
        </div>

     

    <div class="row">
        <div class="col-sm-6">
         <div class="form-group">
            <label>Jam</label>
            <select  type="text" class="form-control" id="id_jam" name="id_jam" required="">
                <option selected disabled> -- Pilih Jam -- </option>
                @foreach($jam as $data)
                <option value="{{$data->id}}">{{date("H:i ", strtotime($data->jam))}} WIB</option>
                @endforeach
            </select><br>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Durasi</label>
            <select type="text" class="form-control" id="durasi" name="durasi" required="" onclick="DurasiFunction()">
                <option selected disabled> -- Pilih Durasi -- </option>
                <option value="1">1 Jam</option>
                <option value="2">2 Jam</option>
                <option value="3">3 Jam</option>
                <option value="4">4 Jam</option>       
            </select><br>
        </div>
    </div>
</div>


<button class="btn btn-primary" type="Submit">Tambahkan</button>
</form>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

</div>
</div>
</div>
</div>






 <!-- Creates the bootstrap modal where the image will appear -->
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

    @endsection