@extends('layouts.main')

@section('data')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <h1>Data Product</h1>
        </div>
        @if (Auth::user()->roles == 'Admin')
        <div class="col-md-2">
            <a href="/product-create"class="btn btn-primary"><i data-feather="plus-square"></i></a>
        </div>
        @endif
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ message }}</p>
</div>

@endif

<div class="tabel-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Product</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                @if (Auth::user()->roles == 'Admin')
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $a)
            <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->deskripsi }}</td>
                <td><img src="/file/{{ $a->file }}" alt="" style="height: 50px; width: 50px;"></td>
                {{-- <td><img src="{{ asset('storage/gambar/'. $a->file) }}" style="height: 50px; width: 50px;"></td> --}}
                <td>
                    @if (Auth::user()->roles == 'Admin')
                    <a href="/product-edit/{{ $a->id }}" class="btn btn-warning"><i data-feather="edit"></i></a>
                    <a href="/product-delete/{{ $a->id }}" class="btn btn-danger"><i data-feather="trash"></i></a>
                    @endif
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="3">Data Tidak Ada</td>
            </tr>

            @endforelse
        </tbody>

    </table>
</div>

@endsection
