<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">LaundryCuy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image"> --}}
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                    <li class="nav-header">MASTER</li>
                @endif
                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Pengguna
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customers.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Pelanggan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('outlets.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-map-pin"></i>
                            <p>
                                Data Outlet
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('packages.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                Data Paket
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transactions.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>
                                Data Transaksi
                            </p>
                        </a>
                    </li>
                @elseif(Auth::user()->role == 'kasir')
                    <li class="nav-item">
                        <a href="{{ route('customers.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Pelanggan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transactions.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>
                                Data Transaksi
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-header">LAPORAN</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Lihat Laporan
                        </p>
                    </a>
                </li>
                <li class="nav-header">PENGATURAN</li>
                <li class="nav-item">
                    <a href="iframe.html" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Keluar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
