@extends('layouts.front')

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio mt-5">
        <div class="container">
            <div class="section-title">
                <h2>Profil Saya</h2>
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
                        <form action="{{ route('member.profile.update', $profile) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row d-flex justify-content-center mb-3">
                                <div class="col-6">
                                    <div class="form-group mb-4">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ? old('nama') : $profile->nama }}">
                                        @error('nama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ? old('email') : $profile->email }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') ? old('username') : $profile->username }}">
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>No Hp</label>
                                        <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') ? old('no_telp') : $profile->no_telp }}">
                                        @error('no_telp')
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
