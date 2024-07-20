<!DOCTYPE html>
<html>
<head>
    <title>Create Barang</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="Nama_Barang"]').on('blur', function() {
                var namaBarang = $(this).val();
                $.ajax({
                    url: '{{ route("barangs.check") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        Nama_Barang: namaBarang
                    },
                    success: function(response) {
                        if (response.exists) {
                            $('#stok-wrapper').hide();
                        } else {
                            $('#stok-wrapper').show();
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h2>Create Barang</h2>
    <a href="{{ route('barangs.index') }}">Back</a>
    <form action="{{ route('barangs.store') }}" method="POST">
        @csrf
        <label>Nama Barang:</label>
        <input type="text" name="Nama_Barang" required>
        <div id="stok-wrapper">
            <label>Stok:</label>
            <input type="number" name="Stok">
        </div>
        <label>Jumlah Terjual:</label>
        <input type="number" name="Jumlah_Terjual" required>
        <label>Tanggal Transaksi:</label>
        <input type="date" name="Tanggal_Transaksi" required>
        <label>Jenis Barang:</label>
        <input type="text" name="Jenis_Barang" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
