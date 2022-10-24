@extends('template_backend.home')
@section('sub-judul', 'Tambah User')
@section('content')

@if (count($errors)>0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

<form action="{{ route('user.store') }}" method="post">
    @csrf
<div class="card-body">
    <div class="form-group">
      <label>Nama User</label>
      <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label>Nama Email</label>
        <input type="email" class="form-control" name="email">
      </div>
  
      <div class="form-group">
        <label>Tipe User</label>
        <select class="form-select" name="tipe" aria-label="Default select example">
            <option selected>Pilih Jenis Jabatan</option>
            <option value="0">User</option>
            <option value="1">Admin</option>
          </select>
      </div>
  
      <div class="form-group">
        <label>Pasword</label>
        <input type="password" class="form-control" name="password">
      </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan User</button>
    </div>
  
</div>
</form>
@endsection