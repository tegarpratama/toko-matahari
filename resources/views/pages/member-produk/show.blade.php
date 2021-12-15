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

                        <div class="row mt-5">
                            <div class="col">
                                <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                                    <i class='bx bxs-chevron-left mr-1'></i>
                                    Kembali
                                </a>
                                @if (auth()->guard('member')->user())
                                    @if ($produk->stok > 0)
                                        <form action="" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="buku_id" value="{{ $produk->id }}">
                                            <button type="submit" class="btn btn-primary float-right px-3"><i class='bx bx-plus mr-1'></i>Keranjang</button>
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('member.index.login') }}" method="GET" class="d-inline">
                                        <button type="submit" class="btn btn-primary float-right px-3"><i class='bx bx-plus mr-1'></i>Keranjang</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection
