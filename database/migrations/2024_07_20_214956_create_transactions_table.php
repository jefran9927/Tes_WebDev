<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Barang');
            $table->integer('Jumlah_Terjual');
            $table->date('Tanggal_Transaksi');
            $table->string('Jenis_Barang');
            $table->integer('Stok');
            $table->timestamps();
        });

        Schema::table('barangs', function (Blueprint $table) {
            $table->integer('Stok')->default(0)->change();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');

        Schema::table('barangs', function (Blueprint $table) {
            $table->integer('Stok')->change();
        });
    }
}
