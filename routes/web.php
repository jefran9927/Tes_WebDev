<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('barangs/compare', [BarangController::class, 'compareTransactions'])->name('barangs.compareTransactions');

Route::resource('barangs', BarangController::class);
Route::post('barangs/check', [BarangController::class, 'checkBarang'])->name('barangs.check');
Route::get('barangs/{barang}/showBarang', [BarangController::class, 'showBarang'])->name('barangs.showBarang');
Route::get('barangs/{barang}/editBarang', [BarangController::class, 'editBarang'])->name('barangs.editBarang');
Route::put('barangs/{barang}/updateBarang', [BarangController::class, 'updateBarang'])->name('barangs.updateBarang');
Route::delete('barangs/{barang}/destroyBarang', [BarangController::class, 'destroyBarang'])->name('barangs.destroyBarang');

Route::get('transactions/{transaction}', [BarangController::class, 'show'])->name('transactions.show');
Route::get('transactions/{transaction}/edit', [BarangController::class, 'edit'])->name('transactions.edit');
Route::put('transactions/{transaction}', [BarangController::class, 'update'])->name('transactions.update');
Route::delete('transactions/{transaction}', [BarangController::class, 'destroy'])->name('transactions.destroy');
