<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_penjualan = Penjualan::count();
        $total_barang_terjual = DetailPenjualan::sum('jumlah');
        $total_barang = Barang::count();
        $total_admin = Admin::count();
        

        
        $history_terakhir_penjualan = Penjualan::with(['admin', ])
        ->latest()
        ->take(5)
        ->get();

        $history_terakhir_detail_penjualan = DetailPenjualan::with(['barang', 'penjualan.admin'])
        ->latest()
        ->take(5)
        ->get();

        return view('home.dashboard', compact(
            'total_penjualan',
            'total_barang_terjual',
            'total_barang',
            'total_admin',
            'history_terakhir_penjualan',
            'history_terakhir_detail_penjualan',
           
        ));
     }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
