<!DOCTYPE html>
<html>
<head>
    <title>Compare Transactions</title>
</head>
<body>
    <h2>Compare Transactions</h2>
    <a href="{{ route('barangs.index') }}">Back to Barang List</a>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('barangs.compareTransactions') }}">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="{{ request()->start_date }}">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="{{ request()->end_date }}">
        <button type="submit">Filter</button>
    </form>

    <h3>Highest Transactions</h3>
    @if($highestTransaction)
    <table border="1">
        <tr>
            <th>Jenis Barang</th>
            <th>Total Terjual</th>
        </tr>
        <tr>
            <td>{{ $highestTransaction->Jenis_Barang }}</td>
            <td>{{ $highestTransaction->total_terjual }}</td>
        </tr>
    </table>
    @else
    <p>No transactions found.</p>
    @endif

    <h3>Lowest Transactions</h3>
    @if($lowestTransaction)
    <table border="1">
        <tr>
            <th>Jenis Barang</th>
            <th>Total Terjual</th>
        </tr>
        <tr>
            <td>{{ $lowestTransaction->Jenis_Barang }}</td>
            <td>{{ $lowestTransaction->total_terjual }}</td>
        </tr>
    </table>
    @else
    <p>No transactions found.</p>
    @endif
</body>
</html>
