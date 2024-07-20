<!DOCTYPE html>
<html>
head>
    <title>Edit Transaction</title>
</head>
<body>
    <h2>Edit Transaction</h2>
    <a href="{{ route('barangs.index') }}">Back</a>
    <form action="{{ route('barangs.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama Barang:</label>
        <input type="text" name="Nama_Barang" value="{{ $transaction->Nama_Barang }}" required>
        <label>Jumlah Terjual:</label>
        <input type="number" name="Jumlah_Terjual" value="{{ $transaction->Jumlah_Terjual }}" required>
        <label>Tanggal Transaksi:</label>
        <input type="date" name="Tanggal_Transaksi" value="{{ $transaction->Tanggal_Transaksi }}" required>
        <label>Jenis Barang:</label>
        <input type="text" name="Jenis_Barang" value="{{ $transaction->Jenis_Barang }}" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
