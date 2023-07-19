<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $table = "tbl_kategoris";

    use HasFactory;
    protected $guarded = ["id"];

    public function barangMasuk() {
        return $this->hasMany(BarangMasuk::class, 'id_barang');
    }
}