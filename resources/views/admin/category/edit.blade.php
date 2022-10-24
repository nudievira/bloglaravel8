@extends('template_backend.home')
@section('sub-judul', 'Update Kategori')
@section('content')

@if (count($errors)>0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

<form action="{{ route('category.update', $category->id) }}" method="post">
    @csrf
    @method('patch')
<div class="card-body">
    <div class="form-group">
      <label>Default Input Text</label>
      <input type="text" class="form-control" value="{{ $category->name }}" name="name">
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan Kategori</button>
    </div>
  
</div>
</form>
@endsection