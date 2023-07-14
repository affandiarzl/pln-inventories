<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Ruangan;
use App\Models\TabelSatuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        $kategoris = Kategori::get();
        $satuans = TabelSatuan::get();
        $ruangans = Ruangan::get();
        return view('barang.index');
    }
}