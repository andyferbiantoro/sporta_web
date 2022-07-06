@extends('layouts.app')

@section('title')
Dashboard Admin
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
                            <div class="card card-congratulations">
                                <div class="card-body text-center">
                                    <img src="app-assets/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left" />
                                    <img src="app-assets/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right" />
                                    <div class="avatar avatar-xl bg-primary shadow">
                                        <div class="avatar-content">
                                            <i data-feather="award" class="font-large-1"></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-1 text-white">Congratulations John,</h1>
                                        <p class="card-text m-auto w-75">
                                            You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Greetings Card ends -->

                        <!-- Subscribers Chart Card starts -->
                       
                        <!-- Orders Chart Card ends -->
                    </div>

                    

                    

                    <!-- List DataTable -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card invoice-list-wrapper">
                                <div class="card-datatable table-responsive">
                                    <table class="table table-stripped" id="dataTable" style="padding-right: 2px;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th><i data-feather="trending-up"></i></th>
                                                <th>Client</th>
                                                <th>Total</th>
                                                <th class="text-truncate">Issued Date</th>
                                                <th>Balance</th>
                                                <th>Invoice Status</th>
                                                <th class="cell-fit">Actions</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ List DataTable -->
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>

    @endsection