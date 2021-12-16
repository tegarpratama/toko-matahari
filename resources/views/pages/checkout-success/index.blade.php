@extends('layouts.front')

@section('content')
    <main id="main">
        <section id="breadcrumbs" class="breadcrumbs"></section>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <strong>Checkout Berhasil</strong>
                        </div>
                        <div class="card-body">
                            <h3>Invoice: <strong>{{ $pesanan->invoice }}</strong></h3>
                            <br>
                            <p>Terimakasih telah berbelanja.</p>
                            <p>Harap selesaikan pembayaran dengan tata cara:</p>
                            <ol>
                                <li>Tranfer ke Bank <strong>BCA An. Darmansyah 4731220161</strong></li>
                                <li>Tambahkan informasi <strong>{{ $pesanan->invoice }}</strong> atau konfirmasi melalui whatsapp <strong>0813 8855 8516</strong></li>
                                <li>Total pembayaran <strong>@convert($pesanan->total)</strong></li>
                            </ol>
                            <br>
                            <p>Jika sudah melalukan pembayaran, harap upload bukti transfer pada <a href="{{ route('member.konfirmasi-pesanan.show', $pesanan->id) }}">LINK INI</a></p>
                            <a href="{{ route('produk.index') }}" class="btn btn-dark">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
