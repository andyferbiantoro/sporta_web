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
                             <h1>Lapangan 1</h1>
                              <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                  <div class="text-center">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner">
                                        @foreach($lapangan1 as $image)
                                        @if($image->indeks == 1)
                                        <div class="carousel-item active">
                                          @else    
                                          <div class="carousel-item">
                                            @endif    
                                            <img class="d-block w-100" style="height: 300px;"  src="{{asset('uploads/image_lapangan/'.$image->image)}}" alt="First slide">
                                            <div class="carousel-caption d-none d-md-block">
                                            <h5>erwerwer</h5>
                                              <p>{{$image->deskripsi}}</p>
                                            </div>
                                          </div>
                                          <br>
                                          @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                    </div> 
                                  </div>
                                </div>
                                <div class="col-lg-2"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        

                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="card">
                            <div class="card-body text-left">
                             <h1>Lapangan 2</h1>
                              <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                  <div class="text-center">
                                    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                                      <div class="carousel-inner">
                                        @foreach($lapangan2 as $image)
                                        @if($image->indeks == 1)
                                        <div class="carousel-item active">
                                          @else    
                                          <div class="carousel-item">
                                            @endif    
                                            <img class="d-block w-100" style="height: 300px;"  src="{{asset('uploads/image_lapangan/'.$image->image)}}" alt="First slide">
                                            <div class="carousel-caption d-none d-md-block">
                                              <!-- <h5>erwerwer</h5> -->
                                              <p>{{$image->deskripsi}}</p>
                                            </div>
                                          </div>
                                          <br>
                                          @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-2"></div>
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