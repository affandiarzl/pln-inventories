<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Kategori;
use App\Models\TabelSatuan;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index() {
        $kategoris = Kategori::get();
        $satuans = TabelSatuan::get();
        $barangMasuks = BarangMasuk::with(['kategori', 'satuan'])->join('tbl_kategoris', 'tbl_barang_masuk.id_kategori', '=', 'tbl_kategoris.id')->join('tabel_satuans', 'tbl_barang_masuk.id_satuan', '=', 'tabel_satuans.id')->get();
        return view('barang_masuk.index', compact('barangMasuks', 'kategoris', 'satuans'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'id_kategori'=>'required',
            'id_satuan'=>'required',
            'nama_barang'=>'required',
            'tipe_barang'=>'required',
            'qty_masuk'=>'required',
            'tgl_masuk'=>'required',
        ]);
        BarangMasuk::create($data);
        return redirect()->route('barang-masuk.index')->with('success', 'Anda berhasil menambahkan data!');
    }
}