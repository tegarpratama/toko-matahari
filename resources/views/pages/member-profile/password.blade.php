@extends('layouts.front')

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio mt-5">
        <div class="container">
            <div class="section-title">
                <h2>Ubah Password</h2>
            </div>

            @if (session('status'))
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-6">
                            <div class="alert alert-success text-center mb-4" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <section id="portfolio-details" class="portfolio-details">
                <div class="container">
                    <div class="portfolio-details-container">
                        <form action="{{ route('member.password.update', auth()->guard('member')->user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row d-flex justify-content-center mb-3">
                                <div class="col-6">
                                    <div class="form-group mb-4">
                                        <label>Password Baru</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Ulangi Password</label>
                                        <input type="password" name="password_confirm" class="form-control @error('password_confirm') is-invalid @enderror">
                                        @error('password_confirm')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary float-right">Perbarui</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>
@endsection
