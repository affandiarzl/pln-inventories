<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index() {
        $ruangans = Ruangan::all();
        return view('ruangan.index', compact('ruangans'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'nama_ruangan'=>'required'
        ]);
        Ruangan::create($data);
        return redirect()->route('ruangan.index')->with('success', 'Anda berhasil menambahkan data!');
    }
    public function update($id, Request $request) {
        $request->validate([
            'nama_ruangan'=>'required'
        ]);
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->update([
            'nama_ruangan'=>$request->nama_ruangan
        ]);
        return redirect()->route('ruangan.index')->with('success', 'Anda berhasil mengedit ruangan!');
    }
    public function delete($id) {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('success', 'Anda berhasil menghapus ruangan!');
    }
}