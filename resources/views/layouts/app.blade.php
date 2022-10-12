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
    <title> @yield('title') &mdash; {{ env('APP_NAME') }}</title>
    
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
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
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

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        @include('partials.topnav')
    </nav>


    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('partials.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
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
    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
        <script src="app-assets/vendors/js/extensions/moment.min.js"></script> -->
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

        <script src="app-assets/js/scripts/tables/table-datatables-basic.js"></script>

        

        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });

        </script>

        <script>
            $(document).ready(function() {
                $('#dataTable2').DataTable();
            });

        </script>

        <script>
            $(document).ready(function() {
                $('#dataTable3').DataTable();
            });

        </script>

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

        <script type="text/javascript">
            $(document).ready(function() {

                var table = $('#dataTable').DataTable();

                var modal = document.getElementById("myModal");

                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            table.on('click', '#ImageTampil', function (){

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                modalImg.src = this.src;
                captionText.innerHTML = data[3];


                $('#myModal').modal('show');
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#dataTable2').DataTable();

            var modal = document.getElementById("myModal2");

            var modalImg = document.getElementById("img02");
            var captionText = document.getElementById("caption");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            table.on('click', '#ImageTampil2', function (){

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                modalImg.src = this.src;
                captionText.innerHTML = data[3];


                $('#myModal2').modal('show');
            });

        });
    </script>

    @yield('js')
</body>
<!-- END: Body-->

</html>