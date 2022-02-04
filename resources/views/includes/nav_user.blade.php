<nav class="navbar">
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group text-white">
                <p>Assalamu'alaikum
                    <b class="text-orange">Selamat datang di website resmi MAN 1 Hulu Sungai Tengah
                        <i class="mb-1 text-orange ml-1 icon-small" width="11" height="11" data-feather="heart"></i>
                    </b>
                </p>
            </div>
        </form>
        <ul class="navbar-nav left">
            <li class="nav-item text-white">
                <p class="text-orange">PPDB
                    <b class="text-white">| MAN 1 Hulu</b>
                </p>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="btn btn-warning text-white" href="{{ route('daftar') }}">
                    Daftar
                </a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="btn btn-outline-warning" href="{{ route('login') }}">
                        Masuk
                    </a>
                </li>
            @else
                @php
                    $name = explode(' ',Auth::user()->name);
                @endphp
                <li class="nav-item dropdown nav-profile">
                    <a class="btn btn-outline-warning nav-link dropdown-toggle p-2" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $name[0] }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <div class="dropdown-header d-flex flex-column align-items-center">
                            <div class="figure mb-3">
                                <img src="https://via.placeholder.com/80x80" alt="">
                            </div>
                            <div class="info text-center">
                                <p class="name font-weight-bold mb-0">{{ ucfirst(Auth::user()->name) }}</p>
                                <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="dropdown-body">
                            <ul class="profile-nav p-0 pt-3">
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">
                                        <i data-feather="box"></i>
                                        <span>Beranda</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i data-feather="user"></i>
                                        <span>Akun</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i data-feather="settings"></i>
                                        <span>Pengaturan</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{ route('logout') }}"
                                        class="nav-link"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i data-feather="log-out"></i>
                                        <span>Keluar</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<div class="header">
    <div class="filter-black"></div>
    <div class="text-green text-header">
        <div class="row">
            <div class="col-12 col-md-2 col-lg-2">
                <img src="{{ asset('assets/images/logo.png') }}" alt="placeholder" class="pt-2 img-header" style="width:120px;float:right !important;">
            </div>
            <div class="col-12 col-md-10 col-lg-10">
                <h1 class="mb-3">Penerimaan Peserta Didik Baru (New Student Admission)</h1>
                <h3 class="text-white">Madrasah Aliyah Negeri 1 Hulu Sungai Tengah</h3>
                <button class="mt-4 btn btn-green text-white">
                    Daftar Sekarang
                </button>
            </div>
        </div>
    </div>
</div>
<div id="banner_carrousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="{{ asset('assets/images/carousel_1.jpg') }}" class="img-carousel d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="{{ asset('assets/images/carousel_2.jpg') }}" class="img-carousel d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="{{ asset('assets/images/carousel_3.jpg') }}" class="img-carousel d-block w-100" alt="...">
		</div>
	</div>
</div>
