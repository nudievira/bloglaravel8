@extends('template_backend.home')
@section('sub-judul', 'Kategori')
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


<div class="container">
    <a href="{{ route('category.create') }}" class=" btn btn-info btn-sm">Tambah Kategori</a>
    <div class="row">
        <div></div>
    
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Kategory</th>
                <th>Action</th>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($category as $hasil => $result)
                <tr>
                    <td>{{ $hasil + $category->firstItem() }}</td>
                    <td>{{ $result->name }}</td>
                    <td>
                        <form action="{{ route('category.destroy', $result->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('category.edit', $result->id) }}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>    
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $category->links() }}
        </div>        
</div>
@endsection
