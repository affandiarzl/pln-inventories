<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = "tbl_barang";

    use HasFactory;

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
    public function satuan() {
        return $this->belongsTo(TabelSatuan::class);
    }
    public function ruangan() {
        return $this->belongsTo(Ruangan::class);
    }
}