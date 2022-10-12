@extends('layouts.app')

@section('title')
Dashboard Pelanggan
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
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body text-left">
                               <div class="text-left">
                                <br>
                                 <h1>GALERI</h1><br>
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                  <div class="carousel-inner">
                                    @foreach($konten as $image)
                                    @if($image->indeks_konten == 1)
                                    <div class="carousel-item active">
                                      @else    
                                      <div class="carousel-item">
                                        @endif    
                                        <img class="d-block w-100" style="height: 300px;"  src="{{asset('uploads/foto_konten/'.$image->foto_konten)}}" alt="First slide">

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
          </div>


          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body text-left">
                  <h1>MEMBER</h1><br>


                  <div class="text-left">
                      <table class="table table-hover">
                          <tr>
                              <th>Logo</th>
                              <th>Member</th>
                          </tr>

                          @foreach($member as $data)
                          <tr>
                              <td><img style="border-radius: 0%" height="30" src="{{asset('uploads/logo_tim/'.$data->logo_tim)}}"></img></td>
                              <td>{{$data->nama_tim}}</td>
                          </tr>
                          @endforeach
                      </table>
                  </div>
              </div>
          </div>
      </div>


      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body text-left">

                <div class="text-left">
                   <br>
                    <h1>PENGUMUMAN</h1><br>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    @foreach($pengumuman as $image)
                    @if($image->indeks_pengumuman == 1)
                    <div class="carousel-item active">
                      @else    
                      <div class="carousel-item">
                        @endif    
                        <img class="d-block w-100" style="height: 300px;"  src="{{asset('uploads/foto_pengumuman/'.$image->foto_pengumuman)}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>erwerwer</h5> -->
                            <p>{{$image->isi_pengumuman}}</p>
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