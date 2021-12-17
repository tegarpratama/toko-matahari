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
                    <a href="{{ route('admin.produk.index') }}"><i class="ti-package"></i> Data Produk </a>
                </li>
                <li class="{{ Request::routeIs('admin.member.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.member.index') }}"><i class="ti-user"></i>Data User</a>
                </li>

                <li class="label">Pesanan</li>
                <li class="{{ Request::routeIs('admin.pesanan.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pesanan.index') }}"><i class="ti-shopping-cart"></i> Data Pesanan</a>
                </li>

                <li class="label">Data Laporan</li>
                <li class="{{ Request::routeIs('admin.laporan.produk') ? 'active' : '' }}">
                    <a href="{{ route('admin.laporan.produk') }}"><i class="ti-shopping-cart"></i>Laporan Barang</a>
                </li>
                <li class="{{ Request::routeIs('admin.laporan.pesanan') ? 'active' : '' }}">
                    <a href="{{ route('admin.laporan.pesanan') }}"><i class="ti-shopping-cart"></i>Laporan Pemesanan</a>
                </li>

                <li class="label">Profil</li>
                <li class="{{ Request::routeIs('admin.profil.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.profile.index') }}"><i class="ti-user"></i> Profil </a>
                </li>
                <li class="{{ Request::routeIs('admin.password.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.password.index') }}"><i class="ti-key"></i> Ubah Password </a>
                </li>
            </ul>
        </div>
    </div>
</div>
