@extends('layouts.back')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="row">
                    <div class="col">
                        <h3>Tambah Data Produk</h3>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label><span class="text-danger">*</span>Nama produk</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}">
                                @error('nama_produk')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><span class="text-danger">*</span>Stok produk</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}">
                                @error('stok')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><span class="text-danger">*</span>Berat produk (gram)</label>
                                <input type="number" class="form-control @error('berat') is-invalid @enderror" name="berat" value="{{ old('berat') }}">
                                @error('berat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><span class="text-danger">*</span>Harga produk</label>
                                <input type="string" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}">
                                @error('harga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Gambar produk</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                                @error('gambar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label><span class="text-danger">*</span>Deskripsi</label>
                                <textarea class="form-control"  name="deskripsi" rows="10">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark btn-flat float-right mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-style')
<link href="{{ asset('assets/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endpush

@push('after-script')
<script src="{{ asset('assets/summernote/summernote-bs4.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 500,
            // toolbar: [
            //     ['style', ['bold', 'italic', 'underline', 'clear']],
            //     ['fontsize', ['fontsize']],
            //     ['color', ['forecolor']],
            //     ['para', ['ul', 'ol', 'paragraph']],
            //     ['table', ['table', 'link']]
            // ]
        });
    });
</script>
@endpush
