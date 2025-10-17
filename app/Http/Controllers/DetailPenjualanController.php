<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    public function index()
    {
        $detail_penjualan = DetailPenjualan::with(['penjualan', 'barang'])->get();
        return view('home.detail_penjualan.index', compact('detail_penjualan'));
    }

    public function create()
    {
        $penjualan = Penjualan::all();
        $barang = Barang::all();
        return view('home.detail_penjualan.create', compact('penjualan', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penjualan' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ]);

        DetailPenjualan::create([
            'id_penjualan' => $request->id_penjualan,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('detail_penjualan.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $detail_penjualan = DetailPenjualan::findOrFail($id);
        $penjualan = Penjualan::all();
        $barang = Barang::all();
        return view('home.detail_penjualan.edit', compact('detail_penjualan', 'penjualan', 'barang'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_penjualan' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $detail_penjualan = DetailPenjualan::findOrFail($id);
        $detail_penjualan->update([
            'id_penjualan' => $request->id_penjualan,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('detail_penjualan.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $detail_penjualan = DetailPenjualan::findOrFail($id);
        $detail_penjualan->delete();

        return redirect()->route('detail_penjualan.index')->with('success', 'Data berhasil dihapus');
    }
}
