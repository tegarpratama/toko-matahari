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
                                <h4>Ubah Password Anda</h4>
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
                                <form action="{{ route('admin.password.update', auth()->guard('admin')->user()->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm">
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
