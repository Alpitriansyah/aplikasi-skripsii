@if (Str::length(Auth::guard('user')->user()) > 0)
    @if (Auth::guard('user')->user()->level = "admin")
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img width="50" src="{{asset('template/img/unmu_logo.png')}}" alt="">
            </div>
            <div class="sidebar-brand-text mx-3">Peminjaman Ruangan</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('DashboardAdmin')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('DashboardPeminjamanAdmin')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Peminjaman</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Master Admin</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu :</h6>
                    <a class="collapse-item" href="{{route('DashboardUser')}}">User</a>
                    <a class="collapse-item" href="{{route('DashboardRuangan')}}">Ruangan</a>
                    <a class="collapse-item" href="{{route('DashboardUser')}}">Laporan</a>
                </div>
            </div>
        </li>

        <!-- Nav Item --Profile -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('AdminProfile')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Profile</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('LogoutSession')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Logout</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        
    </ul>
    @endif
@endif
@if (Str::length(Auth::guard('mahasiswa')->user()) > 0)
    @if (Auth::guard('mahasiswa')->user()->level = "mhs")
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('DashboardMahasiswa')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('DashboardPeminjamanMahasiswa')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Peminjaman</span></a>
        </li>

        <!-- Nav Item --Profile -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('ProfileMahasiswa')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Profile</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('LogoutSession')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Logout</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        
    </ul>
    @endif
@endif
@if (Str::length(Auth::guard('dosen')->user()) > 0)
    @if (Auth::guard('dosen')->user()->level = "dosen")
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('DashboardDosen')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('DashboardPeminjamanDosen')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Peminjaman</span></a>
        </li>

        <!-- Nav Item --Profile -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('ProfileDosen')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Profile</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('LogoutSession')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Logout</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        
    </ul>
    @endif
@endif