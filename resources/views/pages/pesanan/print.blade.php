<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align:center;
        }

        table td, table th {
            border: 1px solid rgb(8, 8, 8);
            padding: 2px;
        }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: rgb(0, 121, 190);
            color: white;
        }

        .column {
            font-size: 16px;
            float: left;
            width: 50%;
            padding: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="column">
            <p>Nama : {{ $pesanan->member->nama }}</p>
            <p>Email: {{ $pesanan->member->email }}</p>
            <p>No Hp: {{ $pesanan->member->no_telp }}</p>
        </div>
        <div class="column" style="text-align: right;">
            <p>INVOICE: #{{ $pesanan->invoice }}</p>
            <p>{{ $pesanan->tanggal }}</p>
            <p>
                Status:
                @if ($pesanan->status == 'Belum Bayar')
                    <span>{{ $pesanan->status }}</span>
                @elseif($pesanan->status == 'Dibayar')
                    <span>{{ $pesanan->status }}</span>
                @elseif($pesanan->status == 'Dikirim')
                    <span>{{ $pesanan->status }}</span>
                @endif
            </p>
            <p>No Resi: {{ $pesanan->resi ? $pesanan->resi : '-' }}</p>
        </div>
    </div>
    <table>
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
