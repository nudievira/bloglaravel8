@extends('template_backend.home')
@section('sub-judul', 'User')
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
    <a href="{{ route('user.create') }}" class=" btn btn-info btn-sm">Tambah Anggotaa</a>
    <div class="row">
        <div></div>
    
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Email</th>
                <th>Level</th>
                <th>Action</th>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($user as $hasil)
                <tr>
                    <td>{{ $hasil->id }}</td>
                    <td>{{ $hasil->name }}</td>
                    <td>{{ $hasil->email }}</td>
                    <td>
                        @if ($hasil->tipe)
                        <h6><span class="badge badge-info">Admin</span></h6>                        @else
                        <h6><span class="badge badge-warning">User</span></h6>
                        @endif
                    </td>
                    <td>
                        <form action="#" method="post">
                            @csrf
                            @method('delete')
                            <a href="#" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>    
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $user->links() }}
        </div>        
</div>
@endsection
