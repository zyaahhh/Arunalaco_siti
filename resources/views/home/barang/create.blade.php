@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Barang</h1>
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
                <h3>Table Barang
                </h3>
            </div>
            <div class="card-body">
  <form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for=""class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto"
        aria-describedby="helpid" placeholder=""/>
    </div>
         <div class="mb-3">
        <label for=""class="form-label">Nama_barang</label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang"
        aria-describedby="helpid" placeholder=""value="{{old('nama_barang')}}" />
    </div>
        @error('nama_barang')
         <div class="alert alert-danger ">{{$message}}</div>
         @enderror
         <div class="mb-3">
        
         <div class="mb-3">
        <label for=""class="form-label">Harga </label>
        <input type="number" class="form-control" name="harga" id=""
        aria-describedby="helpid" placeholder=""value="{{old('harga')}}" />
    </div>
        @error('harga')
         <div class="alert alert-danger ">{{$message}}</div>
         @enderror
         <div class="mb-3">
        <label for=""class="form-label">Stok </label>
        <input type="number" class="form-control" name="stok" id=""
        aria-describedby="helpid" placeholder=""value="{{old('stok')}}" />
    </div>
        @error('stok')
         <div class="alert alert-danger ">{{$message}}</div>
         @enderror
         <div class="mb-3">
        <label for=""class="form-label">Satuan</label>
        <input type="number" class="form-control" name="satuan" id=""
        aria-describedby="helpid" placeholder=""value="{{old('satuan')}}" />
    </div>
        @error('satuan')
         <div class="alert alert-danger ">{{$message}}</div>
         @enderror

         <div class="mb-3">
        <label for=""class="form-label">Warna</label>
        <select class= "form-control" name="warna" id="warna">
          <option value="">Pilih Warna</option>

          <option value="pink">Pink</option>
           <option value="putih">Putih</option>
            <option value="biru">Biru</option>
             <option value="coklat">Coklat</option>
</select>
    </div>
        @error('warna')
         <div class="alert alert-danger ">{{$message}}</div>
         @enderror
        <button class="btn btn-primary">Simpan</button>
        <a class="btn btn-success" href="{{route('barang.index')}}">Kembali ke index</a>
  </form>
</div>
</div>
</div>
</div>
</section>

</div>
@endsection
