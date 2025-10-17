@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Admin</h1>
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
                <h3>Table Admin
                  <a class= "btn btn-primary" href="{{route('admin.create')}}">
                <i class="fas fa-plus"></i>Tambah Admin</a>
            </h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Admin</th>
                            <th>Username</th>
                            <th>No Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $a)
                        <td>{{$loop->iteration}}</td>
                        <td>{{$a->nama_admin}}</td>
                         <td>{{$a->username}}</td>
                        <td>{{$a->no_telp}}</td>
                    <td>
                  <a class="btn btn-warning" href="{{route('admin.edit', $a->id)}}">
                      <i class="fas fa-edit"></i>Edit</a>
                      <!-- Button trigger modal -->
                      <a class="btn btn-danger" href="{{route('admin.destroy', $a->id)}}"
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
