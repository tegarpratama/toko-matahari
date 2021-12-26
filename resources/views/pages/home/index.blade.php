@extends('layouts.front')

@push('after-style')
    <link rel="stylesheet" href="{{ asset('assets/front/css/card.css') }}">
@endpush

@section('content')
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-md-left" data-aos="fade-up">
        <h1>Selamat datang di <span>TOKO MATAHARI</span></h1>
        <h2>Menyediakan segala kebutuhan fashion mu</h2>
    </div>
</section>

<main id="main">
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-title">
                <h2>Produk Pilihan</h2>
            </div>

            <div class="row portfolio-container">
                @foreach ($produk as $b)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                    <img src="{{ url('storage/gambar/' . $b->gambar) }}" class="img-fluid" alt="">
                                    <a href="{{ url('storage/gambar/' . $b->gambar) }}" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="Preview"><i class="bx bx-plus"></i></a>
                                    <a href="{{ route('produk.show', $b->id) }}" class="link-details" title="More Details"><i class="bx bx-link"></i></a>
                            </figure>
                            <div class="portfolio-info">
                                <h4><a href="{{ route('produk.show', $b->id) }}">{{ $b->nama_produk }}</a></h4>
                                <p>@convert($b->harga)</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-4">
                <div class="col text-center">
                    <a class="font-weight-bold" href="{{ route('produk.index') }}">LIHAT SEMUA PRODUK<i class='bx bx-right-arrow-alt'></i></a>
                </div>
            </div>
        </div>
    </section>
</main>

@include('includes.front.footer')
@endsection
