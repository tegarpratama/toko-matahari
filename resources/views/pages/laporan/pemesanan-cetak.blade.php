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
            <h3>Data Pesanan</h3>
        </div>
    </div>

    <table class="table text-center table-bordered mb-4">
        <tr>
            <th>#</th>
            <th>Invoice</th>
            <th>Kurir</th>
            <th>Ongkir</th>
            <th>Total</th>
            <th>Status</th>
            <th>No Resi</th>
            <th class="text-center">Tanggal</th>
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
