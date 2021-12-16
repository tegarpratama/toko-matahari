<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class HomePesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('member_id', auth()->guard('member')->user()->id)->orderBy('tanggal', 'DESC')->get();

        return view('pages.member-pesanan.index', [
            'pesanan' => $pesanan
        ]);
    }
}
