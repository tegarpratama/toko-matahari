<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Pesanan;

class CheckoutSuccessController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::find(Session::get('idPesanan'));

        return view('pages.checkout-success.index', [
            'pesanan' => $pesanan
        ]);
    }
}
