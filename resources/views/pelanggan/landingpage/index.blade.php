<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Sporta Futsal</title>
    <link rel="apple-touch-icon" href="../public/img/sporta_logo.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="../public/img/sporta_logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-invoice-list.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="html/ltr/horizontal-menu-template/index.html"><span class="brand-logo">
                </span>
                <img src="../public/img/sporta_logo.jpg"  
                height="40px" 
                ><br>
                <h2 class="brand-text" style="color: black">Sporta Futsal</h2>

            </a></li>
        </ul>
    </div>
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>

        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">

            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>



            @guest
            <a class="btn btn-primary ml-50" href="{{ route('login') }}">
                <i class="mr-50" data-feather="log-in"></i> Login
            </a>
            @endguest
        </ul>
    </div>
</nav>


<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="html/ltr/horizontal-menu-template/index.html"><span class="brand-logo">
                </span>
                <img src="../public/img/sporta_logo.jpg"  
                height="40px" 
                ><br>
                <h2 class="brand-text" style="color: black">Sporta Futsal</h2>
            </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <!-- include includes/mixins-->
        <div class="text-center">

           <h2 class="brand-text mb-0"><b>Selamat Datang di Sporta Futsal</b></h2>
       </div>
   </div>
</div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->

            <section>
                <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Lapangan 1</h4>
                            </div>
                            <div class="card-body text-center">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                       @foreach($lapangan1 as $image)
                                       @if($image->indeks == 1)
                                       <div class="carousel-item active">
                                        @else    
                                        <div class="carousel-item">
                                            @endif    
                                            <img class="img-fluid" style="height: 400px;" src="{{asset('uploads/image_lapangan/'.$image->image)}}" />
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Lapangan 2</h4>
                            </div>
                            <div class="card-body text-center">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                       @foreach($lapangan2 as $image)
                                       @if($image->indeks == 1)
                                       <div class="carousel-item active">
                                        @else    
                                        <div class="carousel-item">
                                            @endif    
                                            <img class="img-fluid" style="height: 400px;" src="{{asset('uploads/image_lapangan/'.$image->image)}}" />
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </section>
            <section id="basic-carousel">
                <div class="row">

                </div>
                <div class="row">
                  


                <div class="col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jadwal Lapangan 1</h4>
                        </div>
                        <div class="card-body">
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

                 <div class="col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jadwal Lapangan 2</h4>
                        </div>
                        <div class="card-body">
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
                                        @foreach($jadwal_lap2 as $lap1)
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
    </section>

    <section>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card-header">
                    <h4 class="card-title">Pengumuman</h4>
                </div>
                <div class="card-body">
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
</section>

    <!-- Dashboard Analytics end -->

</div>
</div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="app-assets/vendors/js/extensions/moment.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="app-assets/js/scripts/pages/dashboard-analytics.js"></script>
<script src="app-assets/js/scripts/pages/app-invoice-list.js"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
<!-- END: Body-->

</html>