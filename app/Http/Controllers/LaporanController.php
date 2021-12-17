<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use PDF;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function produk()
    {
        $produk = Produk::orderBy('id', 'DESC')->paginate(10);

        return view('pages.laporan.produk', [
            'produk' => $produk,
        ]);
    }

    public function produkCetak()
    {
        $produk = Produk::orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('pages.laporan.produk-cetak', [
            'produk' => $produk,
        ]);

        $fileName = 'produk.pdf';

        return $pdf->download($fileName);
    }

    public function pesanan()
    {
        $pesanan = Pesanan::orderBy('tanggal', 'desc')->paginate(10);

        return view('pages.laporan.pemesanan', [
            'pesanan' => $pesanan,
        ]);
    }

    public function pesananCetak()
    {
        $pesanan = Pesanan::orderBy('tanggal', 'desc')->get();

        $pdf = PDF::loadView('pages.laporan.pemesanan-cetak', [
            'pesanan' => $pesanan,
        ])->setPaper('a4', 'landscape');

        $fileName = 'pesanan.pdf';

        return $pdf->download($fileName);
    }
}
