<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Admin;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    { 
        $penjualan = Penjualan::all();
        return view('home.penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $admin = Admin::all();
        return view('home.penjualan.create', compact('admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_penjualan' => 'required|date',
            'id_admin' => 'required|integer',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
        ]);

        $diskon = $request->diskon ?? 0;
        $harga = $request->harga;
        $total = $harga - ($harga * $diskon / 100);

        Penjualan::create([
            'tgl_penjualan' => $request->tgl_penjualan,
            'id_admin' => $request->id_admin,
            'harga' => $harga,
            'diskon' => $diskon,
            'total' => $total,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $admin = Admin::all();
        $penjualan = Penjualan::findOrFail($id);
        return view('home.penjualan.edit', compact('penjualan', 'admin'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_penjualan' => 'required|date',
            'id_admin' => 'required|integer',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:100',
        ]);

        $penjualan = Penjualan::findOrFail($id);

        $diskon = $request->diskon ?? 0;
        $harga = $request->harga;
        $total = $harga - ($harga * $diskon / 100);

        $penjualan->update([
            'tgl_penjualan' => $request->tgl_penjualan,
            'id_admin' => $request->id_admin,
            'harga' => $harga,
            'diskon' => $diskon,
            'total' => $total,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Data berhasil dihapus');
    }

   // ===============================
// CETAK STRUK PENJUALAN
// ===============================
public function cetak($id)
{
    $penjualan = Penjualan::with(['detail_penjualan.barang'])->findOrFail($id);

    // Ambil semua detail penjualan berdasarkan ID penjualan
    $detail_penjualan = DetailPenjualan::where('id_penjualan', $id)
        ->with('barang')
        ->get();

    return view('home.penjualan.cetak', compact('penjualan', 'detail_penjualan'));
}

    }

