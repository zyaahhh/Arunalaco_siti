<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    public function index()
    { 
        $detail_penjualan = DetailPenjualan::all();
        return view('home.detail_penjualan.index', compact('detail_penjualan'));
    }

    public function create()
    {
        return view('home.detail_penjualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penjualan' => 'required|max:100',
            'id_barang' => 'required|max:100',
            'jumlah' => 'required|max:100',
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
        $detail_penjualan = DetailPenjualan::find($id);
        return view('home.detail_penjualan.edit', compact('detail_penjualan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_penjualan' => 'required|max:100',
            'id_barang' => 'required|max:100',
            'jumlah' => 'required|max:100',
        ]);

        $detail_penjualan = DetailPenjualan::find($id);
        $detail_penjualan->update([
            'id_penjualan' => $request->id_penjualan,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('detail_penjualan.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $detail_penjualan = DetailPenjualan::find($id);
        $detail_penjualan->delete();

        return redirect()->route('detail_penjualan.index')->with('success', 'Data berhasil dihapus');
    }

    // ✅ Tambahan fungsi untuk cetak struk
    public function cetakStruk($id)
    {
        // Ambil data penjualan beserta detail dan admin
        $penjualan = Penjualan::with(['detail_penjualan', 'admin'])->findOrFail($id);

        // Kirim data ke view struk
        return view('admin.struk', compact('penjualan'));
    }
}
