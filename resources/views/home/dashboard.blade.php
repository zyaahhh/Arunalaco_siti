@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <div class="page-header mb-4">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
    </div>

    <!-- Kartu Statistik -->
    <div class="row mb-4">
        <!-- Total Penjualan -->
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-primary text-white card-box text-center">
                <div class="card-body position-relative d-flex flex-column align-items-center justify-content-center">
                    <i class="mdi mdi-cart-outline card-icon"></i>
                    <h2 class="mt-2 mb-1 fw-bold">{{ $total_penjualan }}</h2>
                    <p class="mb-2">Total Penjualan</p>
                    <a href="{{ route('penjualan.index') }}" class="info-link">More info <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Total Barang Terjual -->
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-success text-white card-box text-center">
                <div class="card-body position-relative d-flex flex-column align-items-center justify-content-center">
                    <i class="mdi mdi-package-variant-closed card-icon"></i>
                    <h2 class="mt-2 mb-1 fw-bold">{{ $total_barang_terjual }}</h2>
                    <p class="mb-2">Total Barang Terjual</p>
                    <a href="{{ route('detail_penjualan.index') }}" class="info-link">More info <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Total Barang -->
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-info text-white card-box text-center">
                <div class="card-body position-relative d-flex flex-column align-items-center justify-content-center">
                    <i class="mdi mdi-cube-outline card-icon"></i>
                    <h2 class="mt-2 mb-1 fw-bold">{{ $total_barang }}</h2>
                    <p class="mb-2">Total Barang</p>
                    <a href="{{ route('barang.index') }}" class="info-link">More info <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Total Admin -->
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-danger text-white card-box text-center">
                <div class="card-body position-relative d-flex flex-column align-items-center justify-content-center">
                    <i class="mdi mdi-account-multiple card-icon"></i>
                    <h2 class="mt-2 mb-1 fw-bold">{{ $total_admin }}</h2>
                    <p class="mb-2">Total Admin</p>
                    <a href="{{ route('admin.index') }}" class="info-link">More info <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- History Penjualan -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3>History Terakhir <b>Penjualan</b></h3>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Admin</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($history_terakhir_penjualan as $no => $p)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $p->admin->nama_admin ?? '-' }}</td>
                                        <td>Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->tgl_penjualan)->format('d-m-Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-muted text-center">Belum ada data penjualan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- History Detail Penjualan -->
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3>History Terakhir <b>Detail Penjualan</b></h3>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Admin</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($history_terakhir_detail_penjualan as $no => $d)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $d->barang->nama_barang ?? '-' }}</td>
                                        <td>{{ $d->jumlah }}</td>
                                        <td>{{ $d->penjualan->admin->nama_admin ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($d->penjualan->tgl_penjualan)->format('d-m-Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-muted text-center">Belum ada detail penjualan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS tambahan -->
<style>
.card-box {
    min-height: 150px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform .2s;
}
.card-box:hover {
    transform: translateY(-5px);
}
.card-icon {
    font-size: 40px;
    opacity: 0.4;
}
.info-link {
    display: inline-block;
    color: #fff;
    text-decoration: none;
    font-weight: 500;
}
.info-link:hover {
    text-decoration: underline;
}
</style>
@endsection
