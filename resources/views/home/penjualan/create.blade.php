@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Tambah Data Penjualan</h1>
    </div>
  </div>

  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            <form action="{{ route('penjualan.store') }}" method="POST">
              @csrf

              <div class="mb-3">
                <label class="form-label">Tanggal Penjualan</label>
                <input type="date" class="form-control" name="tgl_penjualan" required>
              </div>

              <div class="mb-3">
                <label class="form-label">ID Admin</label>
                <input type="number" class="form-control" name="id_admin" required>
              </div>

              <div class="mb-3">
              <label class="form-label">Diskon (%)</label>
              <input 
                  type="number" 
                  id="diskon" 
                  class="form-control" 
                  name="diskon" 
                  placeholder="Isi jika ada diskon (misal 10)"
                  min="0" 
                  max="100">
            </div>


              <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" id="harga" class="form-control" name="harga" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Total Harga Setelah Diskon</label>
                <input type="text" id="total_display" class="form-control" readonly>
                <input type="hidden" id="total" name="total">
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
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
          let diskon = parseFloat(diskonInput.value) || 0;
          let total = harga - (harga * diskon / 100);
          totalHidden.value = total;
          totalDisplay.value = formatRupiah(total);
      }

      hargaInput.addEventListener('input', hitungTotal);
      diskonInput.addEventListener('input', hitungTotal);
  });
</script>
@endsection
