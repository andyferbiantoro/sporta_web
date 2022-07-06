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
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php $no=1 @endphp
                                                @foreach($pemesanan as $data)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{date("j F Y", strtotime($data->tanggal))}}</td>
                                                    <td>{{date("H:i ", strtotime($data->jam))}} WIB</td>
                                                    <td>{{$data->nama_tim}}</td>
                                                    <td> 
                                                        @if($data->status == '2')
                                                        <a href="#" data-toggle="modal" onclick="VerifikasiData({{$data->id}})" data-target="#VerifikasiModal"> <button class=" btn-danger btn-sm " title="Verifikasi">Verifikasi</button></a>
                                                        @endif
                                                        @if($data->status == '3')
                                                        <button class=" btn-success btn-sm ">Sudah Diverifikasi</button>

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
                    <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Verifikasi</button>
                </div>
            </div>
        </form>
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

@endsection
