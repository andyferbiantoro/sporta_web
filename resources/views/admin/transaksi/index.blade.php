@extends('layouts.app')

@section('title')
Data Transaksi Berjalan
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

                                <div class="text-center">
                                    <h2>Transaksi Berjalan</h2><br><br>
                                    <div class="table-responsive">
                                        <table id="dataTable"  class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>jam</th>
                                                    <th>Nama Tim</th>
                                                    <th>Nominal Pembayaran</th>
                                                    <th>Nominal DP</th>
                                                    <th>Bukti Pembayaran</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php $no=1 @endphp
                                                @foreach($pemesanan as $data)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                                                    <td>{{$data->jam}}</td>
                                                    <td>{{$data->nama_tim}}</td>
                                                    <td>Rp. <?=number_format($data->nominal_pembayaran, 0, ".", ".")?>,00</td>
                                                    @if($data->nominal_dp != null)
                                                    <td>Rp. <?=number_format($data->nominal_dp, 0, ".", ".")?>,00</td>
                                                    @endif

                                                    @if($data->nominal_dp == null)
                                                    <td>Pembayaaran Penuh</td>
                                                    @endif

                                                    @if($data->bukti_pembayaran == null)
                                                    <td>Pembayaran Dilakukan Ditempat</td>
                                                    @endif 

                                                    @if($data->bukti_pembayaran != null)   
                                                    <td>
                                                        <img style="border-radius: 0%" height="70" id="ImageTampil" src="{{asset('uploads/bukti_pembayaran/'.$data->bukti_pembayaran)}}"  data-toggle="modal" data-target="#myModal"></img>
                                                    </td>
                                                    @endif
                                                    <td> 
                                                        @if($data->status == '2')
                                                            <a href="#" data-toggle="modal" onclick="VerifikasiData({{$data->id}})" data-target="#VerifikasiModal"> <button class=" btn-warning btn-sm " title="Verifikasi">Verifikasi</button></a><br><br>

                                                            <a href="#" data-toggle="modal" onclick="CancelData({{$data->id}})" data-target="#CancelModal">
                                                             <button class="btn btn-danger btn-sm"  title="Cancel">Cancel</button>
                                                            </a>
                                                        @endif
                                                        @if($data->status == '3')
                                                        <button class=" btn-success btn-sm ">Sudah Diverifikasi</button>
                                                        @endif

                                                        @if($data->status == '4')
                                                        <button class=" btn-danger btn-sm ">Ditolak</button>
                                                        @endif

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


<div id="VerifikasiModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="verifikasiForm" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus data ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <p>Verifikasi Pemesanan ini ?</p>
                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
                    <button type="submit" name="" class="btn btn-warning float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Verifikasi</button>
                </div>
            </div>
        </form>
    </div>
</div>





<!-- Modal konfirmasi Cancel -->
<div id="CancelModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <form action="" id="CancelForm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cancel Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      {{ csrf_field() }}
      {{ method_field('POST') }}
      <p>Apakah anda yakin ingin cancel pembayaran ini ?</p>
      <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
      <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmitCancel()">Cancel</button>
  </div>
</div>
</form>
</div>
</div> 





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

@section('js')

<script type="text/javascript">
  function VerifikasiData(id) {
    var id = id;
    var url = '{{route("admin_verifikasi_pemesanan", ":id") }}';
    url = url.replace(':id', id);
    $("#verifikasiForm").attr('action', url);
}

function formSubmit() {
    $("#verifikasiForm").submit();
}
</script>


<script type="text/javascript">
  function CancelData(id) {
    var id = id;
    var url = '{{route("admin_cancel_pemesanan", ":id") }}';
    url = url.replace(':id', id);
    $("#CancelForm").attr('action', url);
  }

  function formSubmitCancel() {
    $("#CancelForm").submit();
  }
</script>

@endsection
