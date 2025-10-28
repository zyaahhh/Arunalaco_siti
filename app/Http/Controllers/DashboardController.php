<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // === DATA KARTU STATISTIK ===
        $total_penjualan = Penjualan::count();
        $total_barang_terjual = DetailPenjualan::sum('jumlah');
        $total_barang = Barang::count();
        $total_admin = Admin::count();

        // === HISTORY PENJUALAN TERBARU ===
        $history_terakhir_penjualan = Penjualan::with('admin')
            ->latest()
            ->take(5)
            ->get();

        $history_terakhir_detail_penjualan = DetailPenjualan::with(['barang', 'penjualan.admin'])
            ->latest()
            ->take(5)
            ->get();

        // === KOMPOSISI DATA (untuk donut chart) ===
        $komposisi = [
            'Penjualan' => $total_penjualan,
            'Barang Terjual' => $total_barang_terjual,
            'Barang' => $total_barang,
            'Admin' => $total_admin,
        ];

        // === TREND PENJUALAN PER BULAN (6 bulan terakhir) ===
        $bulan = collect(range(5, 0))->map(function ($i) {
            return Carbon::now()->subMonths($i)->format('M Y');
        })->toArray();

        $penjualanPerBulan = collect(range(5, 0))->map(function ($i) {
            $start = Carbon::now()->subMonths($i)->startOfMonth();
            $end   = Carbon::now()->subMonths($i)->endOfMonth();
            return Penjualan::whereBetween('tgl_penjualan', [$start, $end])->count();
        })->toArray();

        // === KIRIM DATA KE VIEW ===
        return view('home.dashboard', compact(
            'total_penjualan',
            'total_barang_terjual',
            'total_barang',
            'total_admin',
            'history_terakhir_penjualan',
            'history_terakhir_detail_penjualan',
            'komposisi',
            'bulan',
            'penjualanPerBulan'
        ));
    }
}
