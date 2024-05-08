{{-- @if (auth()->check())
    @if (auth()->user()->role == 'admin')

    @endif
    @if (auth()->user()->role == 'peserta')
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('dashboard/dist/img/LOGO_SIM-removebg-preview.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bold">SIM-BBU</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg') }}"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard Pegawai</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard Pengajar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Widgets
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Layout Options
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Top Navigation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Top Navigation + Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/boxed.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Boxed</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Sidebar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Sidebar <small>+ Custom Area</small></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Navbar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-footer.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fixed Footer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Collapsed Sidebar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">DIKLAT</li>
                        <li class="nav-item">
                            <a href="{{ route('diklat_gmdss.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    DIKLAT GMDSS
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    DIKLAT REOR
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('diklat_soum.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SOU-M</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('diklat_sour.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SOU-R</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('diklat_sre1.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SRE-I</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="{{ route('diklat_sre2.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SRE-II</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    DIKLAT COP
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('diklat_mc.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>MC</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('diklat_mfa.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>MFA</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('diklat_sso.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SSO</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('diklat_sat.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SAT</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('diklat_satsdsd.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SATSDSD</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">PEGAWAI</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Keuangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Nilai Ujian Lokal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Peserta</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Absensi</p>
                            </a>
                        </li>
                        <li class="nav-header">INVENTORY</li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Sertifikat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Sarana</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Prasarana</p>
                            </a>
                        </li>
                        <li class="nav-header">ADMINISTRATOR</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Data Pengguna</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pegawai.index') }}" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Data Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-header">AKUN</li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                <p class="text-danger">Keluar</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    @endif
@endif --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dashboard/dist/img/LOGO SIM.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">SIM-BBU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Pengguna</a>
                {{-- <a href="#" class="d-block">{{ Auth::user()->username }}</a> --}}
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-header">PENDAFTARAN</li>
                <li class="nav-item">
                    <a href="{{ route('DaftarGMDSS.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            DIKLAT GMDSS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('DaftarREOR.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            DIKLAT REOR
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('DaftarCOP.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            DIKLAT COP
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('DaftarMCU.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            SERTIFIKAT MCU
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('PerpanjangGMDSS.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            PERPANJANGAN GMDSS
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('PerpanjangREOR.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            PERPANJANGAN REOR
                        </p>
                    </a>
                </li>
                <li class="nav-header">AKUN</li>
                <li class="nav-item">
                    <a href="" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text-danger">Keluar</p>
                    </a>
                    <form id="logout-form" action="" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
