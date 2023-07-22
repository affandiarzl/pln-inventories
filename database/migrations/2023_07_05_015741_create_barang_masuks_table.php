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
        Schema::create('tbl_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('tbl_barang');
            $table->foreignId('id_ruangan')->constrained('tbl_ruangans')->nullable();
            $table->integer('qty_masuk');
            $table->date('tgl_masuk');
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
        Schema::dropIfExists('tbl_barang_masuk');
    }
};