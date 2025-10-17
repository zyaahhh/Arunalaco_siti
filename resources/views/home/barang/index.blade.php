@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang </h1>
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
                <a class="btn btn-primary" href="{{route('barang.create')}}">
                  <i class="fas fa-plus"></i>Tambah Barang</a>
            </h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama barang</th>
                            <th>Harga</th>
                            <th>Stok </th>
                            <th>Satuan</th>
                            <th>Warna</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $b)
                        <tr>
                               <td>{{$loop->iteration}}</td>
                            <td>
                                @empty($b->foto)
                                <img src="{{url('image/nophoto.jpg')}}" alt="" class="rounded"
                                style="width: 100%; max-width:100px; height:auto">
                                @else
                                 <img src="{{url('image')}}/{{$b->foto}}" alt=""
                                  class="rounded" style="width: 100%; max-width:100px; height:auto">
                                  @endempty
                            </td>
                        <td>{{$b->nama_barang}}</td>
                        <td>{{$b->harga}}</td>
                        <td>{{$b->stok}}</td>
                        <td>{{$b->satuan}}</td>
                        <td>{{$b->warna}}</td>
                    <td>
                     <a class="btn btn-warning" href="{{route('barang.edit', $b->id)}}">
                      <i class="fas fa-edit"></i>Edit</a>
                      <!-- Button trigger modal -->
                      <a class="btn btn-danger"  href="{{route('barang.destroy', $b->id)}}"
                      onclick="return confirm('Apakah anda yakin mau hapus?')">
                        <i class="fas fa-trash"></i>Hapus</a>

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
