<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        {{-- <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('beranda') }}" class="logo"><img src="{{ asset('assets/img/logo.png') }}" alt=""><span
                class="text-primary">DIES NATALIS
                UNTAN</span></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ route('beranda') }}">Beranda</a></li>
                <li class="dropdown" style="cursor: pointer;"><a
                        class="nav-link {{ request()->is('agenda*') || request()->is('livestream*') ? 'active' : '' }}"><span>Agenda</span>
                        <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="{{ request()->is('agenda*') ? 'active' : '' }}"
                                href="{{ route('agenda') }}">Timeline Acara</a></li>
                        <li><a class="{{ request()->is('livestream*') ? 'active' : '' }}"
                                href="{{ route('livestream') }}">Livestream</a></li>
                    </ul>
                </li>

                <li class="dropdown" style="cursor: pointer;"><a
                        class="nav-link {{ request()->is('sambutan*') ? 'active' : '' }}"><span>Kata
                            Sambutan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="{{ request()->is('sambutan/rektor*') ? 'active' : '' }}"
                                href="{{ route('sambutan_rektor') }}">Sambutan Rektor</a></li>
                        <li><a class="{{ request()->is('sambutan/ketua-panitia*') ? 'active' : '' }}"
                                href="{{ route('sambutan_ketua_panitia') }}">Sambutan Ketua Panitia</a></li>
                    </ul>
                </li>
                <li><a class="nav-link {{ request()->is('logo*') ? 'active' : '' }}"
                        href="{{ route('logo') }}">Logo</a></li>
                <li><a class="nav-link {{ request()->is('berita*') ? 'active' : '' }}"
                        href="{{ route('berita') }}">Berita</a></li>
                <li><a class="nav-link {{ request()->is('galeri*') ? 'active' : '' }}"
                        href="{{ route('galeri') }}">Galeri</a></li>
                <li><a class="nav-link {{ request()->is('sertifikat*') ? 'active' : '' }}"
                        href="{{ route('sertifikat') }}">Sertifikat</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
