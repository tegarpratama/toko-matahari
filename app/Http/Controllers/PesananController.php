<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\KonfirmasiPesanan;
use PDF;
use Carbon\Carbon;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        if ($request->pesanan) {
            $search = '%' . $request->pesanan . '%';
            $pesanan = Pesanan::where('invoice', 'like', $search)
                        ->orWhere('kurir', 'like', $search)
                        ->orWhere('ongkir', 'like', $search)
                        ->orWhere('total', 'like', $search)
                        ->orWhere('alamat', 'like', $search)
                        ->orWhere('status', 'like', $search)
                        ->orWhere('resi', 'like', $search)
                        ->orderBy('tanggal', 'desc')
                        ->paginate(10)
                        ->appends(request()->query());
        } else {
            $pesanan = Pesanan::orderBy('tanggal', 'desc')->paginate(10);
        }

        return view('pages.pesanan.index', [
            'pesanan' => $pesanan
        ]);
    }

    public function show($id)
    {
        $pesanan = Pesanan::with('pesananDetail.produk', 'konfirmasiPesanan')->findOrFail($id);
        $konfirmasi = KonfirmasiPesanan::where('pesanan_id', $pesanan->id)->first();

        return view('pages.pesanan.show', [
            'pesanan' => $pesanan,
            'konfirmasi' => $konfirmasi
        ]);
    }

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $data = [
            'status' => $request->status,
            'resi' => $request->resi
        ];
        $pesanan->update($data);

        return redirect()->route('admin.pesanan.show', $pesanan->id)->with('status', 'Invoice berhasil diperbarui');
    }

    public function print($id)
    {
        $tanggal = Carbon::now()->locale('id')->isoFormat('LL');
        $pesanan = Pesanan::with('pesananDetail.produk', 'konfirmasiPesanan')->findOrFail($id);

        $pdf = PDF::loadView('pages.pesanan.print', [
            'pesanan' => $pesanan,
            'tanggal' => $tanggal
        ]);

        $fileName = $pesanan->invoice . '.pdf';

        return $pdf->stream($fileName, array("Attachment" => 0));
    }
}
