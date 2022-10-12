@extends('layouts.app')

@section('title')
Kelola Pengumuman
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
                                 <a href="{{route('admin')}}"><button type="button" class="btn btn-danger ">
                                  Kembali
                                 </button></a>
                                 <button type="button" class="btn btn-success " data-toggle="modal" data-target="#ModalAdd">
                                  Tambah Pengumuman
                                </button><br><br>

                                <div class="text-center">
                                 <div class="table-responsive">
                                  <table id="dataTable"  class="table table-hover">
                                    <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Foto Pengumuman</th>
                                          <th>Isi Pengumuman</th>
                                          <th>Aksi</th>
                                          <th style="display: none;">hidden</th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      @php $no=1 @endphp
                                      @foreach($pengumuman as $data)
                                      <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->isi_pengumuman}}</td>
                                        <td>
                                          <img style="border-radius: 0%" height="70" id="ImageTampil" src="{{asset('uploads/foto_pengumuman/'.$data->foto_pengumuman)}}"  data-toggle="modal" data-target="#myModal"></img>
                                        </td>
                                        <td>
                                           <button class="btn btn-success btn-sm edit" title="Edit">Edit</button>

                                         <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal"><button class="btn btn-danger btn-sm" title="Hapus">Hapus</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Member</h5>

              </div>
              <div class="modal-body">
               <form method="post" action="{{route('admin_pengumuman_add')}}" enctype="multipart/form-data">


                {{csrf_field()}}

                <div class="form-group">
                  <label for="isi_pengumuman">Isi Pengumuan</label>
                  <input type="text" class="form-control" id="isi_pengumuman" name="isi_pengumuman" required="" ></input>
                </div>

                <div class="form-group">
                  <label for="foto_pengumuman">Foto Pengumuan</label>
                  <input type="file" class="form-control" id="foto_pengumuman" name="foto_pengumuman" required="" ></input>
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






      <!-- Modal Update -->
      <div id="updateInformasi" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!--Modal content-->
         <form action="" id="updateInformasiform" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Anda yakin ingin memperbarui Data ini ?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{ csrf_field() }}
              {{ method_field('POST') }}

              <div class="form-group" style="margin-left:20px">
               <div class="form-group">
                <label for="isi_pengumuman">Isi Pengumuman</label>
                <input type="text" class="form-control" id="isi_pengumuman_update" name="isi_pengumuman" required="" ></input>
              </div>

               <div class="form-group">
                <label for="foto_pengumuman">Foto</label>
                <input type="file" class="form-control" id="foto_pengumuman_update" name="foto_pengumuman" required="" ></input>
              </div>
            </div>

            </div> 
            <div class="modal-footer">
              <button type="submit"  class="btn btn-primary float-right mr-2" >Perbarui</button>
              <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>




     <!-- Modal konfirmasi Hapus -->
    <div id="DeleteModal" class="modal fade" role="dialog">
      <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Hapus pengumuman</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <p>Apakah anda yakin ingin menghapus data ini ?</p>
              <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
              <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
            </div>
          </div>
        </form>
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

  @section('js')

  <script type="text/javascript">
        function deleteData(id) {
          var id = id;
          var url = '{{route("admin_pengumuman_delete", ":id") }}';
          url = url.replace(':id', id);
          $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
          $("#deleteForm").submit();
        }
      </script>

      <script>
        $(document).ready(function() {
          var table = $('#dataTable').DataTable();
          table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
              $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);
            $('#isi_pengumuman_update').val(data[1]);
            $('#updateInformasiform').attr('action','admin_pengumuman_update/'+ data[4]);
            $('#updateInformasi').modal('show');
          });
        });
      </script>

  @endsection
