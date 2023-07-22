<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    public $table = "tbl_barang_keluar";

    use HasFactory;
    protected $guarded = ["id"];

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
    public function satuan() {
        return $this->belongsTo(TabelSatuan::class);
    }
    public function barang() {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}