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
    <center><h2>Data Produk</h2></center>
    <hr>
    <table>
        <tr>
            <th>#</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Berat (g)</th>
            <th>Harga</th>
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
