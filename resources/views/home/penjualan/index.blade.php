@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Data Penjualan</h1>
      <a href="{{ route('penjualan.create') }}" class="btn btn-primary mt-2">Tambah Penjualan</a>
    </div>
  </div>

  <section class="content">
    <div class="card mt-3">
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tanggal</th>
              <th>ID Admin</th>
              <th>Harga</th>
              <th>Diskon</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($penjualan as $p)
              <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->tgl_penjualan }}</td>
                <td>{{ $p->id_admin }}</td>
                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                <td>{{ $p->diskon }}%</td>
                <td>Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                <td>
                  <a href="{{ route('penjualan.cetak', $p->id) }}" target="_blank" class="btn btn-success btn-sm">Cetak Struk</a>
                  <a href="{{ route('penjualan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('penjualan.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
@endsection
