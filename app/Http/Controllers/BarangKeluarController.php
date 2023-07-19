<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index() {
        $barangs = Barang::get();
        $ruangans = Ruangan::get();
        $barangKeluars = BarangKeluar::with(['barang', 'ruangan'])
        ->get();
        return view('barang_keluar.index', compact('barangKeluars', 'barangs', 'ruangans'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'id_barang'=>'required',
            'id_ruangan'=>'nullable',
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