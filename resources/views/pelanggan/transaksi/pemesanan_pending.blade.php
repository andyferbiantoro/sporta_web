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
        <div class="row match-height">
          <!-- Greetings Card starts -->
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-body text-left">
                <h1>Menunggu Pembayaran</h1><br><br>

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
                <div class="text-center">
                 <div class="table-responsive">
                  <table id="dataTable"  class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Tanggal</th>
                        <th>Lapangan</th>
                          
                        <th>Jenis Pembayaran</th>
                        <th>Nominal Pembayaran</th>
                        <th>Nominal DP</th>
                        <th>Status Pemesanan</th>
                        <th>Batas Waktu Pembayaran</th>
                        <th>Aksi</th>
                        <th style="display: none">id (hidden)</th>
                      </tr>
                    </thead>

                    <tbody>
                      @php $no=1 @endphp
                      @foreach($pemesanan_pending as $data)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama_tim}}</td>
                        <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                        <td>{{$data->nama_lapangan}}</td>
                        
                        <td>{{$data->jenis_pembayaran}}</td>
                        <td>{{$data->nominal_pembayaran}}</td>
                        @if($data->jenis_pembayaran == "DP")
                        <td>{{$data->nominal_dp}}</td>
                        @endif

                        @if($data->jenis_pembayaran == "Pembayaran Penuh")
                        <td>tidak ada DP</td>
                        @endif

                        <td>Belum Dibayar</td>
                        <td>{{date("j F Y", strtotime($data->tenggat_bayar))}}</td>
                        <td>
                          <button class="btn btn-primary tambahPembayaran">Bayar Sekarang</button>
                          <br><br>

                          <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal">
                            <button class="btn btn-danger">Batalkan Pesanan</button>
                          </a>
                        </td>
                        <td style="display: none;">{{$data->id}}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Lapangan</h5>

      </div>
      <div class="modal-body">
       <form method="post" action="{{route('admin_lapangan_add')}}" enctype="multipart/form-data">


        {{csrf_field()}}
        <div class="form-group">
          <label for="nama_lapangan">Nama Lapangan</label>
          <input type="text" class="form-control" id="nama_lapangan" name="nama_lapangan" required=""></input>
        </div>

        

        <div class="form-group">
          <label for="image">Foto Lapangan 1</label>
          <input type="file" class="form-control" id="image" name="image" required=""></input>
        </div>

        <div class="form-group">
          <label for="image">Foto Lapangan 2</label>
          <input type="file" class="form-control" id="image" name="image" required=""></input>
        </div>

        <div class="form-group">
          <label for="image">Foto Lapangan 3</label>
          <input type="file" class="form-control" id="image" name="image" required=""></input>
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





      <!-- Modal Tambah Pembayran -->
      <div id="PembayaranModal" class="modal fade" role="dialog">
        <div class="modal-dialog ">
          <!-- Modal content-->
          <form action="" id="pembayaranForm" method="post"  enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambahkan Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="form-group form-success">
                  <label style="color: #009970">Lapangan</label>
                  <input type="text" id="nama_lapangan_show" class="form-control" readonly="">
                  <span class="form-bar"></span>
                </div>

                <div class="form-group">
                  <input type="hidden" class="form-control" id="id_pemesanan_show" name="id_pemesanan"  />
                </div>


                <div class="form-group form-success">
                  <label style="color: #009970">Metode Pembayaran</label>
                  <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required="" onchange="MetodePembayaranFunction()">
                   <!-- <option selected disabled> -- Pilih Metode Pembayaran -- </option> -->
                   <option value="Bayar Ditempat">Bayar Ditempat</option>
                   <option value="Transfer">Transfer</option>
                   <option value="Wallet">Wallet</option>
                 </select>
                 <span class="form-bar"></span>
               </div>


             <!--   <div class="form-group form-success">
                <label style="color: #009970">Bank</label>
                <select name="bank" id="bank" class="form-control" required="" disabled="" >
                 <option selected disabled> -- Pilih Bank -- </option>
                 <option >BRI</option>
                 <option >Mandiri</option>
               </select>
               <span class="form-bar"></span>
             </div> -->

               <div class="row" id="bank" hidden="">
                    <div class="col-sm-4">
                       <div class="form-group">
                        <label>Bank</label>
                          <p><input type='radio' name='bank' value='BRI' /> <img style="border-radius: 0%" height="30" src="{{asset('uploads/image_bank/bri_logo.png')}}"></img></p>
                          <p>01312040148091</p>
                        </div>
                    </div>
                     <div class="col-sm-4">
                       <div class="form-group">
                         <label></label>
                          <p><input type='radio' name='bank' value='Mandiri' /><img style="border-radius: 0%" height="30" src="{{asset('uploads/image_bank/mandiri_logo.png')}}"></img></p>
                          <p>01312040148091</p>
                        </div>
                    </div>
                     <div class="col-sm-4">
                       <div class="form-group">
                         <label></label>
                          <p><input type='radio' name='bank' value='BNI' /><img style="border-radius: 0%" height="30" src="{{asset('uploads/image_bank/bni_logo.png')}}"></img></p>
                          <p>01312040148091</p>
                        </div>
                    </div>
                   
                </div>


                <div class="row" id="wallet" hidden="">
                    <div class="col-sm-4">
                       <div class="form-group">
                        <label>Bank</label>
                          <p><input type='radio' name='wallet' value='OVO' /> <img style="border-radius: 0%" height="30" src="{{asset('uploads/image_wallet/ovo_logo.png')}}"></img></p>
                          <p>01312040148091</p>
                        </div>
                    </div>
                     <div class="col-sm-4">
                       <div class="form-group">
                         <label></label>
                          <p><input type='radio' name='wallet' value='DANA' /><img style="border-radius: 0%" height="30" src="{{asset('uploads/image_wallet/dana_logo.png')}}"></img></p>
                          <p>01312040148091</p>
                        </div>
                    </div>
                     <div class="col-sm-4">
                       <div class="form-group">
                         <label></label>
                          <p><input type='radio' name='wallet' value='LINK AJA' /><img style="border-radius: 0%" height="30" src="{{asset('uploads/image_wallet/link_aja_logo.png')}}"></img></p>
                          <p>01312040148091</p>
                        </div>
                    </div>
                   
                </div>



            <!--  <div class="form-group form-success">
              <label style="color: #009970">Wallet</label>
              <select name="wallet" id="wallet" class="form-control" required="" disabled="" >
               <option selected disabled> -- Pilih Wallet -- </option>
               <option >OVO</option>
               <option >Gopay</option>
             </select>
             <span class="form-bar"></span>
           </div> -->

           <div class="form-group form-success">
            <label style="color: #009970">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" disabled="" required="" class="form-control">
            <span class="form-bar"></span>
          </div>


          <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
          <button type="submit" name="" class="btn btn-primary float-right mr-2"  onclick="pembayaranForm()">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div> 




