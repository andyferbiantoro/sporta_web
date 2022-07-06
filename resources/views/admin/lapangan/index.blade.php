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
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body text-left">
                                    <button type="button" class="btn btn-success " data-toggle="modal" data-target="#ModalAdd">
                                      Tambah Lapangan
                                    </button>

                                    
                                    <div class="text-center">
                                        ini lapangan
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

    @endsection