@extends('layouts.back')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="row">
                    <div class="col">
                        <h3>Ubah Data Produk</h3>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Nama produk</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') ? old('nama_produk') : $produk->nama_produk }}">
                                @error('nama_produk')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Stok produk</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') ? old('stok') : $produk->stok }}">
                                @error('stok')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Berat produk</label>
                                <input type="string" class="form-control @error('berat') is-invalid @enderror" name="berat" value="{{ old('berat') ? old('berat') : $produk->berat }}">
                                @error('berat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Harga produk</label>
                                <input type="string" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') ? old('harga') : $produk->harga }}">
                                @error('harga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Gambar produk</label>
                                @if ($produk->gambar)
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ url('storage/gambar/' . $produk->gambar) }}" class="img-fluid">
                                        </div>
                                    </div>
                                @endif
                                <br>
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                                @error('gambar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><span class="text-danger">*</span>Deskripsi</label>
                                <textarea class="form-control"  name="deskripsi" rows="10">{{ old('deskripsi') ? old('deskripsi') : $produk->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark btn-flat float-right mt-3">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
