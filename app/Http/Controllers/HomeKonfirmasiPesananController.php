<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\KonfirmasiPesanan;
use App\Models\Pesanan;

class HomeKonfirmasiPesananController extends Controller
{
    public function show($id)
    {
        $pesanan = Pesanan::with('pesananDetail.produk', 'konfirmasiPesanan')->findOrFail($id);

        return view('pages.member-konfirmasi.create', [
            'pesanan' => $pesanan,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $extension =  $request->bukti_transfer->extension();
        $newName = date('Ymd-His') . '.' . $extension;
        $data['bukti_transfer'] = $newName;
        Storage::putFileAs('public/bukti_transfer', $request->bukti_transfer, $newName);

        // INSERT INTO KONFIRMASI_PESANAN TABLE
        $konfirmasiPesanan = KonfirmasiPesanan::create($data);

        // UPDATE PESANAN TABLE
        $pesanan = Pesanan::findOrFail($konfirmasiPesanan->pesanan_id);
        $dataPesanan['status'] = 'Dibayar';
        $pesanan->update($dataPesanan);

        return redirect()->route('member.pesanan.index')->with('status', 'Konfirmasi pembayaran berhasil, harap menunggu konfirmasi admin.');
    }
}
