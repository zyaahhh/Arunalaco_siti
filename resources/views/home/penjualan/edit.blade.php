@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Edit Data Penjualan</h1>
    </div>
  </div>

  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label class="form-label">Tanggal Penjualan</label>
                <input type="date" class="form-control" name="tgl_penjualan"
                       value="{{ old('tgl_penjualan', $penjualan->tgl_penjualan) }}" required>
              </div>

          
              <div class="mb-3">
                <label class="form-label">Pilih Nama Admin</label>
                <select class="form-control" name="id_admin" required>
                  <option value="">Pilih Nama Admin</option>
                  @foreach($admin as $a)
                    <option value="{{ $a->id }}"
                      {{ $a->id == $penjualan->id_admin ? 'selected' : '' }}>
                      {{ $a->nama_admin }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Diskon (%)</label>
                <input type="number" id="diskon" class="form-control" name="diskon"
                       value="{{ old('diskon', $penjualan->diskon) }}"
                       placeholder="Isi jika ada diskon (opsional)" min="0" max="100">
              </div>

              <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" id="harga" class="form-control" name="harga"
                       value="{{ old('harga', $penjualan->harga) }}" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Total Harga Setelah Diskon</label>
                <input type="text" id="total_display" class="form-control" readonly>
                <input type="hidden" id="total" name="total"
                       value="{{ old('total', $penjualan->total) }}">
                </div>

              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ route('penjualan.index') }}" class="btn btn-success">Kembali</a>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const hargaInput = document.getElementById('harga');
      const diskonInput = document.getElementById('diskon');
      const totalDisplay = document.getElementById('total_display');
      const totalHidden = document.getElementById('total');

      function formatRupiah(angka) {
          return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(angka);
      }

      function hitungTotal() {
          let harga = parseFloat(hargaInput.value) || 0;
          let diskon = parseFloat(diskonInput.value) || 0; // kalau kosong = 0
          let total = harga - (harga * diskon / 100);
          totalHidden.value = total;
          totalDisplay.value = formatRupiah(total);
      }

      hargaInput.addEventListener('input', hitungTotal);
      diskonInput.addEventListener('input', hitungTotal);
      hitungTotal(); // langsung tampil saat halaman dibuka
  });
</script>
@endsection
