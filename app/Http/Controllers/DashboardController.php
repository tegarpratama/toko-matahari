<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')->count();
        $user = DB::table('member')->count();
        $pesanan = DB::table('pesanan')->whereMonth('tanggal', '=', now()->month)->count();
        $belumBayar = DB::table('pesanan')->whereMonth('tanggal', '=', now()->month)->where('status', 'Belum Bayar')->count();
        $dibayar = DB::table('pesanan')->whereMonth('tanggal', '=', now()->month)->where('status', 'Dibayar')->count();
        $dikirim = DB::table('pesanan')->whereMonth('tanggal', '=', now()->month)->where('status', 'Dikirim')->count();

        return view('pages.dashboard.index', [
            'produk' => $produk,
            'user' => $user,
            'pesanan' => $pesanan,
            'belumBayar' => $belumBayar,
            'dibayar' => $dibayar,
            'dikirim' => $dikirim
        ]);
    }
}
