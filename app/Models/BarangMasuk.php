<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\TabelSatuan;

class BarangMasuk extends Model
{
    public $table = "tbl_barang_masuk";

    use HasFactory;
    protected $guarded = ["id"];

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
    public function satuan() {
        return $this->belongsTo(TabelSatuan::class);
    }
    public function ruangan() {
        return $this->belongsTo(Ruangan::class,'id_ruangan');
    }
    public function barang() {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}