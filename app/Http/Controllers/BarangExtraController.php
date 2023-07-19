<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangExtra;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class BarangExtraController extends Controller
{
    public function index() {
        $barangs = Barang::get();
        $ruangans = Ruangan::get();
        $barangExtras = BarangExtra::with(['kategori', 'satuan', 'ruangan'])
        ->join('tbl_barang', 'tbl_barang_extras.id_barang', '=', 'tbl_barang.id')
        ->join('tbl_kategoris', 'tbl_barang.id_kategori', '=', 'tbl_kategoris.id')
        ->join('tabel_satuans', 'tbl_barang.id_satuan', '=', 'tabel_satuans.id')
        ->join('tbl_ruangans', 'tbl_barang_extras.id_ruangan', '=', 'tbl_ruangans.id')
        ->select('tbl_barang_extras.*', 'tbl_barang.*', 'tbl_kategoris.nama_kategori', 'tabel_satuans.satuan_brg', 'tbl_ruangans.nama_ruangan')
        ->get();
        return view('barang_extra.index', compact('barangExtras', 'barangs', 'ruangans'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'id_ruangan'=>'required',
            'id_barang'=>'required',
            'qty_masuk'=>'required',
            'tgl_masuk'=>'required',
        ]);
        BarangExtra::create($data);
        return redirect()->route('barang-extra.index')->with('success', 'Anda berhasil menambahkan data!');
    }
}