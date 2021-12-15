<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->produk) {
            $search = '%' . $request->produk . '%';
            $produk = Produk::where('nama_produk', 'like', $search)
                            ->orWhere('stok', 'like', $search)
                            ->orWhere('harga', 'like', $search)
                            ->orderBy('id', 'DESC')
                            ->paginate(10)
                            ->appends(request()->query());
        } else {
            $produk = Produk::orderBy('id', 'DESC')->paginate(5);
        }

        return view('pages.produk.index', [
            'produk' => $produk,
        ]);
    }

    public function create()
    {
        return view('pages.produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->gambar) {
            $extension =  $request->gambar->extension();
            $newName = date('Ymd-His') . '.' . $extension;
            $data['gambar'] =  $newName;
            Storage::putFileAs('public/gambar', $request->gambar, $newName);
        }

        $data['dibuat'] = now();
        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('status', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        return view('pages.produk.edit', [
            'produk' => $produk
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $produk = Produk::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($produk->gambar);

            $extension =  $request->gambar->extension();
            $newName = date('Ymd-His') . '.' . $extension;
            $data['gambar'] = $newName;
            Storage::putFileAs('public/gambar', $request->gambar, $newName);
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('status', 'Data produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        Storage::delete('public/gambar/' . $produk->gambar);

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('status', 'Data produk berhasil dihapus');
    }
}
