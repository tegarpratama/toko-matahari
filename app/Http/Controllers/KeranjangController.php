<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with('produk')->where('member_id', auth()->guard('member')->user()->id)->get();
        $total = 0;
        foreach($keranjang as $k) {
            $total += $k->subtotal;
        }

        return view('pages.member-keranjang.index', [
            'keranjang' => $keranjang,
            'total' => $total
        ]);
    }

    public function store(Request $request)
    {
        if ($request->qty < 1) {
            return redirect()->route('produk.show', $request->produk_id)->with('error', 'Jumlah produk tidak boleh kurang dari satu.');
        }

        $product = Produk::find($request->produk_id);

        $exists = Keranjang::where('member_id', auth()->guard('member')->user()->id)
                    ->where('produk_id', $request->produk_id)
                    ->exists();

        if ($exists) {
            $cart = Keranjang::where('member_id', auth()->guard('member')->user()->id)
                    ->where('produk_id', $request->produk_id)
                    ->first();

            $qty = $cart->qty + $request->qty;
            $subtotal = $qty * $product->harga;

            $cart->update([
                'qty' => $qty,
                'subtotal' => $subtotal
            ]);

            $product->update([
                'stok' => $product->stok - $request->qty
            ]);

            return redirect()->route('produk.show', $request->produk_id)->with('status', 'Produk berhasil ditambahkan ke keranjang');
        } else {
            $data = [
                'member_id' => auth()->guard('member')->user()->id,
                'produk_id' => $request->produk_id,
                'qty' => $request->qty,
                'subtotal' => $product->harga * $request->qty
            ];

            Keranjang::create($data);

            $product->update([
                'stok' => $product->stok - $request->qty
            ]);

            return redirect()->route('produk.show', $request->produk_id)->with('status', 'Produk berhasil ditambahkan ke keranjang');
        }
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);

        // RETURN STOCK BOOK
        $produk = Produk::findOrFail($keranjang->produk_id);
        $data['stok'] = $produk->stok + $keranjang->qty;
        $produk->update($data);

        // DELETE CART
        $keranjang->delete();

        return redirect()->route('member.keranjang.index');
    }
}
