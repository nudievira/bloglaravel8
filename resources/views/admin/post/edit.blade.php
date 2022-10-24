@extends('template_backend.home')
@section('sub-judul', 'Update Post')
@section('content')

@if (count($errors)>0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

<form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
<div class="card-body">
    <div class="form-group">
      <label>Judul</label>
      <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="category_id" id="">
            <option value="" holder>Pilih Kategori</option>
            @foreach ($category as $result)
            <option value="{{ $result->id }}"
                @if($result->id == $post->category_id)
                    selected
                @endif
                >{{ $result->name }}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Pilih Tags</label>
        <select class="form-control select2" multiple="" name="tags[]">
          @foreach ($tags as $tag)
          <option value="{{ $tag->id }}"
          @foreach ($post->tags as $value)
              @if($tag->id == $value->id)
                selected
              @endif
          @endforeach
          >{{ $tag->name }}</option> 
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>konten</label>
        <input type="text" class="form-control" name="content" value="{{ $post->content }}">
      </div>

      <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" class="form-control" name="gambar" value="{{ $post->gambar }}">
      </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan Kategori</button>
    </div>
  
</div>
</form>
@endsection