<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                                
                            </span>
                            <img src="../public/img/sporta_logo.jpg"  
                                 height="40px" 
                                 ><br>
                        <h2 class="brand-text" style="color: black">Sporta Futsal</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"><br>
                
            @if(Auth::user()->role == "admin")

                <li class="{{(request()->is('admin')) ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('admin')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class="{{(request()->is('admin_lapangan')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('admin_lapangan')}}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="sport">Data Lapangan</span></a>
                </li>
                <li class="{{(request()->is('admin_pesan_lapangan')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('admin_pesan_lapangan')}}"><i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="cart">Pesan Lapangan</span></a>
                </li>
                <li class="{{(request()->is('admin_transaksi_berjalan')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('admin_transaksi_berjalan')}}"><i data-feather="check-square"></i><span class="menu-title text-truncate" data-i18n="Calendar">Transaksi Berjalan</span></a>
                </li>
                <li class="{{(request()->is('admin_laporan')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('admin_laporan')}}"><i data-feather="clipboard"></i><span class="menu-title text-truncate" data-i18n="file">Laporan</span></a>
                </li>
                <li class="{{(request()->is('admin_data_pelanggan')) ? 'active' : ''}} {{(request()->is('admin_detail_pelanggan')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('admin_data_pelanggan')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="file">Data Pelanggan</span></a>
                </li>
                <li class="{{(request()->is('admin_data_member')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('admin_data_member')}}"><i data-feather="user-check"></i><span class="menu-title text-truncate" data-i18n="file">Data Member</span></a>
                </li>
            @endif   

            @if(Auth::user()->role == "pelanggan")

                <li class="{{(request()->is('pelanggan_dashboard')) ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('pelanggan_dashboard')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
                </li>

                <li class="{{(request()->is('pelanggan_lapangan')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('pelanggan_lapangan')}}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Chat">Data Lapangan</span></a>
                </li>
                <li class="{{(request()->is('pelanggan_pesan_lapangan')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('pelanggan_pesan_lapangan')}}"><i data-feather="check-square"></i><span class="menu-title text-truncate" data-i18n="cart">Pesan Lapangan</span></a>
                </li>

                <li class="{{(request()->is('pelanggan_pemesanan_pending')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('pelanggan_pemesanan_pending')}}"><i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="Calendar">Pemesanan</span></a>
                </li>

                <li class="{{(request()->is('pelanggan_pemesanan_dibayar')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('pelanggan_pemesanan_dibayar')}}"><i data-feather="dollar-sign"></i><span class="menu-title text-truncate" data-i18n="Calendar">Pembayaran</span></a>
                </li>

                <li class="{{(request()->is('pelanggan_riwayat_transaksi')) ? 'active' : ''}} nav-item"><a class="d-flex align-items-center" href="{{route('pelanggan_riwayat_transaksi')}}"><i data-feather="book"></i><span class="menu-title text-truncate" data-i18n="Calendar">Riwayat Transaksi</span></a>
                </li>

                

            @endif

            </ul>
        </div>
    </div>