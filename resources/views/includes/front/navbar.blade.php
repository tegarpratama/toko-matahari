<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="{{ route('home') }}">TOKO MATAHARI</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="">About</a></li>
                <li class="dropdown"><a href="#"><span>Shop<i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('produk.index') }}">All Product</a></li>
                        <li><a href="{{ route('produk.populer') }}">Popular Item</a></li>
                        <li><a href="{{ route('produk.new') }}">New Arrival</a></li>
                    </ul>
                </li>

                @if (auth()->guard('member')->user())
                    <li class="">
                        <a href="{{ route('member.keranjang.index') }}"><i class='bx bx-shopping-bag bx-sm'></i></a>
                    </li>

                    <li class="dropdown"><a href="#"><span>{{ auth()->guard('member')->user()->nama }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="">Pesanan Saya</a></li>
                            <hr>
                            <li><a href="{{ route('member.profile.index') }}">Profil Saya</a></li>
                            <li><a href="{{ route('member.password.index') }}">Ubah Password</a></li>
                            <li><a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a></li>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @else
                    <li><a class="nav-link scrollto" href="{{ route('member.register') }}">Register</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('member.index.login') }}">Login</a></li>
                @endif
            </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>
