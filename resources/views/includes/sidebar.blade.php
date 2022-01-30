<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">Vote<span>Apps</span></a>
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
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Voting</li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#token" role="button" aria-expanded="false" aria-controls="forms">
                    <i class="link-icon" data-feather="archive"></i>
                    <span class="link-title">Token</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="token">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all_token') }}" class="nav-link @yield('all_token')">All @yield('token-badge-all')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('unused_token') }}" class="nav-link @yield('unused_token')">Unused @yield('token-badge-unused')</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('used_token') }}" class="nav-link @yield('used_token')">Used @yield('token-badge-used')</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @yield('candidate')">
                <a href="{{ route('candidates') }}" class="nav-link ">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Candidate</span>
                </a>
            </li>
            <li class="nav-item @yield('voting')">
                <a href="{{ route('voting') }}" class="nav-link">
                    <i class="link-icon" data-feather="check-circle"></i>
                    <span class="link-title">Voting</span>
                </a>
            </li>
            <li class="nav-item @yield('report')">
                <a href="" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Report</span>
                </a>
            </li>
            <li class="nav-item @yield('traffic')">
                <a href="" class="nav-link">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="link-title">Traffic</span>
                </a>
            </li>
            <li class="nav-item @yield('settings')">
                <a href="{{ route('settings') }}" class="nav-link">
                    <i class="link-icon" data-feather="tool"></i>
                    <span class="link-title">Settings</span>
                </a>
            </li>
            <li class="nav-item nav-category">Services</li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#client" role="button" aria-expanded="false" aria-controls="forms">
                    <i class="link-icon" data-feather="meh"></i>
                    <span class="link-title">Client</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="client">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/forms/basic-elements.html" class="nav-link">Subscribed</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced-elements.html" class="nav-link">Time Out</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link">Extra Time</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">Price</span>
                </a>
            </li>
            <li class="nav-item nav-category">Settings</li>
            <li class="nav-item @yield('manage_user')">
                <a href="{{ route('manage_users') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Manage Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('account') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">My Account</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
{{-- <nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Sidebar:</h6>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
                    Dark
                </label>
            </div>
        </div>
    </div>
</nav> --}}
