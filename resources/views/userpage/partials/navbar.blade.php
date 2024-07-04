    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
                <i class="flaticon-043-teddy-bear"></i>
                <span class="text-primary">KidKinder</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="{{ url('/') }}"
                        class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    <a href="#berita"
                        class="nav-item nav-link {{ Request::is('bacaberita/*') ? 'active' : '' }}">Berita</a>
                    <a href="{{ url('dashboard/cekimunisasi') }}"
                        class="nav-item nav-link {{ Request::is('dashboard/cekimunisasi') ? 'active' : '' }}">Cek
                        Imunisasi</a>
                    <a href="{{ url('dashboard/cekanak') }}"
                        class="nav-item nav-link {{ Request::is('dashboard/cekanak', 'dashboard/cekberatbadan/*') ? 'active' : '' }}">Data
                        Anak</a>
                    <a href="gallery.html" class="nav-item nav-link">Gallery</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>

                <a href="">Login</a>

                @if (Auth::check())
                    <a href="/dashboardAdmin" class="btn btn-primary px-4">Dashboard</a>
                @else
                    <a href="/login" class="btn btn-primary px-4">Login</a>
                @endif

            </div>
        </nav>
    </div>
    <!-- Navbar End -->
