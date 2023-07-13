<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'nama_kategori'=>'required'
        ]);
        Kategori::create($data);
        return redirect()->route('kategori.index')->with('success', 'Anda berhasil menambahkan data!');
    }
    public function update($id, Request $request) {
        $request->validate([
            'nama_kategori'=>'required'
        ]);
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori'=>$request->nama_kategori
        ]);
        return redirect()->route('kategori.index')->with('success', 'Anda berhasil mengedit kategori!');
    }
    public function delete($id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Anda berhasil menghapus kategori!');
    }
}