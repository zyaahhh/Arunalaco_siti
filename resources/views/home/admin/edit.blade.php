@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
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
                <div class="alert alert-info">
                    {{session('success')}}
                </div>
                @endif
                <h3>Edit User</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update', $admin->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Admin</label>
                        <input type="text" class="form-control" name="nama_admin"
                        value="{{ old('nama_admin', $admin->nama_admin) }}" />
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username"
                        value="{{ old('username', $admin->username) }}" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password"
                        value="{{ old('password', $admin->password) }}" />
                    </div>

                     <div class="mb-3">
                        <label class="form-label">No Telp</label>
                        <input type="text" class="form-control" name="no_telp"
                        value="{{ old('no-telp', $admin->no_telp) }}" />
                    </div>

                  <button class="btn btn-primary">Simpan</button>
                  <a class="btn btn-success" href="{{ route('admin.index') }}">Kembali ke index</a>
                </form>
            </div>
          </div>
          </div>
         </div>
        </section>
</div>
@endsection
