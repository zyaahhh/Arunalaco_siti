@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
                @if (session('success'))
                <div class="alert alert-info">
                    {{session('success')}}
                </div>
                @endif
                <h3>Table Barang</h3>
            </h3>
            </div>
            <div class="card-body">
                <form action="{{route('barang.update', $barang->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($barang->foto) && !empty($barang->foto))
                    <img src="{{url('image/' . $barang->foto)}}" alt="" class="rounded"
                    style="width:100%; max-width: 100px; height:auto;">
                    @endif
                    <label for="" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto" value="{{$barang->foto}}" />
                    @error('foto')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                        <label form="" class="form-label">nama barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="{{$barang->nama_barang}}" >
                     @error('nama_barang')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>

                     <div class="mb-3">
                        <label form="" class="form-label">Harga </label>
                        <input type="number" class="form-control" name="harga" id="harga"value="{{$barang->harga}}" />
                        @error('harga')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label form="" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" id="stok"value="{{$barang->stok}}" />
                     @error('stok')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label form="" class="form-label">Satuan</label>
                        <input type="number" class="form-control" name="satuan" id="satuan"value="{{$barang->satuan}}" />
                    @error('satuan')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>

                                      <div class="mb-3">
                        <label for=""class="form-label">Warna</label>
                        <select class= "form-control" name="warna" id="warna">
                          <option value="">Pilih Warna</option>

                          <option value="pink">Pink</option>
                          <option value="putih">Putih</option>
                            <option value="biru">Biru</option>
                            <option value="coklat">Coklat</option>
                </select>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <a class="btn btn-warning" href="{{route('barang.index')}}">Kembali ke index</a>
                </form>
            </div>
          </div>
          </div>
         </div>
        </section>

        </div>
@endsection
