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
            <li class="nav-item @yield('tes')">
                <a href="{{ route('input_hasil_tes') }}" class="nav-link">
                    <i class="link-icon" data-feather="database"></i>
                    <span class="link-title">Input Hasil Tes</span>
                </a>
            </li>
            <li class="nav-item @yield('berkas')">
                <a href="{{ route('cek_berkas_undangan') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Cek Berkas Undangan</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#seleksi" role="button" aria-expanded="false" aria-controls="forms">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Hasil Seleksi</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                @php
                    $total['lulus'] = \App\Models\CalonPeserta::where('status','Lulus')->count();
                    $total['tidak_lulus'] = \App\Models\CalonPeserta::where('status','Tidak Lulus')->count();
                @endphp
                <div class="collapse" id="seleksi">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('peserta_lolos') }}" class="nav-link @yield('peserta_lolos')">Lulus ({{ $total['lulus'] }})</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('peserta_reject') }}" class="nav-link @yield('peserta_reject')">Tidak Lulus ({{ $total['tidak_lulus'] }})</a>
                        </li>
                    </ul>
                </div>
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
            <li class="nav-item nav-category">Master</li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#persyaratan" role="button" aria-expanded="false" aria-controls="forms">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="link-title">Persyaratan</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="persyaratan">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('persyaratan_pendaftaran_umum') }}" class="nav-link @yield('persyaratan_pendaftaran_umum')">Umum</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('persyaratan_pendaftaran_regular') }}" class="nav-link @yield('persyaratan_pendaftaran_regular')">Regular</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('persyaratan_pendaftaran_undangan') }}" class="nav-link @yield('persyaratan_pendaftaran_undangan')">Undangan</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('persyaratan_pendaftaran_tempat') }}" class="nav-link @yield('persyaratan_pendaftaran_tempat')">Tempat & Waktu</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('persyaratan_pendaftaran_daftar_ulang') }}" class="nav-link @yield('persyaratan_pendaftaran_daftar_ulang')">Daftar Ulang</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('persyaratan_pendaftaran_lain_lain') }}" class="nav-link @yield('persyaratan_pendaftaran_lain_lain')">Lain lain</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#biaya" role="button" aria-expanded="false" aria-controls="forms">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">Biaya</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="biaya">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('biaya_infaq') }}" class="nav-link @yield('biaya_infaq')">Infaq</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('biaya_siswa') }}" class="nav-link @yield('biaya_siswa')">Siswa</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @yield('jadwal')">
                <a href="{{ route('jadwal_pendaftaran_admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Jadwal</span>
                </a>
            </li>
            <li class="nav-item @yield('booklet')">
                <a href="{{ route('booklet_pendaftaran_admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">Booklet</span>
                </a>
            </li>
            <li class="nav-item @yield('alur_pendaftaran')">
                <a href="{{ route('alur_pendaftaran_admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Alur Pendaftaran</span>
                </a>
            </li>
            <li class="nav-item @yield('soal_test')">
                <a href="{{ route('soal_test') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Soal Tes Regular</span>
                </a>
            </li>
            <li class="nav-item nav-category">Account</li>
            @if (Auth::user()->role == "Root")
                <li class="nav-item @yield('akun_pegawai')">
                    <a href="{{ route('akun_pegawai') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Akun pegawai</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('akun_saya') }}" class="nav-link @yield('akun_saya')">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Pengaturan</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
