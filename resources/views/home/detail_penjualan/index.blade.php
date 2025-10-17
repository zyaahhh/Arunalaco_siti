@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Detail Penjualan</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">

          <div class="card-header">
            @if (session('success'))
              <div class="alert alert-info">{{ session('success') }}</div>
            @endif

            <h3>Table Detail Penjualan</h3>
            <a class="btn btn-primary" href="{{ route('detail_penjualan.create') }}">
              <i class="fas fa-plus"></i> Tambah Detail Penjualan
            </a>
          </div>

          <div class="card-body">
            <table id="example1" class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tanggal Penjualan</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($detail_penjualan as $dp)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $dp->penjualan->tgl_penjualan }}</td>
                  <td>{{ $dp->barang->nama_barang }}</td>
                  <td>{{ $dp->jumlah }}</td>
                  <td>
                    <a class="btn btn-warning" href="{{ route('detail_penjualan.edit', $dp->id) }}">
                      <i class="fas fa-edit"></i> Edit
                    </a>

                    <form action="{{ route('detail_penjualan.destroy', $dp->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Apakah anda yakin mau hapus?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger">
                        <i class="fas fa-trash"></i> Hapus
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>
@endsection
