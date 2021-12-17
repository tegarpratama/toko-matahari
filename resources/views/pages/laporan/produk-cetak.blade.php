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
            <h4>Data Produk</h4>
        </div>
    </div>

    <table class="table text-center table-bordered mb-4">
        <tr>
            <th>#</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Berat (g)</th>
            <th class="text-center">Harga</th>
        </tr>
        <tbody>
            @forelse ($produk as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->nama_produk }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>{{ $b->berat }}</td>
                    <td class="text-center">@convert($b->harga)</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Data produk Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
