<nav class="navbar">
    <a href="#" class="sidebar-toggler"><i data-feather="menu"></i></a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
                <p>Assalamu'alaikum <b class="text-orange">{{ Auth::user()->name }}</b>, Jangan lupa bismillah <i class="mb-1 text-warning ml-1 icon-small" width="11" height="11" data-feather="heart"></i></p>
            </div>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://via.placeholder.com/30x30" alt="profile">
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
                                >
                                    <i data-feather="log-out"></i>
                                    <span>Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
