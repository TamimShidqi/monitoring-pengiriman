<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
        <a href="{{ url('dashboard') }}" class="brand-link">
            {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <img style="width: 40px" src="logo.png" alt="">
            <span class="brand-text font-weight-light">PT. Dul Jaya Sempurna</span>
        </a>
    </center>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image pull-left mt-2">
                <img src="{{ asset('/AdminLTE/dist/img/default.jpg') }}" class="img-circle elevation-2" width='15px'
                    height='40px' alt="User Image"></a>
            </div>
            <div class="pull-left info mb-3">
                <div class="nama">
                    <a href="#">{{ Auth::user()->sopir->nama }}</a>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }} ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-header">Pengiriman</li> --}}
                <br>
                <li class="nav-item">
                    <a href="{{ url('pengiriman') }}" class="nav-link {{ (Request::is('pengiriman') ? 'active' : '') }} ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Data Pengiriman
                        </p>
                    </a>
                </li>

                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="{{ url('akun') }}" class="nav-link {{ (Request::is('akun') ? 'active' : '') }} ">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Data Akun
                        </p>
                    </a>
                </li>
                @if(auth()->user()->role == 'admin')
                <li class="nav-header">Mobil</li>
                <li class="nav-item">
                    <a href="{{ url('mobil') }}" class="nav-link {{ (Request::is('mobil') ? 'active' : '') }} ">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Data Mobil
                        </p>
                    </a>
                </li>
                <li class="nav-header">Jenis</li>
                <li class="nav-item">
                    <a href="{{ url('jenis') }}" class="nav-link {{ (Request::is('jenis') ? 'active' : '') }} ">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Jenis Minyak
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-header">Sopir</li>
                <li class="nav-item">
                    <a href="{{ url('sopir') }}" class="nav-link {{ (Request::is('sopir') ? 'active' : '') }} ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Sopir
                        </p>
                    </a>
                </li>
                <li class="nav-header">History</li>
                <li class="nav-item">
                    <a href="{{ url('history') }}" class="nav-link {{ (Request::is('history') ? 'active' : '') }} ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            History
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
