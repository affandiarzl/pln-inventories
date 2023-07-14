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
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->constrained('tbl_kategoris');
            $table->foreignId('id_satuan')->constrained('tabel_satuans');
            $table->foreignId('id_ruangan')->constrained('tbl_ruangans');
            $table->string('nama_barang')->nullable();
            $table->string('type_barang')->nullable();
            $table->integer('stok')->nullable();
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
        Schema::dropIfExists('tbl_barang');
    }
};