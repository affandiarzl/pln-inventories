<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = "tbl_barang";

    use HasFactory;
    protected $guarded = ["id"];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function satuan() {
        return $this->belongsTo(TabelSatuan::class, 'id_satuan');
    }
    public function barangMasuk() {
        return $this->hasMany(BarangMasuk::class, 'id_barang');
    }
    public function barangKeluar() {
        return $this->hasMany(BarangKeluar::class, 'id_barang');
    }
}