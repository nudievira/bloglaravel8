@extends('template_backend.home')
@section('sub-judul', 'Post Sampah')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{ $message }}
  </div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger" role="alert">
    {{ $message }}
  </div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning" role="alert">
    {{ $message }}
  </div>
@endif
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Post</th>
                <th>Kategori</th>
                <th>Daftar Tags</th>
                <th>Gambar</th>
                <th>Action</th>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($post as $hasil => $result)
                <tr>
                    <td>{{ $hasil + $post->firstItem() }}</td>
                    <td>{{ $result->judul }}</td>
                    <td>{{ $result->category->name }}</td>
                    <td> @foreach ($result->tags as $tag)
                        <ul>
                            <li>{{ $tag->name }}</li>
                        </ul>
                        @endforeach
                    </td>
                    <td> <img src="{{ asset ($result->gambar)}}" class="img-fluid" style="width:50px"></td>
                    <td>
                        <form action="{{ route('hapus',$result->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('restore',$result->id) }}" class="btn btn-info">Restore</a>
                            <button type="submit" class="btn btn-danger">Delete</button>    
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $post->links() }}
        </div>        
</div>
@endsection
