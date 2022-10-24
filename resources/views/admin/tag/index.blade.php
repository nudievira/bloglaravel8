@extends('template_backend.home')
@section('sub-judul', 'Tags')
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
    <a href="{{ route('tag.create') }}" class=" btn btn-info btn-sm">Tambah Tags</a>
    <div class="row">
        <div></div>
    
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Tags</th>
                <th>Action</th>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($tag as $hasil => $result)
                <tr>
                    <td>{{ $hasil + $tag->firstItem() }}</td>
                    <td>{{ $result->name }}</td>
                    <td>
                        <form action="{{ route('tag.destroy', $result->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('tag.edit', $result->id) }}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>    
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tag->links() }}
        </div>        
</div>
@endsection
