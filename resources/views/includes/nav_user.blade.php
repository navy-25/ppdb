<nav class="navbar">
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group text-white">
                <p>Assalamu'alaikum
                    <b class="text-orange">Selamat datang di website resmi MAN 1 Hulu Sungai Tengah
                        <i class="mb-1 text-warning ml-1 icon-small" width="11" height="11" data-feather="heart"></i>
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
                <a class="btn btn-outline-warning" href="{{ route('login') }}">
                    Masuk
                </a>
            </li>
            <li class="nav-item">
                <button class="btn btn-warning text-white">
                    Daftar
                </button>
            </li>
        </ul>
    </div>
</nav>
<div class="header">
    <div class="filter-black"></div>
    <div class="text-orange text-header">
        <div class="row">
            <div class="col-12 col-md-2 col-lg-2">
                <img src="{{ asset('assets/images/logo.png') }}" alt="placeholder" class="pt-2 img-header" style="width:120px;float:right !important;">
            </div>
            <div class="col-12 col-md-10 col-lg-10">
                <h1 class="mb-3">Penerimaan Peserta Didik Baru (New Student Admission)</h1>
                <h3 class="text-white">Madrasah Aliyah Negeri 1 Hulu Sungai Tengah</h3>
                <button class="mt-4 btn btn-warning text-white">
                    Daftar Sekarang
                </button>
            </div>
        </div>
    </div>
</div>
<div id="banner_carrousel" class="carousel slide" data-bs-ride="carousel">
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