<div id="DeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Batalkan Pemesanan ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <p>Apakah anda yakin ingin membatalkan pemesanan ini ?</p>
                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Kembali</button>
                    <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Batalkan</button>
                </div>
            </div>
        </form>
    </div>
</div>



@section('js')
<script type="text/javascript">
      function deleteData(id) {
        var id = id;
        var url = '{{route("pelanggan_batalkan_pemesanan", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit() {
        $("#deleteForm").submit();
    }
</script>

<script type="text/javascript">
  

  function MetodePembayaranFunction(){
    var metode_pembayaran = document.getElementById("metode_pembayaran").value;
    var bukti_pembayaran = document.querySelector("#bukti_pembayaran");
    var bank = document.querySelector("#bank");
    var wallet = document.querySelector("#wallet");

    if(metode_pembayaran == "Transfer"){    
     bukti_pembayaran.removeAttribute("disabled");
     bank.removeAttribute("hidden");
     wallet.setAttribute("hidden", "");

   }else if(metode_pembayaran == "Wallet"){
    bukti_pembayaran.removeAttribute("disabled");
    wallet.removeAttribute("hidden");
    bank.setAttribute("hidden", "");

  }else if(metode_pembayaran == "Bayar Ditempat"){
    bukti_pembayaran.setAttribute("disabled", "");
    bank.setAttribute("hidden", "");
    wallet.setAttribute("hidden", "");
  }
}
</script>

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
        $('#id_pemesanan_show').val(data[10]);
        $('#nama_lapangan_show').val(data[3]);
        $('#pembayaranForm').attr('action','pelanggan_tambah_pembayaran/'+ data[10]);
        $('#PembayaranModal').modal('show');
      });
    });
  </script>


  @endsection
  @endsection