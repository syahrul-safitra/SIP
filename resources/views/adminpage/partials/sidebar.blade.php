<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('admin/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('dashboardAdmin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>

        <a class="nav-link" href="{{ url('dashboard/ibu') }}">
            <i class="fas fa-female"></i>
            <span>Data Ibu</span>
        </a>

        <a class="nav-link" href="{{ url('dashboard/anak') }}">
            <i class="fas fa-solid fa-child"></i>
            <span>Data Anak</span></a>

        <a class="nav-link" href="{{ url('dashboard/imunisasi') }}">
            <i class="fas fa-syringe"></i>
            <span>Data Imunisasi</span></a>
    </li>
</ul>
