<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with('produk')->where('member_id', auth()->guard('member')->user()->id)->get();
        $total = 0;
        $weight = 0;
        foreach($keranjang as $k) {
            $total += $k->subtotal;
            $weight += $k->produk->berat;
        }

        $provinsi = $this->get_province();

        return view('pages.member-checkout.index', [
            'keranjang' => $keranjang,
            'total' => $total,
            'weight' => $weight,
            'provinsi' => $provinsi
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'member_id' => auth()->guard('member')->user()->id,
            'invoice' => 'INV/' . auth()->guard('member')->user()->id . '/' . date('Ymd'),
            'berat' => $request->weight,
            'kurir' => $request->kurir,
            'layanan' => $request->layanan,
            'ongkir' => $request->ongkir,
            'total' => $request->total,
            'alamat' => $request->alamat . ', ' . $request->kota,
            'status' => 'Belum Bayar',
            'resi' => null,
            'tanggal' => now()
        ];

        $pesanan = Pesanan::create($data);

        // INSERT INTO PESANAN_DETAIL TABLE
        $keranjang = Keranjang::where('member_id', auth()->guard('member')->user()->id)->get();
        foreach($keranjang as $k) {
            $dataPesananDetail = [
                'pesanan_id' => $pesanan->id,
                'produk_id' => $k->produk_id,
                'qty' => $k->qty,
                'subtotal' => $k->subtotal
            ];

            PesananDetail::create($dataPesananDetail);

            // DELETE CART
            Keranjang::findOrFail($k->id)->delete();
        }

        session(['idPesanan' => $pesanan->id]);
        return redirect()->route('member.checkout.success');
    }

    public function get_province()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: fe02217342ab502bd35908885d49c1ef"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
         echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response,true);
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
    }

    public function get_city($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: fe02217342ab502bd35908885d49c1ef"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response,true);
            $data_kota = $response['rajaongkir']['results'];
            return $data_kota;
        }
    }

    public function get_ongkir($destination, $weight, $courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=457&destination=$destination&weight=$weight&courier=$courier",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: fe02217342ab502bd35908885d49c1ef"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response,true);
            $data_ongkir = $response['rajaongkir']['results'];
            return json_encode($data_ongkir);
        }
    }
}
