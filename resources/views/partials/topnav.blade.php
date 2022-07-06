        <div class="navbar-container d-flex content">
           
            <ul class="nav navbar-nav align-items-center ml-auto">
                
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
               
                
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{Auth::user()->email}}</span><span class="user-status"></span></div><span class="avatar"><img class="round" src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <div class="dropdown-divider"></div>
                        @if(Auth::user()->role == "admin")
                        <a class="dropdown-item" href="{{ route('logout-admin') }}"><i class="mr-50" data-feather="power"></i> Logout</a>
                        @endif

                        @if(Auth::user()->role == "pelanggan")
                        <a class="dropdown-item" href="{{ route('logout-pelanggan') }}"><i class="mr-50" data-feather="power"></i> Logout</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    