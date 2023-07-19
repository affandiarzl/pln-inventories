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
        return $this->belongsTo(Kategori::class);
    }
    public function satuan() {
        return $this->belongsTo(TabelSatuan::class);
    }
    public function barangMasuk() {
        return $this->hasMany(BarangMasuk::class, 'id_barang');
    }
    public function barangKeluar() {
        return $this->hasMany(BarangKeluar::class, 'id_barang');
    }
    // public function getStokAttribute() {
    //     $totalMasuk = $this->barangMasuk->sum('qty_masuk');
    //     $totalKeluar = $this->barangKeluar->sum('qty_keluar');
    //     return $totalMasuk - $totalKeluar;
    // }
}