<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use App\Models\TabelSatuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        $kategoris = Kategori::get();
        $satuans = TabelSatuan::get();
        $barangs = Barang::with(['kategori', 'satuan'])
        ->get();
        $barangs = $barangs->map(function ($barang) {
            $barangMasuk = BarangMasuk::where('id_barang', $barang->id)->sum('qty_masuk');
            $barangKeluar = BarangKeluar::where('id_barang', $barang->id)->sum('qty_keluar');
            $stok = $barangMasuk - $barangKeluar;
            $barang->stok = $stok;
            $barang->update([
                'stok'=>$stok
            ]);
            return $barang;
        });
        return view('barang.index', compact('barangs', 'kategoris', 'satuans'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'id_kategori'=>'required',
            'id_satuan'=>'required',
            'id_barang'=>'nullable',
            'nama_barang'=>'required',
            'type_barang'=>'required',
            'stok'=>'required',
        ]);
        Barang::create($data);
        return redirect()->route('barang.index')->with('success', 'Anda berhasil menambahkan data!');
    }

    public function delete($id) {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Anda berhasil menghapus data!');
    }
}
