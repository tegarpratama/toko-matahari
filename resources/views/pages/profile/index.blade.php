@extends('layouts.back')

@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col">
                    <div class="card p-4">
                        <div class="row">
                            <div class="col">
                                <h4>Profil Anda</h4>
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
                            <div class="col">
                                <form action="{{ route('admin.profile.update', auth()->guard('admin')->user()->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ? old('nama') : $profile->nama }}">
                                        @error('nama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ? old('username') : $profile->username }}">
                                        @error('username')
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
    </div>
</div>
@endsection
