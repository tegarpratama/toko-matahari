@extends('layouts.back')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hallo {{ auth()->guard('admin')->user()->nama }}, <span>Selamat Datang</span></h1>
                        </div>
                    </div>
                </div>
            </div>

            <section id="main-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-package color-success border-success"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Produk</div>
                                    <div class="stat-digit">{{ $produk }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-user color-danger border-danger"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">User</div>
                                    <div class="stat-digit">{{ $user }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Data Pesanan Bulan Ini</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section id="main-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-shopping-cart color-dark border-dark"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Semua Pesanan</div>
                                    <div class="stat-digit">{{ $pesanan }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-bookmark color-warning border-warning"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Belum Bayar</div>
                                    <div class="stat-digit">{{ $belumBayar }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money color-info border-info"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Dibayar</div>
                                    <div class="stat-digit">{{ $dibayar }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-truck color-success border-success"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Dikirim</div>
                                    <div class="stat-digit">{{ $dikirim }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
