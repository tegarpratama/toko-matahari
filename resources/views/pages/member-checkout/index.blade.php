@extends('layouts.front')

@section('content')
<main id="main">
    <section id="portfolio" class="portfolio mt-5">
        <div class="container">
            <div class="section-title">
                <h2>My Cart</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 mb-4 col-sm-12 col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Formulir Pembayaran
                            </div>
                            <div class="card-body">
                                <form action="{{ route('member.checkout.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label>Nama Penerima</label>
                                        <input type="hidden" name="member_id" value="{{ auth()->guard('member')->user()->id }}">
                                        <input type="text" class="form-control" value="{{ auth()->guard('member')->user()->nama }}" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>No. Handphone</label>
                                        <input type="text" class="form-control" value="{{ auth()->guard('member')->user()->no_telp }}" readonly>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Provinsi</label>
                                        <select class="form-control" name="province_id" id="provinsi">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($provinsi as $p)
                                                <option value="{{ $p['province_id'] }}">{{ $p['province'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Kota</label>
                                        <select class="form-control" name="kota_id" id="kota">
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Ekspedisi</label>
                                        <select class="form-control ekspedisi" name="kurir" id="kurir">
                                            <option value="">Pilih Kurir</option>
                                            <option value="jne">JNE</option>
                                            <option value="tiki">TIKI</option>
                                            <option value="pos">POS</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Layanan</label>
                                        <select class="form-control" name="layanan" id="layanan">
                                            <option value="">Pilih Layanan</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Alamat Lengkap</label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3"></textarea>
                                        @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <input type="hidden" value="{{ $weight }}" id="weight" name="weight">
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <input type="hidden" name="ongkir">
                                    <input type="hidden" name="kota">
                                    <input type="hidden" name="layanan">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4 col-sm-12 col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Keranjang Anda
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="">
                                            <tr>
                                                <th>Produk</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($keranjang as $k)
                                                <tr>
                                                    <td>
                                                        {{ $k->produk->nama_produk }}
                                                        {{-- <img src="{{ url('storage/gambar/' . $k->produk->gambar) }}" class="img-fluid"> --}}
                                                    </td>
                                                    <td>{{ $k->qty }}</td>
                                                    <td>@convert($k->produk->harga)</td>
                                                    <td>@convert($k->subtotal)</td>
                                                </tr>
                                            @endforeach
                                            {{-- <tr>
                                                <td colspan="3">Ongkir</td>
                                                <td><div class="ongkir" id="ongkir">Rp 0,00</div></td>
                                            </tr> --}}
                                        </tbody>
                                        <tfoot class="table-dark">
                                            <tr>
                                                <th colspan="3">Total</th>
                                                <th><div class="total" id="total" data-total="{{ $total }}">@convert($total)</div></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('after-style')
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('after-script')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#provinsi').select2();
            $('#kota').select2();
            $('#kurir').select2();
            $('#layanan').select2();
        })
    </script>

    <script>
        $(document).ready(function(){
            $('select[name="province_id"]').on('change', function(){
                let provinceid = $(this).val();
                if(provinceid){
                    jQuery.ajax({
                        url:"/kota/"+provinceid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('select[name="kota_id"]').empty();
                                $.each(data, function(key, value){
                                $('select[name="kota_id"]').append('<option data-kota="'+ value.type +' ' +value.city_name +'" value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
                            });
                        }
                    });
                }
            });

            $('select[name="kurir"]').on('change', function(){
                let destination = $("select[name=kota_id]").val();
                let courier = $("select[name=kurir]").val();
                let weight = $("input[name=weight]").val();
                if(courier){
                    jQuery.ajax({
                        url:"/destination="+destination+"&weight="+weight+"&courier="+courier,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('select[name="layanan"]').empty();
                            $.each(data, function(key, value){
                                $.each(value.costs, function(key1, value1){
                                    $.each(value1.cost, function(key2, value2){
                                        $('select[name="layanan"]').append('<option data-ongkir="'+ value2.value +'" data-layanan="'+ value1.service +'"  value="'+ key +'">' + value1.service + '-' + value1.description + '-' +value2.value+ '</option>');
                                    });
                                 });
                            });
                        }
                    });
                } else {
                    $('select[name="layanan"]').empty();
                }
            });

            $('select[name="layanan"]').on('change', function(){
                var harga_ongkir = $("#layanan option:selected").attr('data-ongkir');
                var kota = $("#kota option:selected").attr('data-kota');
                var layanan = $("#layanan option:selected").attr('data-layanan');

                $("input[name=ongkir]").val(harga_ongkir);
                $("input[name=kota]").val(kota);
                $("input[name=layanan]").val(layanan);


                console.log(harga_ongkir, kota, layanan)
            });
        });
    </script>
@endpush
