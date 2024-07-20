<!DOCTYPE html>
<html>
<head>
    <title>Show Barang</title>
</head>
<body>
    <h2>Show Barang</h2>
    <a href="{{ route('barangs.index') }}">Back</a>
    <div>
        <strong>Nama Barang:</strong>
        {{ $barang->Nama_Barang }}
    </div>
    <div>
        <strong>Stok:</strong>
        {{ $barang->Stok }}
    </div>
    <div>
        <strong>Jumlah Terjual:</strong>
        {{ $barang->Jumlah_Terjual }}
    </div>
    <div>
        <strong>Tanggal Transaksi:</strong>
        {{ $barang->Tanggal_Transaksi }}
    </div>
    <div>
        <strong>Jenis Barang:</strong>
        {{ $barang->Jenis_Barang }}
    </div>
</body>
</html>
