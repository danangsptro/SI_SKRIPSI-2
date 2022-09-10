<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="{{ route('dashboard') }}">
        <img src="{{ asset('assets/img/mandiri.png') }}" style="border-radius:1rem" width="70%" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Maplop
    </div>


    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('maplop') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Maplop</span></a>
    </li>

    @if (Auth::user()->user_role === 'admin' || Auth::user()->user_role === 'pimpinan')
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('status') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Status</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('rak') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Rak</span></a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('jenisData') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Jenis Data</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endif

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan Data Maplop
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan</span></a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('maplop-search') }}">
            <i class="fas fa-fw fa-search"></i>
            <span>Cari Data Maplop</span></a>
    </li>
    <hr class="sidebar-divider"> --}}
    <hr class="sidebar-divider">


    @if (Auth::user()->user_role === 'admin' || Auth::user()->user_role === 'pimpinan')
        <!-- Heading -->
        <div class="sidebar-heading">
            Register User
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('register-user') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Register</span></a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
