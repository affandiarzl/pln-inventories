<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index() {
        $barangs = Barang::get();
        $barangMasuks = BarangMasuk::with(['barang'])
        ->get();
        return view('barang_masuk.index', compact('barangMasuks', 'barangs'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'id_barang'=>'required',
            'qty_masuk'=>'required',
            'tgl_masuk'=>'required',
        ]);
        BarangMasuk::create($data);
        // $barang = Barang::findOrFail($request->id_barang);
        // $barang->stok += $request->qty_masuk;
        // $barang->save();
        return redirect()->route('barang-masuk.index')->with('success', 'Anda berhasil menambahkan data!');
    }
    public function update($id, Request $request) {
        $data=$request->validate([
            'id_barang'=>'required',
            'qty_masuk'=>'required',
            'tgl_masuk'=>'required',
        ]);
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->update(
            $data
        );
        return redirect()->route('barang-masuk.index')->with('success', 'Anda berhasil mengedit data!');
    }
    public function delete($id) {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->delete();
        return redirect()->route('barang-masuk.index')->with('success', 'Anda berhasil menghapus data!');
    }
}
