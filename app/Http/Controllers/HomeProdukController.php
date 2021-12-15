<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class HomeProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::inRandomOrder()->get();

        return view('pages.member-produk.index', [
            'title' => 'All Product',
            'produk' => $produk
        ]);
    }

    public function populer()
    {
        $produk = Produk::where('populer', 1)->get();

        return view('pages.member-produk.index', [
            'title' => 'Popular Item',
            'produk' => $produk
        ]);
    }

    public function new()
    {
        $produk = Produk::orderBy('dibuat', 'desc')->get();

        return view('pages.member-produk.index', [
            'title' => 'New Arrival',
            'produk' => $produk
        ]);
    }

    public function show($id)
    {
        $produk = Produk::find($id);

        return view('pages.member-produk.show', [
            'produk' => $produk
        ]);
    }
}
