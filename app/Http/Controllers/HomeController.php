<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::inRandomOrder()->limit(12)->get();

        return view('pages.home.index', [
            'produk' => $produk
        ]);
    }
}
