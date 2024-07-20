<!DOCTYPE html>
<html>
<head>
    <title>Barangs</title>
</head>
<body>
    <h2>Barangs</h2>
    <a href="{{ route('barangs.create') }}">Create New Barang</a>
    <a href="{{ route('barangs.compareTransactions') }}">Compare Transactions</a>
    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <h3>Barang List</h3>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Actions</th>
        </tr>
        @foreach ($barangs as $barang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->Nama_Barang }}</td>
                <td>{{ $barang->Stok }}</td>
                <td>
                    <a href="{{ route('barangs.showBarang', $barang->id) }}">Show</a>
                    <a href="{{ route('barangs.editBarang', $barang->id) }}">Edit</a>
                    <form action="{{ route('barangs.destroyBarang', $barang->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    
    <h3>Transaction List</h3>

    <!-- Search Form -->
    <form method="GET" action="{{ route('barangs.index') }}">
        <input type="text" name="search" placeholder="Search by Nama Barang" value="{{ request()->search }}">
        <button type="submit">Search</button>
    </form>

    <!-- Sorting Links -->
    <a href="{{ route('barangs.index', ['sort_by' => 'Nama_Barang', 'order' => request()->order == 'asc' ? 'desc' : 'asc']) }}">Sort by Nama Barang</a>
    <a href="{{ route('barangs.index', ['sort_by' => 'Tanggal_Transaksi', 'order' => request()->order == 'asc' ? 'desc' : 'asc']) }}">Sort by Tanggal Transaksi</a>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Jumlah Terjual</th>
            <th>Tanggal Transaksi</th>
            <th>Jenis Barang</th>
        </tr>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->Nama_Barang }}</td>
                <td>{{ $transaction->Stok }}</td>
                <td>{{ $transaction->Jumlah_Terjual }}</td>
                <td>{{ $transaction->Tanggal_Transaksi }}</td>
                <td>{{ $transaction->Jenis_Barang }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
