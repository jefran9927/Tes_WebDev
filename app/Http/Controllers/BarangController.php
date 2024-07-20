<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barangQuery = Barang::query();
        $transactionQuery = Transaction::query();

        // Apply searching
        if ($request->has('search')) {
            $transactionQuery->where('Nama_Barang', 'like', '%' . $request->search . '%');
        }

        // Apply sorting
        if ($request->has('sort_by') && $request->has('order')) {
            $transactionQuery->orderBy($request->sort_by, $request->order);
        }

        $barangs = $barangQuery->get();
        $transactions = $transactionQuery->get();

        return view('barangs.index', compact('barangs', 'transactions'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama_Barang' => 'required',
            'Jumlah_Terjual' => 'required|integer',
            'Tanggal_Transaksi' => 'required|date',
            'Jenis_Barang' => 'required',
            'Stok' => 'nullable|integer'
        ]);

        $barang = Barang::where('Nama_Barang', $request->Nama_Barang)->first();

        if ($barang) {
            $initialStok = $barang->Stok;
            $barang->Stok -= $request->Jumlah_Terjual;
            $barang->save();
        } else {
            $request->validate(['Stok' => 'required|integer']);
            $initialStok = $request->Stok;
            $barang = new Barang([
                'Nama_Barang' => $request->Nama_Barang,
                'Stok' => $request->Stok - $request->Jumlah_Terjual,
                'Jumlah_Terjual' => $request->Jumlah_Terjual,
                'Tanggal_Transaksi' => $request->Tanggal_Transaksi,
                'Jenis_Barang' => $request->Jenis_Barang,
            ]);
            $barang->save();
        }

        Transaction::create([
            'Nama_Barang' => $request->Nama_Barang,
            'Jumlah_Terjual' => $request->Jumlah_Terjual,
            'Tanggal_Transaksi' => $request->Tanggal_Transaksi,
            'Jenis_Barang' => $request->Jenis_Barang,
            'Stok' => $initialStok
        ]);

        return redirect()->route('barangs.index')->with('success', 'Barang created or updated and transaction recorded successfully.');
    }

    public function showBarang(Barang $barang)
    {
        return view('barangs.showBarang', compact('barang'));
    }

    public function show(Transaction $transaction)
    {
        return view('barangs.show', compact('transaction'));
    }

    public function editBarang(Barang $barang)
    {
        return view('barangs.editBarang', compact('barang'));
    }

    public function edit(Transaction $transaction)
    {
        return view('barangs.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'Nama_Barang' => 'required',
            'Jumlah_Terjual' => 'required|integer',
            'Tanggal_Transaksi' => 'required|date',
            'Jenis_Barang' => 'required',
        ]);

        $transaction->update($request->all());
        $barang = Barang::where('Nama_Barang', $request->Nama_Barang)->first();
        $barang->Stok -= ($request->Jumlah_Terjual - $transaction->Jumlah_Terjual);
        $barang->save();

        return redirect()->route('barangs.index')->with('success', 'Transaction updated successfully.');
    }

    public function updateBarang(Request $request, Barang $barang)
    {
        $request->validate([
            'Nama_Barang' => 'required',
            'Stok' => 'required|integer',
        ]);

        $barang->update($request->all());

        return redirect()->route('barangs.index')->with('success', 'Barang updated successfully.');
    }

    public function destroyBarang(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Barang deleted successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $barang = Barang::where('Nama_Barang', $transaction->Nama_Barang)->first();
        $barang->Stok += $transaction->Jumlah_Terjual;
        $barang->save();

        $transaction->delete();
        return redirect()->route('barangs.index')->with('success', 'Transaction deleted successfully.');
    }

    public function checkBarang(Request $request)
    {
        $barang = Barang::where('Nama_Barang', $request->Nama_Barang)->first();
        return response()->json(['exists' => $barang ? true : false, 'stok' => $barang ? $barang->Stok : 0]);
    }

    // New method to compare transactions with time range filtering
    public function compareTransactions(Request $request)
{
    $start_date = $request->start_date;
    $end_date = $request->end_date;

    $query = Transaction::select('Jenis_Barang', \DB::raw('SUM(Jumlah_Terjual) as total_terjual'))
                        ->groupBy('Jenis_Barang');

    if ($start_date && $end_date) {
        $query->whereBetween('Tanggal_Transaksi', [$start_date, $end_date]);
    }

    $highestTransaction = (clone $query)->orderBy('total_terjual', 'desc')->first();
    $lowestTransaction = (clone $query)->orderBy('total_terjual', 'asc')->first();

    return view('barangs.compare', compact('highestTransaction', 'lowestTransaction', 'start_date', 'end_date'));
}
}
