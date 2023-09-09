@extends('layouts.app')

@section('title', 'Data Outlet')

@section('content')
    <a href="{{ route('outlets.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Outlet</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($outlets as $outlet)
                                    <tr>
                                        <td width="5%">{{ $loop->iteration }}</td>
                                        <td>{{ $outlet->nama }}</td>
                                        <td>{{ $outlet->alamat }}</td>
                                        <td>{{ $outlet->telp }}</td>
                                        <td width="15%">
                                            <a href="{{ route('outlets.edit', $outlet->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('outlets.destroy', $outlet->id) }}"
                                                class="btn btn-danger btn-sm" data-confirm-delete="true"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
