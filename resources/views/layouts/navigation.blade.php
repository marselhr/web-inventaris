<header class="mb-5">
    <div class="header-top">
        <div class="container ">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('assets/guest/images/logo.png') }}" alt="Logo"></a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">

                    @auth

                        <a href="#" id="topbarUserDropdown"
                            class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-md2">
                                <img src="{{ asset('assets/admin/assets/compiled/jpg/1.jpg') }}" alt="Avatar">
                            </div>
                            <div class="text">
                                <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                <p class="user-dropdown-status text-sm text-muted">{{ Auth::user()->email }}</p>
                            </div>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                            <li><a class="dropdown-item" href="#">My Account</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                            </li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                            </li>
                        </ul>
                    @endauth
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item {{ Request::routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="menu-link">
                        Home</span>
                    </a>
                </li>

                @auth
                    <li class="menu-item {{ Request::routeIs('lihat.status.pinjam') ? 'active' : '' }}">
                        <a href="{{ route('lihat.status.pinjam') }}" class="menu-link">
                            Status Peminjaman </span>
                        </a>
                    </li>
                @endauth
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        Tentang Kami</span>
                    </a>

                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        Bantuan</span>
                    </a>
                </li>
                @guest
                    <li class="menu-item">
                        <a href="{{ route('login') }}" class="menu-link">
                            Login</span>
                        </a>
                    </li>
                @endguest



            </ul>
        </div>
    </nav>

</header>
