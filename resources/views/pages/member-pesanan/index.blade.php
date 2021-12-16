@extends('layouts.front')

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio mt-5">
        <div class="container">
            <div class="section-title">
                <h2>Pesanan Saya</h2>
            </div>

            <div class="container">
                @if (session('status'))
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success text-center mt-2 mb-2" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Kurir</th>
                                        <th>Total</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>No Resi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pesanan as $p)
                                        <tr>
                                            <td><a href="{{ route('member.konfirmasi-pesanan.show', $p->id) }}">{{ $p->invoice }}</a></td>
                                            <td>{{ $p->kurir }}</td>
                                            <td>@convert($p->total)</td>
                                            <td>{{ $p->tanggal }}</td>
                                            <td>
                                                @if ($p->status == 'Belum Bayar')
                                                    <span class="bg-warning text-light px-1">{{ $p->status }}</span>
                                                @elseif($p->status == 'Dibayar')
                                                    <span class="bg-primary text-light px-1">{{ $p->status }}</span>
                                                @elseif($p->status == 'Dikirim')
                                                    <span class="bg-success text-light px-1">{{ $p->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $p->resi }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Pesanan Anda Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
