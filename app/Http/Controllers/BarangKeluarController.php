<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index() {
        $barangs = Barang::get();
        $barangKeluars = BarangKeluar::with(['barang'])
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
        return redirect()->route('barang-keluar.index')->with('success', 'Anda berhasil menambahkan data!');
    }
    public function update($id, Request $request) {
        $data=$request->validate([
            'id_barang'=>'required',
            'qty_keluar'=>'required',
            'tgl_keluar'=>'required',
        ]);
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->update(
            $data
        );
        return redirect()->route('barang-keluar.index')->with('success', 'Anda berhasil mengedit data!');
    }
    public function delete($id) {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangKeluar->delete();
        return redirect()->route('barang-keluar.index')->with('success', 'Anda berhasil menghapus data!');
    }
}