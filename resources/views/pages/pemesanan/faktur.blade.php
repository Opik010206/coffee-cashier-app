<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Cafe Indomart</h2>
    <h5>Jl. Mockingjay No. 45, 34234</h5>
    <hr>
    <h5>No. Faktur : {{ $transaksi->id }}</h5>
    <h5>{{ $transaksi->tanggal }}</h5>
    <table border="0">
        <thead>
            <td>Qty</td>
            <td>Item</td>
            <td>Harga</td>
            <td>Total</td>
        </thead>
        <tbody>
            @foreach ($transaksi->detailTransaksi as $item)
                <tr>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->menu->nama }}</td>
                    <td>{{ number_format($item->menu->harga,0,",",".") }}</td>
                    <td>{{ number_format($item->subtotal,0,",",".") }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{ number_format($transaksi->total_harga,0,",",".") }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>