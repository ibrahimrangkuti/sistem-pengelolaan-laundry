@extends('layouts.app')

@section('title', 'Data Pengguna')

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Pengguna</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Outlet</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td width="5%">{{ $loop->iteration }}</td>
                                        <td>{{ $user->outlet ? $user->outlet->nama : 'Tidak ada' }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ Str::ucfirst($user->role) }}</td>
                                        <td width="15%">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger btn-sm"
                                                data-confirm-delete="true"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
