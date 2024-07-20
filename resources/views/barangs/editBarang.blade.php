<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h2>Edit Barang</h2>
    <a href="{{ route('barangs.index') }}">Back</a>
    <form action="{{ route('barangs.updateBarang', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama Barang:</label>
        <input type="text" name="Nama_Barang" value="{{ $barang->Nama_Barang }}" required>
        <label>Stok:</label>
        <input type="number" name="Stok" value="{{ $barang->Stok }}" required>
        <label>Jumlah Terjual:</label>
        <input type="number" name="Jumlah_Terjual" value="{{ $barang->Jumlah_Terjual }}" required>
        <label>Jenis Barang:</label>
        <input type="text" name="Jenis_Barang" value="{{ $barang->Jenis_Barang }}" required>
        <label>Tanggal Transaksi:</label>
        <input type="date" name="Tanggal_Transaksi" value="{{ $barang->Tanggal_Transaksi }}" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
