<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}">
                        Toko Matahari
                        {{-- <img src="{{ asset('assets/front/img/logo.png') }}" style="width: 35%" class="img-fluid"> --}}
                    </a>
                </div>
                <li class="label">Main</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}"><i class="ti-dashboard"></i> Dashboard</a>
                </li>

                <li class="label">Data Master</li>
                <li class="{{ Request::routeIs('admin.produk.*') ? 'active' : '' }}">
                    <a href=""><i class="ti-package"></i> Data Produk </a>
                </li>
                <li class="{{ Request::routeIs('admin.user.*') ? 'active' : '' }}">
                    <a href=""><i class="ti-user"></i>Data User</a>
                </li>

                <li class="label">Pesanan</li>
                <li class="{{ Request::routeIs('admin.pesanan.*') ? 'active' : '' }}">
                    <a href=""><i class="ti-shopping-cart"></i> Data Pesanan</a>
                </li>
                {{-- <li class="label">Laporan</li>
                <li class="{{ Request::routeIs('admin.laporan.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.laporan.index') }}"><i class="ti-shopping-cart"></i> Data Laporan</a>
                </li> --}}
                <li class="label">Profil</li>
                <li class="{{ Request::routeIs('admin.profil.*') ? 'active' : '' }}">
                    <a href=""><i class="ti-user"></i> Profil </a>
                </li>
                <li class="{{ Request::routeIs('admin.password.*') ? 'active' : '' }}">
                    <a href="}"><i class="ti-key"></i> Ubah Password </a>
                </li>
            </ul>
        </div>
    </div>
</div>
