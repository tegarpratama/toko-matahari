@extends('layouts.back')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="row">
                    <div class="col">
                        <h3>Data Produk</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('admin.laporan.produk.cetak') }}" class="btn btn-sm btn-secondary"><i class="ti-download mr-2"></i> Cetak</a>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table text-center table-bordered mb-4">
                                <thead>
                                    <th>#</th>
                                    {{-- <th style="width: 15%">Gambar</th> --}}
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Berat (g)</th>
                                    <th class="text-center">Harga</th>
                                </thead>
                                <tbody>
                                    @forelse ($produk as $b)
                                        <tr>
                                            <td>{{ ($produk->currentPage() - 1) * $produk->perPage() + $loop->index + 1 }}</td>
                                            {{-- <td>
                                                @if ($b->gambar)
                                                    <img src="{{ url('storage/gambar/' . $b->gambar) }}" class="img-fluid">
                                                @else
                                                    -
                                                @endif
                                            </td> --}}
                                            <td>{{ $b->nama_produk }}</td>
                                            <td>{{ $b->stok }}</td>
                                            <td>{{ $b->berat }}</td>
                                            <td class="text-center">@convert($b->harga)</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Data produk Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{ $produk->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
