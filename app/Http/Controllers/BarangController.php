<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('home.barang.index', compact('barang'));
    }

    public function create()
    {
        return view('home.barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:4096',
            'nama_barang' => 'required|max:200',
            'harga' => 'required|max:100',
            'stok' => 'required|max:100',
            'satuan' => 'required|max:100',
            'warna' => 'required|max:100',
        ]);

        // Cek apakah ada file foto yang diupload
        if ($request->hasFile('foto')) {
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('image'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }

        Barang::create([
            'foto' => $fileName,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'warna' => $request->warna,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil disimpan');
    }

    public function edit(string $id)
    {
        $barang = Barang::find($id);
        return view('home.barang.edit', compact('barang'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:4096',
            'nama_barang' => 'required|max:45',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'warna' => 'required',
        ]);

        $barang = Barang::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($barang->foto && $barang->foto != 'nophoto.jpg' && file_exists(public_path('image/' . $barang->foto))) {
                unlink(public_path('image/' . $barang->foto));
            }

            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('image'), $fileName);
        } else {
            $fileName = $barang->foto;
        }

        $barang->update([
            'foto' => $fileName,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'warna' => $request->warna,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data berhasil diedit');
    }

    public function destroy(string $id)
    {
        $barang = Barang::find($id);

        if ($barang->foto && $barang->foto != 'nophoto.jpg' && file_exists(public_path('image/' . $barang->foto))) {
            unlink(public_path('image/' . $barang->foto));
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus');
    }
}
