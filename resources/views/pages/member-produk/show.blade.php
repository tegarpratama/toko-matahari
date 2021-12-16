@extends('layouts.front')

@section('content')
<section id="portfolio" class="portfolio mt-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-4">
                <div class="portfolio-details-slider swiper">
                    <img src="{{ url('storage/gambar/' . $produk->gambar) }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h2>{{ $produk->nama_produk }}</h2>
                    </div>
                </div>

                @if (session('status'))
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <div class="alert alert-success text-center mb-2 mt-2" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <div class="alert alert-danger text-center mb-2 mt-2" role="alert">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mt-4">
                    <div class="col">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 20%">Stok Tersedia</th>
                                <td>{{ $produk->stok }}</td>
                            </tr>
                            <tr>
                                <th>Berat (g)</th>
                                <td>{{ $produk->berat }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>@convert($produk->harga)</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $produk->deskripsi }}</td>
                            </tr>
                        </table>

                        @if ($produk->stok > 1)
                            <div class="row d-flex justify-content-end mt-5">
                                <div class="col">
                                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                                        <i class='bx bxs-chevron-left mr-1'></i>
                                        Kembali
                                    </a>
                                </div>
                                <div class="col-5">
                                    @if (auth()->guard('member')->user())
                                        <form action="{{ route('member.keranjang.store') }}" method="POST">
                                    @else
                                        <form action="{{ route('member.index.login') }}" method="GET">
                                    @endif
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                            <input type="number" class="form-control" value="1" name="qty">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="submit">Add to Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning text-center mt-5" role="alert">
                                <strong>Produk tidak tersedia</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection
