<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">MAN 1<span> PPDB</span></a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item @yield('dashboard')">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('web_ppdb') }}" class="nav-link">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="link-title">Visit Website</span>
                </a>
            </li>
            <li class="nav-item nav-category">PPDB</li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#ppdb" role="button" aria-expanded="false" aria-controls="forms">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Data Calon Peserta</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                @php
                    $total['calon_regular'] = \App\Models\CalonPeserta::where('jalur', 'Regular')->where('status','Calon Pendaftar')->count();
                    $total['calon_undangan'] = \App\Models\CalonPeserta::where('jalur', 'Undangan')->where('status','Calon Pendaftar')->count();
                @endphp
                <div class="collapse" id="ppdb">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('calon_regular') }}" class="nav-link @yield('regular')">Reguler ({{ $total['calon_regular'] }})</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('calon_undangan') }}" class="nav-link @yield('undangan')">Undangan ({{ $total['calon_undangan'] }})</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @yield('peserta_tes')">
                <a href="" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Data Peserta Tes</span>
                </a>
            </li>
            <li class="nav-item @yield('peserta_lolos')">
                <a href="{{ route('peserta_lolos') }}" class="nav-link">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">Data Peserta Lolos</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#laporan" role="button" aria-expanded="false" aria-controls="forms">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Laporan</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="laporan">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('cetak_surat') }}" class="nav-link @yield('cetak_surat')">Cetak Surat Pernyataan</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Account</li>
            <li class="nav-item @yield('akun_pegawai')">
                <a href="{{ route('akun_pegawai') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Akun pegawai</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">My Account</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
