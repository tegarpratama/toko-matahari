<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin</title>
    <link href="{{ asset('assets/back/css/lib/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col">
            <h6>{{ $pesanan->member->nama }}</h6>
            <h6>{{ $pesanan->member->email }}</h6>
            <h6>{{ $pesanan->member->no_telp }}</h6>
        </div>
        <div class="col text-right">
            <h5>INVOICE: #{{ $pesanan->invoice }}</h5>
            <h6>{{ $pesanan->tanggal }}</h6>
            <h6>
                Status:
                @if ($pesanan->status == 'Belum Bayar')
                    <span class="badge badge-warning">{{ $pesanan->status }}</span>
                @elseif($pesanan->status == 'Dibayar')
                    <span class="badge badge-primary">{{ $pesanan->status }}</span>
                @elseif($pesanan->status == 'Dikirim')
                    <span class="badge badge-success">{{ $pesanan->status }}</span>
                @endif
            </h6>
            <h6>No Resi: {{ $pesanan->resi }}</h6>
        </div>
    </div>
    <table class="table text-center table-bordered mb-4">
        <tr class="table-secondary">
            <th>Produk</th>
            <th>Gambar</th>
            <th>Qty</th>
            <th class="text-center">Subtotal</th>
        </tr>
        <tbody>
            @foreach ($pesanan->pesananDetail as $p)
                <tr>
                    <td>{{ $p->produk->nama_produk }} </td>
                    <td>
                        <img  style="width: 100px" src="{{ url('storage/gambar/' . $p->produk->gambar) }}">
                    </td>
                    <td>{{ $p->qty }}</td>
                    <td class="text-center">@convert($p->subtotal)</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="3">Ongkos Kirim</th>
                <td class="text-center">@convert($pesanan->ongkir) <br> {{ strtoupper($pesanan->kurir) }} - {{ $pesanan->layanan }}</td>
            </tr>
            <tr class="table-secondary">
                <td colspan="3" class="text-dark"><strong>Total</strong></td>
                <td class="text-center text-dark"><strong>@convert($pesanan->total)</strong></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
