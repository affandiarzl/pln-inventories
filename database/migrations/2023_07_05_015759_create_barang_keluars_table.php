<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi_keluar');
            $table->integer('id_barang');
            $table->date('tgl_keluar');
            $table->integer('qty_keluar');
            $table->bigInteger('total_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_barang_keluar');
    }
};