<?php

namespace App\Http\Controllers;

use App\Models\TabelSatuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index() {
        $satuans = TabelSatuan::all();
        return view('satuan.index', compact('satuans'));
    }
    public function update($id, Request $request) {
        $request->validate([
            'satuan_brg'=>'required'
        ]);
        $satuan = TabelSatuan::findOrFail($id);
        $satuan->update([
            'satuan_brg'=>$request->satuan_brg
        ]);
        return redirect()->route('satuan.index');
    }
}