<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index() {
        $barangs = Barang::get();
        $barangKeluars = BarangKeluar::with(['kategori', 'satuan'])
        ->join('tbl_barang', 'tbl_barang_keluar.id_barang', '=', 'tbl_barang.id')
        ->join('tbl_kategoris', 'tbl_barang.id_kategori', '=', 'tbl_kategoris.id')
        ->join('tabel_satuans', 'tbl_barang.id_satuan', '=', 'tabel_satuans.id')
        ->get();
        return view('barang_keluar.index', compact('barangKeluars', 'barangs'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'id_barang'=>'required',
            'qty_keluar'=>'required',
            'tgl_keluar'=>'required',
        ]);
        BarangKeluar::create($data);
        // $barang = Barang::findOrFail($request->id_barang);
        // $barang->stok -= $request->qty_keluar;
        // $barang->save();
        return redirect()->route('barang-keluar.index')->with('success', 'Anda berhasil menambahkan data!');
    }

    public function delete($id) {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->delete();
        return redirect()->route('barang-keluar.index')->with('success', 'Anda berhasil menghapus data!');
    }
}