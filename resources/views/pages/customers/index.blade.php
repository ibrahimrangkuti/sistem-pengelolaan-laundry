@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')
    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Pelanggan</a>
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
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td width="5%">{{ $loop->iteration }}</td>
                                        <td>{{ $customer->nama }}</td>
                                        <td>{{ $customer->alamat }}</td>
                                        <td>{{ $customer->jenis_kelamin }}</td>
                                        <td>{{ $customer->telp }}</td>
                                        <td width="15%">
                                            <a href="{{ route('customers.edit', $customer->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('customers.destroy', $customer->id) }}"
                                                class="btn btn-danger btn-sm" data-confirm-delete="true"><i
                                                    class="fas fa-trash"></i></a>
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
