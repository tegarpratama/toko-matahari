@extends('layouts.back')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="row">
                    <div class="col">
                        <h3>Data Pesanan</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('admin.laporan.pesanan.cetak') }}" class="btn btn-sm btn-secondary"><i class="ti-download mr-2"></i> Cetak</a>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table text-center table-bordered mb-4">
                                <thead>
                                    <th>#</th>
                                    <th>Invoice</th>
                                    <th>Kurir</th>
                                    <th>Ongkir</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>No Resi</th>
                                    <th class="text-center">Tanggal</th>
                                </thead>
                                <tbody>
                                    @forelse ($pesanan as $p)
                                        <tr>
                                            <td>{{ ($pesanan->currentPage() - 1) * $pesanan->perPage() + $loop->index + 1 }}</td>
                                            <td><a class="text-primary" href="{{ route('admin.pesanan.show', $p->id) }}">{{ $p->invoice }}</a></td>
                                            <td>{{ $p->kurir }}</td>
                                            <td>@convert($p->ongkir)</td>
                                            <td>@convert($p->total)</td>
                                            <td>
                                                @if ($p->status == 'Belum Bayar')
                                                    <span class="badge badge-warning">{{ $p->status }}</span>
                                                @elseif($p->status == 'Dibayar')
                                                    <span class="badge badge-primary">{{ $p->status }}</span>
                                                @elseif($p->status == 'Dikirim')
                                                    <span class="badge badge-success">{{ $p->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $p->resi }}</td>
                                            <td class="text-center">{{ $p->tanggal }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Pesanan kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{ $pesanan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
