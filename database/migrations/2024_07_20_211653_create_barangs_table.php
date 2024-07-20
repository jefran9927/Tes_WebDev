<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Barang');
            $table->integer('Stok')->default(0);
            $table->integer('Jumlah_Terjual')->default(0);
            $table->date('Tanggal_Transaksi')->nullable();
            $table->string('Jenis_Barang')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
