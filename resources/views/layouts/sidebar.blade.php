@if (auth()->check())
    @if (auth()->user()->jenis_akun == 'super_admin')
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
                        <a href="#" class="d-block">{{ Auth::user()->nama_lengkap }}</a>
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
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    DIKLAT GMDSS
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('DaftarREOR.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    DIKLAT REOR
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('DaftarCOP.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    DIKLAT COP
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('DaftarMCU.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file-medical"></i>
                                <p>
                                    SERTIFIKAT MCU
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('PerpanjangGMDSS.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>
                                    PERPANJANGAN GMDSS
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('PerpanjangREOR.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>
                                    PERPANJANGAN REOR
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">KEGIATAN</li>
                        <li class="nav-item">
                            <a href="{{ route('Absensi.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>
                                    DATA ABSENSI
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Jadwal.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    DATA JADWAL
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('MataPelajaran.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>
                                    DATA MATA PELAJARAN
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('NilaiUjianLokal.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    DATA NILAI UJIAN LOKAL
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('PesertaUjian.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tablet"></i>
                                <p>
                                    DATA PESERTA UJIAN
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">ADMINISTRASI</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-file-contract"></i>
                                <p>
                                    DATA KEUANGAN
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Keuangan.index') }}" class="nav-link">
                                        <i class="nav-icon fa fa-file-invoice-dollar"></i>
                                        <p>DATA KWITANSI</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Keuangan.tagihan') }}" class="nav-link">
                                        <i class="nav-icon fa fa-file-invoice"></i>
                                        <p>DATA INVOICE</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    DATA PENGGUNA
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Inventory.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-archive"></i>
                                <p>
                                    INVENTORY SERTIFIKAT
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('SAPRAS.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-toolbox"></i>
                                <p>
                                    SARANA & PRASARANA
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Pegawai.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    PEGAWAI
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Pengajar.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                    PENGAJAR
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">AKUN</li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                <p class="text-danger">Keluar</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    @if (auth()->user()->jenis_akun == 'siswa')
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
                        <a href="#" class="d-block">{{ Auth::user()->nama_lengkap }}</a>
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
                        <li class="nav-header">PESERTA</li>
                        <li class="nav-item">
                            <a href="{{ route('Dashboard.Siswa') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    DATA SISWA
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Peserta.Absensi') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    ABSENSI SISWA
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Peserta.Nilai') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    DATA NILAI
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Peserta.Keuangan') }}" class="nav-link">
                                <i class="nav-icon fa fa-file-contract"></i>
                                <p>
                                    DATA KEUANGAN
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">AKUN</li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                <p class="text-danger">Keluar</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    @if (auth()->user()->jenis_akun == 'pengajar')
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
                        <a href="#" class="d-block">{{ Auth::user()->nama_lengkap }}</a>
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
                        <li class="nav-header">PENGAJAR</li>
                        <li class="nav-item">
                            <a href="{{ route('Dashboard.Pengajar') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    DATA PENGAJAR
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('NilaiUjianLokal.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    DATA NILAI UJIAN LOKAL
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Absensi.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    DATA ABSENSI
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">AKUN</li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                <p class="text-danger">Keluar</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    @if (auth()->user()->jenis_akun == 'pendaftar')
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
                        <a href="#" class="d-block">{{ Auth::user()->nama_lengkap }}</a>
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
                        <li class="nav-header">AKUN</li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                <p class="text-danger">Keluar</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
@endif
