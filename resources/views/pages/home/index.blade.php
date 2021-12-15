@extends('layouts.front')

@section('content')
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-md-left" data-aos="fade-up">
        <h1>Selamat datang di <span>TOKO MATAHARI</span></h1>
        <h2>Menyediakan segala kebutuhan fashion mu</h2>
    </div>
</section>

{{-- <main id="main">
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
                                    <img src="{{ url('storage/' . $b->gambar) }}" class="img-fluid" alt="">
                                    <a href="{{ url('storage/' . $b->gambar) }}" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="Preview"><i class="bx bx-plus"></i></a>
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

    <section id="about" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Kontak</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="info-wrap">
                        <div class="row">
                            <div class="col-lg-4 info">
                                <i class="icofont-google-map"></i>
                                <h4>Lokasi:</h4>
                                <p>Komp. Pamulang Permai 2 <br> Jl. Benda Timur 7A Blok E2 <br> No. 16 RT.001/015 <br> Kel. Benda Baru Kec. Pamulang Tangerang Selatan</p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>adarman461@gmail.com</p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="icofont-phone"></i>
                                <h4>WhatsApp:</h4>
                                <p>0813 8855 8516</p>
                                <p>0812 9670 9316</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main> --}}
@endsection
