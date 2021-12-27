<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin</title>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align:center;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
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
    </style>
</head>

<body>
    <center><h2>Data Pesanan</h2></center>
    <hr>
    <table>
        <tr>
            <th>#</th>
            <th>Invoice</th>
            <th>Kurir</th>
            <th>Ongkir</th>
            <th>Total</th>
            <th>Status</th>
            <th>No Resi</th>
            <th>Tanggal</th>
        </tr>
        <tbody>
            @forelse ($pesanan as $p)
                <tr>
                    <td>{{ ($loop->iteration) }}</td>
                    <td>{{ $p->invoice }}</td>
                    <td>{{ $p->kurir }}</td>
                    <td>@convert($p->ongkir)</td>
                    <td>@convert($p->total)</td>
                    <td>
                        @if ($p->status == 'Belum Bayar')
                            <span class="badge badge-warning">{{ $p->status }}</span>
                        @elseif($p->status == 'Dibayar')
                            <span class="badge badge-primary">{{ $p->status }}</span>
                        @elseif($p->status == 'Dikirim')
                            <span class="badge badge-success">{{ $p->status }}</span>
                        @endif
                    </td>
                    <td>{{ $p->resi }}</td>
                    <td class="text-center">{{ $p->tanggal }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data Pesanan kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
