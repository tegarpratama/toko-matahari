@extends('layouts.back')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="card mt-4">

                @if (session('status'))
                    <div class="row mb-4">
                        <div class="col">
                            <div class="alert alert-success text-center text-white mt-2 mb-2" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mb-4">
                    <div class="col text-right">
                        <a href="{{ route('admin.pesanan.cetak', $pesanan->id) }}" class="btn btn-sm btn-secondary"><i class="ti-download mr-2"></i> Cetak</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h6>{{ $pesanan->member->nama }}</h6>
                        <h6>{{ $pesanan->member->email }}</h6>
                        <h6>{{ $pesanan->member->no_telp }}</h6>
                    </div>
                    <div class="col text-right">
                        <h5>INVOICE: #{{ $pesanan->invoice }}</h5>
                        <h6>{{ $pesanan->tanggal }}</h6>
                        <h6>
                            Status:
                            @if ($pesanan->status == 'Belum Bayar')
                                <span class="badge badge-warning">{{ $pesanan->status }}</span>
                            @elseif($pesanan->status == 'Dibayar')
                                <span class="badge badge-primary">{{ $pesanan->status }}</span>
                            @elseif($pesanan->status == 'Dikirim')
                                <span class="badge badge-success">{{ $pesanan->status }}</span>
                            @endif
                        </h6>
                        <h6>No Resi: {{ $pesanan->resi }}</h6>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table text-center table-bordered mb-4">
                                <thead class="table-secondary">
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th class="text-center">Subtotal</th>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan->pesananDetail as $p)
                                        <tr>
                                            <td>
                                                {{ $p->produk->nama_produk }} <br>
                                                <img style="width: 200px" src="{{ url('storage/gambar/' . $p->produk->gambar) }}" class="img-fluid">
                                            </td>
                                            <td>{{ $p->qty }}</td>
                                            <td class="text-center">@convert($p->subtotal)</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="2">Ongkos Kirim</th>
                                        <td class="text-center">@convert($pesanan->ongkir) <br> {{ strtoupper($pesanan->kurir) }} - {{ $pesanan->layanan }}</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <td colspan="2" class="text-dark"><strong>Total</strong></td>
                                        <td class="text-center text-dark"><strong>@convert($pesanan->total)</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @if ($pesanan->status == 'Dibayar')
                    <hr>
                    <div class="row mt-4">
                        <div class="col">
                            <form action="{{ route('admin.pesanan.update', $pesanan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Dikirim">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="No Resi Pengiriman" name="resi" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit" id="button-addon2">Konfirmasi Pesanan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

            @if ($konfirmasi)
                    <div class="card mt-4">
                        <div class="row">
                            <div class="col">
                                <h5>Konfirmasi Pembayaran</h5>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width:15%">No Rekening</th>
                                        <td class="text-left">{{ $pesanan->konfirmasiPesanan->no_rekening }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Rekening</th>
                                        <td class="text-left">{{ $pesanan->konfirmasiPesanan->nama_rekening }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nominal</th>
                                        <td class="text-left">@convert($pesanan->konfirmasiPesanan->nominal)</td>
                                    </tr>
                                    <tr>
                                        <th>Catatan</th>
                                        <td class="text-left">{{ $pesanan->konfirmasiPesanan->catatan }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-4">
                                <img src="{{ url('storage/bukti_transfer/' . $pesanan->konfirmasiPesanan->bukti_transfer) }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
            @endif
        </div>
    </div>
</div>
@endsection
