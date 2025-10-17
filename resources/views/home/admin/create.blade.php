@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Admin</h1>
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
                <h3>Table Admin
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.store')}}" method="post">
  <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for=""class="form-label">Nama Admin</label>
        <input type="text" class="form-control" name="nama_admin" id=""
        aria-describedby="helpid" placeholder=""value="{{old('nama_admin')}}" />
    </div>
        @error('nama_admin')
         <div class="alert alert-danger ">{{$message}}</div>
         @enderror

           <div class="mb-3">
        <label for=""class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id=""
        aria-describedby="helpid" placeholder=""value="{{old('username')}}" />
    </div>
        @error('username')
         <div class="alert alert-danger ">{{$message}}</div>
         @enderror
         <div class="mb-3">
        <label for=""class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id=""
        aria-describedby="helpid" placeholder=""value="{{old('password')}}" />
    </div>
        @error('password')
         <div class="alert alert-danger ">{{$message}}</div>
         @enderror

          <div class="mb-3">
        <label for=""class="form-label">No Telp</label>
        <input type="text" class="form-control" name="no_telp" id=""
        aria-describedby="helpid" placeholder=""value="{{old('no_telp')}}" />
    </div>
        @error('no_telp')
         <div class="alert alert-danger ">{{$message}}</div>
         @enderror
        <button class="btn btn-primary">Simpan</button>
        <a class="btn btn-success" href="{{route('admin.index')}}">Kembali ke index</a>
  </form>
</div>
</div>
</div>
</div>
</section>

</div>
@endsection
