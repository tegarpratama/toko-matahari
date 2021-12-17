@extends('layouts.front')

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio mt-5">
        <div class="container">
            <div class="section-title">
                <h2>Konfirmasi Pembayaran</h2>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                        @if ($pesanan->konfirmasiPesanan != null)
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group mb-4">
                                                <label>No Invoice</label>
                                                <input class="form-control" type="text" value="{{ $pesanan->invoice }}"  required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group mb-4">
                                                <label>No Rekening</label>
                                                <input class="form-control" type="number" value="{{ $pesanan->konfirmasiPesanan->no_rekening }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>Nama Rekening</label>
                                                <input class="form-control" type="text" value="{{ $pesanan->konfirmasiPesanan->nama_rekening }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>Nominal Transfer</label>
                                                <input class="form-control" type="text" value="{{ $pesanan->konfirmasiPesanan->nominal }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Catatan Tambahan (Jika Diperlukan)</label>
                                        <textarea class="form-control" rows="3" readonly>{{ $pesanan->konfirmasiPesanan->catatan }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Bukti Transfer</label>
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                                <img src="{{ url('storage/bukti_transfer/' . $pesanan->konfirmasiPesanan->bukti_transfer) }}" alt="bukti transfer" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="card-body">
                                <form action="{{ route('member.konfirmasi-pesanan.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">

                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group mb-4">
                                                <label>No Invoice</label>
                                                <input class="form-control" type="text" value="{{ $pesanan->invoice }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group mb-4">
                                                <label>No Rekening</label>
                                                <input type="number" name="no_rekening" class="form-control @error('no_rekening') is-invalid @enderror" value="{{ old('no_rekening') }}" required>
                                                @error('no_rekening')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group mb-4">
                                                <label>Nama Rekening</label>
                                                <input type="text" name="nama_rekening" class="form-control @error('nama_rekening') is-invalid @enderror" value="{{ old('nama_rekening') }}" required>
                                                @error('nama_rekening')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group mb-4">
                                                <label>Nominal Transfer</label>
                                                <input type="number" name="nominal" class="form-control @error('nominal') is-invalid @enderror" value="{{ old('nominal') }}" required>
                                                @error('nama_rekening')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Catatan Tambahan (Jika Diperlukan)</label>
                                        <textarea class="form-control" name="catatan" rows="3">{{ old('catatan') }}</textarea>
                                        @error('catatan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Bukti Transfer</label>
                                        <input type="file" class="form-control-file" name="bukti_transfer" required>
                                        @error('bukti_transfer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-sm-12 col-lg-5 mt-4">
                        <div class="card">
                            <div class="card-header">
                                Pembelian Anda
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="">
                                            <tr>
                                                <th>Produk</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pesanan->pesananDetail as $p)
                                                <tr>
                                                    <td>
                                                        {{ $p->produk->nama_produk }}
                                                    </td>
                                                    <td>{{ $p->qty }}</td>

                                                    <td>@convert($p->produk->harga)</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th colspan="2">Ongkir</th>
                                                <td>@convert($pesanan->ongkir)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="table-dark">
                                            <tr>
                                                <th colspan="2">Total</th>
                                                <th>@convert($pesanan->total)</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
