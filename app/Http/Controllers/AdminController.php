<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();
        return view ('home.admin.index', compact('admin'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_admin'=> 'required|max:100',
            'username'=> 'required|max:100',
            'password'=> 'required',
            'no_telp'=> 'required',
        ]);

        Admin::create([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('admin.index')->with('success', 'Data Berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = admin::find($id);
        return view ('home.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $admin = Admin::findOrFail($id);

    $validated = $request->validate([
        'nama_admin' => 'required|string|max:100',
        'username' => 'required|string|max:100',
        'password' => 'nullable|min:6',
        'no_telp' => 'required|string|max:100',
    ]);

    if ($request->filled('password')) {
        $validated['password'] = bcrypt($request->password);
    } else {
        unset($validated['password']);
    }

    $admin->update($validated);

    return redirect()->route('admin.index')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus');
    }
}
