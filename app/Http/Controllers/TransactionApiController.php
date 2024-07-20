<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionApiController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    public function show(Transaction $transaction)
    {
        return response()->json($transaction);
    }

    public function compare(Request $request)
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

        return response()->json([
            'highestTransaction' => $highestTransaction,
            'lowestTransaction' => $lowestTransaction,
        ]);
    }
}
