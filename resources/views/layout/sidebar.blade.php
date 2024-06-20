<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
        <a href="{{ url('dashboard') }}" class="brand-link">
            {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
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
                    @if (auth('akuns')->check())
                        <p>Role: {{ auth('akuns')->user()->role }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-header">Pengiriman</li> --}}
                <br>
                <li class="nav-item">
                    <a href="{{ url('pengiriman') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Data Pengiriman
                        </p>
                    </a>
                </li>

                {{-- @if (session('akun')[0]['role'] == 'admin') --}}
                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="{{ url('akun') }}" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Data Akun
                        </p>
                    </a>
                </li>
                <li class="nav-header">Mobil</li>
                <li class="nav-item">
                    <a href="{{ url('mobil') }}" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Data Mobil
                        </p>
                    </a>
                </li>
                <li class="nav-header">Sopir</li>
                <li class="nav-item">
                    <a href="{{ url('sopir') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Sopir
                        </p>
                    </a>
                </li>
                {{-- @endif --}}
                <li class="nav-header">History</li>
                <li class="nav-item">
                    <a href="{{ url('history') }}" class="nav-link">
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
