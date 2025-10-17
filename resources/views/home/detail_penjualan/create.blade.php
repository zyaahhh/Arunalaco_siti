@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Tambah Data Detail Penjualan</h1>
    </div>
  </div>

  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            <form action="{{ route('detail_penjualan.store') }}" method="POST">
              @csrf

           
              <div class="mb-3">
                <label class="form-label">Tgl Penjualan</label>
                <select class="form-control" name="id_penjualan" required>
                  <option value="">Pilih Penjualan </option>
                  @foreach($penjualan as $p)
                    <option value="{{ $p->id }}">
                      {{ $p->id }} - {{ \Carbon\Carbon::parse($p->tgl_penjualan)->format('d M Y') }}
                    </option>
                  @endforeach
                </select>
              </div>

            
              <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <select class="form-control" name="id_barang" required>
                  <option value=""> Pilih Barang</option>
                  @foreach($barang as $b)
                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                  @endforeach
                </select>
              </div>

              
              <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" id="jumlah" class="form-control" name="jumlah" min="1" required>
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('detail_penjualan.index') }}" class="btn btn-success">Kembali</a>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
