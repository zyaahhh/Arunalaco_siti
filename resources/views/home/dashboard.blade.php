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
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mdi mdi-cart-outline card-icon"></i>
                    <h2 class="mt-2 mb-1 fw-bold">{{ $total_penjualan }}</h2>
                    <p>Total Penjualan</p>
                    <a href="{{ route('penjualan.index') }}" class="info-link">More info <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Total Barang Terjual -->
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-success text-white card-box text-center">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mdi mdi-package-variant-closed card-icon"></i>
                    <h2 class="mt-2 mb-1 fw-bold">{{ $total_barang_terjual }}</h2>
                    <p>Total Barang Terjual</p>
                    <a href="{{ route('detail_penjualan.index') }}" class="info-link">More info <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Total Barang -->
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-info text-white card-box text-center">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mdi mdi-cube-outline card-icon"></i>
                    <h2 class="mt-2 mb-1 fw-bold">{{ $total_barang }}</h2>
                    <p>Total Barang</p>
                    <a href="{{ route('barang.index') }}" class="info-link">More info <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Total Admin -->
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-danger text-white card-box text-center">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="mdi mdi-account-multiple card-icon"></i>
                    <h2 class="mt-2 mb-1 fw-bold">{{ $total_admin }}</h2>
                    <p>Total Admin</p>
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

    <!-- Grafik Statistik -->
    <div class="row mt-4">
        <!-- Donut Chart -->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Komposisi Data</h4>
                    <canvas id="komposisiChart" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Line Chart -->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Trend Penjualan per Bulan</h4>
                    <canvas id="trendChart" height="200"></canvas>
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
    color: #fff;
    text-decoration: none;
    font-weight: 500;
}
.info-link:hover {
    text-decoration: underline;
}
</style>
@endsection

@push('scripts')
<script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
<script>
  // === Doughnut Chart: Komposisi Data ===
  (function(){
    const el = document.getElementById('komposisiChart');
    if(!el) return;

    const dataKomposisi = {!! json_encode(array_values($komposisi ?? [])) !!};
    const labelKomposisi = {!! json_encode(array_keys($komposisi ?? [])) !!};

    new Chart(el, {
      type: 'doughnut',
      data: {
        labels: labelKomposisi,
        datasets: [{
          data: dataKomposisi,
          backgroundColor: ['#9C6BFF','#00C9A7','#FF6B81','#3D8BFF'],
          hoverOffset: 10
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } }
      }
    });
  })();

  // === Line Chart: Trend Penjualan per Bulan ===
  (function(){
    const el = document.getElementById('trendChart');
    if(!el) return;

    const bulanLabels = {!! json_encode($bulan ?? []) !!};
    const dataPenjualan = {!! json_encode($penjualanPerBulan ?? []) !!};

    new Chart(el, {
      type: 'line',
      data: {
        labels: bulanLabels,
        datasets: [{
          label: 'Total Penjualan',
          data: dataPenjualan,
          borderColor: '#00C9A7',
          backgroundColor: 'rgba(0,201,167,0.1)',
          fill: true,
          tension: 0.3,
          pointRadius: 4
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { position: 'top' } },
        scales: {
          y: { beginAtZero: true, ticks: { precision: 0 } }
        }
      }
    });
  })();
</script>
@endpush
