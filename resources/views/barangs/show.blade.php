<!DOCTYPE html>
<html>
<head>
    <title>Show Transaction</title>
</head>
<body>
    <h2>Show Transaction</h2>
    <a href="{{ route('barangs.index') }}">Back</a>
    <div>
        <strong>Nama Barang:</strong>
        {{ $transaction->Nama_Barang }}
    </div>
    <div>
        <strong>Jumlah Terjual:</strong>
        {{ $transaction->Jumlah_Terjual }}
    </div>
    <div>
        <strong>Tanggal Transaksi:</strong>
        {{ $transaction->Tanggal_Transaksi }}
    </div>
    <div>
        <strong>Jenis Barang:</strong>
        {{ $transaction->Jenis_Barang }}
    </div>
    <div>
        <strong>Stok:</strong>
        {{ $transaction->Stok }}
    </div>
</body>
</html>
