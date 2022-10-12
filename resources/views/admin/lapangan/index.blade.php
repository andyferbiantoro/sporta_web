@extends('layouts.app')

@section('title')
Data Lapangan
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
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-body text-left">


                <div class="text-center">
                 <div class="text-left">
                  <button type="button" class="btn btn-success " data-toggle="modal" data-target="#ModalAdd">
                    Tambah Foto Lapangan 1
                  </button>
                
                </div> <br>

                <h2>Lapangan 1</h2><br><br>
                <div class="table-responsive">
                  <table id="dataTable"  class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto Lapangan</th>
                        <th>Aksi</th>

                      </tr>
                    </thead>

                    <tbody>
                      @php $no=1 @endphp
                      @foreach($lapangan1 as $lap1)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>
                          <img style="border-radius: 0%" height="70" id="ImageTampil" src="{{asset('uploads/image_lapangan/'.$lap1->image)}}"  data-toggle="modal" data-target="#myModal"></img>
                        </td>
                        <td>
                          <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$lap1->id}})" data-target="#DeleteModal">
                            <button class="btn btn-danger btn-sm" title="Hapus">Hapus</button>
                          </a>
                        </td>

                      </tr>
                      @endforeach
                    </tbody>
                  </table><br><hr>

                 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- //============================================================================ -->

        
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-body text-left">


                <div class="text-center">
                 <div class="text-left">
                  <button type="button" class="btn btn-success " data-toggle="modal" data-target="#ModalAdd2">
                    Tambah Foto Lapangan 2
                  </button>
                </div> <br>

                <h2>Lapangan 2</h2><br><br>
                <div class="table-responsive">
                  <table id="dataTable2"  class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto Lapangan</th>
                        <th>Aksi</th>

                      </tr>
                    </thead>

                    <tbody>
                      @php $no=1 @endphp
                      @foreach($lapangan2 as $lap2)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>
                          <img style="border-radius: 0%" height="70" id="ImageTampil2" src="{{asset('uploads/image_lapangan/'.$lap2->image)}}"  data-toggle="modal" data-target="#myModal2"></img>
                        </td>
                        <td>
                           <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$lap2->id}})" data-target="#DeleteModal">
                            <button class="btn btn-danger btn-sm" title="Hapus">Hapus</button>
                          </a>
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
        <!-- ======================================================================================= -->
     
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card">
            <div class="card-body text-left">


              <div class="text-center">
               <div class="text-left">
              <h1>Deskripsi Lapangan</h1>
              </div> <br>

             
              <div class="table-responsive">
               <table id="dataTable3"  class="table table-hover">
                <thead>
                  <tr>
                    <th>Lapangan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                    <th style="display: none;">hidden</th>

                  </tr>
                </thead>

                <tbody>
                  @php $no=1 @endphp
                  @foreach($deskripsi as $des)
                  <tr>
                    <td>{{$des->nama_lapangan}}</td>
                    <td>{{$des->deskripsi}}</td>
                    <td style="display: none;">{{$des->id}}</td>

                    <td>
                     <button class="btn btn-primary btn-sm edit" title="Edit">Edit</button>
                   </td>

                 </tr>
                 @endforeach
               </tbody>
             </table><br>
           </div>
         </div>
       </div>
     </div>
   </div>

        <!-- ============================================================================================ -->
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Foto Lapangan 1</h5>

          </div>
          <div class="modal-body">
           <form method="post" action="{{route('admin_foto_lapangan1_add')}}" enctype="multipart/form-data">


            {{csrf_field()}}

            <div class="form-group">
              <label for="image">Foto Lapangan</label>
              <input type="file" class="form-control" id="image" name="image" multiple="true" required=""></input>
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



      <!-- Modal Tambah  -->
<div class="modal fade" id="ModalAdd2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Foto Lapangan 2</h5>

      </div>
      <div class="modal-body">
       <form method="post" action="{{route('admin_foto_lapangan2_add')}}" enctype="multipart/form-data">


        {{csrf_field()}}

        <div class="form-group">
          <label for="image">Foto Lapangan</label>
          <input type="file" class="form-control" id="image" name="image" multiple="true" required=""></input>
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

       <!-- Creates the bootstrap modal where the image will appear -->
      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body text-center">
              <img src="" id="img02" style="width: 450px; height: auto;" >
            </div>
          </div>
        </div>
      </div>




      <!-- Modal konfirmasi Hapus -->
      <div id="DeleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog ">
          <!-- Modal content-->
          <form action="" id="deleteForm" method="post">

            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Foto Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <p>Apakah anda yakin ingin menghapus foto lapangan ini ?</p>
                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
                <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
              </div>
            </div>
          </form>
        </div>
      </div> 






      <!-- Modal Update -->
        <div id="updateInformasi" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
           <!--Modal content-->
           
           <form action="" id="updateInformasiform" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Anda yakin ingin memperbarui Data Menu ini ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('POST') }}

               <div class="row"> 
                      <div class="col-lg-12">

                      
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" class="form-control" id="deskripsi_update" name="deskripsi"></textarea>
                      </div>

                    </div>

                  </div> 
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
                <button type="submit"  class="btn btn-primary float-right mr-2" >Perbarui</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      </div>

      @endsection

      @section('js')
      <script type="text/javascript">
        function deleteData(id) {
          var id = id;
          var url = '{{route("admin_foto_lapangan_delete", ":id") }}';
          url = url.replace(':id', id);
          $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
          $("#deleteForm").submit();
        }
      </script>


      <script>
        $(document).ready(function() {
          var table = $('#dataTable3').DataTable();
          table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
              $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);

            $('#deskripsi_update').val(data[1]);
            $('#updateInformasiform').attr('action','admin_deskripsi_lapangan_update/'+ data[2]);
            $('#updateInformasi').modal('show');
          });
        });
      </script>


      @endsection