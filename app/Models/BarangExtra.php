<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\TabelSatuan;
use App\Models\Ruangan;

class BarangExtra extends Model
{
    public $table = "tbl_barang_extras";

    use HasFactory;
    protected $guarded = ["id"];

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
    public function satuan() {
        return $this->belongsTo(TabelSatuan::class);
    }
    public function ruangan() {
        return $this->belongsTo(Ruangan::class);
    }
    public function barang() {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}