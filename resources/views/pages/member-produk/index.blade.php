@extends('layouts.front')

@push('after-style')
    <link rel="stylesheet" href="{{ asset('assets/front/css/card.css') }}">
@endpush

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio mt-5">
        <div class="container">
            <div class="section-title">
                <h2>{{ $title }}</h2>
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
        </div>
    </section>
</main>
@endsection
