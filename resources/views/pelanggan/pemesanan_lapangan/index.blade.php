@extends('layouts.app')

@section('title')
Data Pemesanan Lapangan
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
                            <button type="button" class="btn btn-success " data-toggle="modal" data-target="#ModalAdd">
                             Pesan Lapangan
                         </button>
                         <br><br>
                         <form action="{{route('pelanggan_pesan_lapangan')}}" method="GET">
                          <div class="row">

                            <div class="col-lg-3">
                             <div class="form-row">

                                <input type="date" class="form-control" name="filter_tanggal" placeholder="Cari tanggal .." value="{{ old('filter_tanggal') }}">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Filter Jadwal">
                        </div>
                    </div> 
                </form>

                <br><br><br>
                
                <div class="text-center">
                    <h2>Jadwal Lapangan 1</h2><br><br>
                    <div class="table-responsive">
                        <table  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>jam</th>
                                    <th>Nama Tim</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no=1 @endphp
                                @foreach($jadwal_lap1 as $lap1)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{date("j F Y", strtotime($lap1->tanggal))}}</td>
                                    <td>{{$lap1->jam1}}</td>
                                    <td>{{$lap1->nama_tim}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body text-left">  
                <div class="text-center">
                    <h2>Jadwal Lapangan 2</h2><br><br>
                    <div class="table-responsive">
                        <table  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>jam</th>
                                    <th>Nama Tim</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $no=1 @endphp
                                @foreach($jadwal_lap2 as $lap2)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{date("j F Y", strtotime($lap2->tanggal))}}</td>
                                    <td>{{$lap2->jam2}}</td>
                                    <td>{{$lap2->nama_tim}}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Pesan Lapangan</h5>

    </div>
    <div class="modal-body">
     <form method="post" action="{{route('pelanggan_pesan_lapangan_add')}}" enctype="multipart/form-data">


        {{csrf_field()}}
        

        <div class="form-group">
            <label>Lapangan</label>
            <select type="text" class="form-control" id="id_lapangan" name="id_lapangan" required>
                <option selected value=""> -- Pilih Lapangan -- </option>
                @foreach($lapangan as $data)
                <option value="{{$data->id}}">{{$data->nama_lapangan}}</option>
                @endforeach
            </select><br>
        </div>
        

        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" required="" onchange="TanggalFunction()"></input>
      </div>

      <div class="form-group">
          <label for="nama_tim">Nama Tim</label>
          <input type="text" class="form-control" id="nama_tim" name="nama_tim" required=""></input>
      </div>

      <div class="form-group">
        <label>Jenis Pembayaran</label>
        <select type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" required="" onchange="JenisPembayaranFunction()">
            <option selected value=""> -- Pilih Jenis Pembayaran -- </option>
            <option value="DP">DP</option>
            <option value="Pembayaran Penuh">Pembayaran Penuh</option>
        </select><br>
    </div>

    <div class="row">
        <div class="col-sm-6">
         <div class="form-group">
            <label>Jam</label>
            <select  type="text" class="form-control" id="id_jam" name="id_jam" required="" onchange="JamFunction()">
                <!-- <option selected disabled> -- Pilih Jam -- </option> -->
                           <!--  @foreach($jam as $data)
                            <option value="{{$data->id}}">{{date("H:i ", strtotime($data->jam))}} WIB</option>
                            @endforeach -->
                        </select><br>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Durasi</label>
                        <select type="text" class="form-control" id="durasi" name="durasi" required="" onclick="DurasiFunction()">
                            <option selected value=""> -- Pilih Durasi -- </option>
                            <option value="1">1 Jam</option>
                            <option value="2">2 Jam</option>
                            <option value="3">3 Jam</option>
                            
                        </select><br>
                    </div>
                </div>
            </div>

            <div class="form-group">
              <label for="nominal_pembayaran">Nominal Pembayaran</label>
              <input type="number" class="form-control " id="nominal_pembayaran" name="nominal_pembayaran" required="" readonly=""></input>
          </div>

          <div class="form-group">
              <label for="nominal_dp">Nominal DP (Minimal 30K)</label>
              <input type="number" class="form-control uang" id="nominal_dp" name="nominal_dp" required=""  ></input>
          </div>

          <div class="form-group">
              <label for="catatan">Catatan (Opsional)</label>
              <textarea type="file" class="form-control" id="catatan" name="catatan" ></textarea>
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="id_user_pelanggan" name="id_user_pelanggan" value="{{ Auth::user()->id }}" />
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

@endsection

@section('js')




<script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
        $( '.uang' ).mask('0.000.000.000', {reverse: true});
    })
</script>

<script type="text/javascript">
    

    function JenisPembayaranFunction(){
        var jenis_pembayaran = document.getElementById("jenis_pembayaran").value;
        var nominal_dp = document.querySelector("#nominal_dp");


        if(jenis_pembayaran == "DP"){    
         nominal_dp.removeAttribute("disabled");


     }else{
        nominal_dp.setAttribute("disabled", "");
    }
}

function JamFunction(){
    var id_jam = document.getElementById("id_jam").value;
    var nominal_pembayaran = document.querySelector("#nominal_pembayaran");

    if(id_jam >= 11){    
     document.getElementById("nominal_pembayaran").value = 110000;
 }
 if(id_jam < 11){    
     document.getElementById("nominal_pembayaran").value = 90000;
 }
}

function getTanggalValue(argument) {
    var value_tanggal = document.getElementById("tanggal").value;
    console.log(value_tanggal)
}

//tinggal nunjukin option
function TanggalFunction(){
    var tanggal = document.getElementById("tanggal").value;
    fetch("get_id_jadwal/"+ tanggal )
    .then(response => response.json())
    .then(data => dataJam = data)
    .then(() => {
        var jamElement = document.getElementById("id_jam")
        
        for (var i = 0; i <= dataJam.get_tanggal.length-1; i++) {
            var dataku = dataJam.get_tanggal[i];
            var createJamOption = document.createElement('option')
            createJamOption.textContent = dataku.jam;
            createJamOption.value = dataku.id;
            jamElement.appendChild(createJamOption)
        }

    })
}

function DurasiFunction(){
    var durasi = document.getElementById("durasi").value;
    var id_jam = document.getElementById("id_jam").value;
    var nominal_pembayaran = document.querySelector("#nominal_pembayaran");

    if(durasi && id_jam >= 11){    
     document.getElementById("nominal_pembayaran").value = 110000*durasi;
 }

 if(durasi && id_jam < 11){    
     document.getElementById("nominal_pembayaran").value = 90000*durasi;
 }
 
}



</script>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>


<script>
    //Tambah Pembayaran
    $(document).ready(function() {
        var table = $('#dataTable').DataTable();
        table.on('click', '.tambahPembayaran', function() {
          $tr = $(this).closest('tr');
          if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        console.log(data);
        $('#id_pemesanan_show').val(data[9]);
        $('#nama_lapangan_show').val(data[3]);
        $('#pembayaranForm').attr('action','pelanggan_tambah_pembayaran/'+ data[9]);
        $('#PembayaranModal').modal('show');
    });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
        $( '.uang' ).mask('0.000.000.000', {reverse: true});
    })
</script>



@endsection