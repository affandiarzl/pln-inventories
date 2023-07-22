<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index() {
        $barangs = Barang::get();
        $ruangans = Ruangan::get();
        $barangMasuks = BarangMasuk::with(['barang', 'ruangan'])
        ->get();
        return view('barang_masuk.index', compact('barangMasuks', 'barangs', 'ruangans'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'id_barang'=>'required',
            'id_ruangan'=>'nullable',
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
            'id_ruangan'=>'nullable',
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