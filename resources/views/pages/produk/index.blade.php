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
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary btn-flat">
                            Tambah
                        </a>
                    </div>
                    <div class="col d-flex flex-row-reverse">
                        <form action="{{ route('admin.produk.index') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-sm" placeholder="Cari produk" name="produk" aria-describedby="button-addon2" value="{{ old('produk') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="submit" id="button-addon2">
                                        <i class="ti-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if (session('status'))
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success text-center text-white mt-2 mb-2" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table text-center table-bordered mb-4">
                                <thead>
                                    <th>#</th>
                                    <th style="width: 15%">Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Berat (g)</th>
                                    <th>Harga</th>
                                    <th style="width: 8%" class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @forelse ($produk as $b)
                                        <tr>
                                            <td>{{ ($produk->currentPage() - 1) * $produk->perPage() + $loop->index + 1 }}</td>
                                            <td>
                                                @if ($b->gambar)
                                                    <img src="{{ url('storage/gambar/' . $b->gambar) }}" class="img-fluid">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $b->nama_produk }}</td>
                                            <td>{{ $b->stok }}</td>
                                            <td>{{ $b->berat }}</td>
                                            <td>@convert($b->harga)</td>
                                            <td class="text-center">
                                                <a class="btn btn-warning btn-sm text-white btn-flat" href="{{ route('admin.produk.edit', $b->id) }}">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.produk.destroy', $b->id) }}" method="POST" class="delete d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $b->id }}">
                                                    <button onclick="return confirm('Hapus produk ini?');" type="submit" class="btn btn-danger btn-sm btn-flat">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
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
