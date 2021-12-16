@extends('layouts.front')

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio mt-5">
        <div class="container">
            <div class="section-title">
                <h2>My Cart</h2>
            </div>

            <section id="portfolio-details" class="portfolio-details">
                <div class="container">
                    <div class="portfolio-details-container">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 15%;">Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($keranjang as $k)
                                        <tr>
                                            <td>
                                                <form action="{{ route('member.keranjang.destroy', $k->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn"><i class='bx bx-x bx-sm text-danger'></i></button>
                                                </form>
                                            </td>
                                            <td><img src="{{ url('storage/gambar/' . $k->produk->gambar) }}" class="img-fluid"></td>
                                            <td>{{ $k->qty }}</td>
                                            <td>@convert($k->produk->harga)</td>
                                            <td>@convert($k->subtotal)</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Keranjang anda kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot class="table-secondary">
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th>@convert($total)</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        @if ($total > 0)
                            <small>Total harga diatas belum termasuk biaya ekspedisi yang dipilih.</small>
                            <br>
                            <a href="{{ route('member.checkout.index') }}" class="btn btn-primary float-right px-4 mt-4">Checkout</a>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>
@endsection
