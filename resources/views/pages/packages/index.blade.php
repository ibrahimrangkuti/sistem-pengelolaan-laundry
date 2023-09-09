@extends('layouts.app')

@section('title', 'Data Paket')

@section('content')
    <a href="{{ route('packages.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Paket</a>
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
                                    <th>Harga</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <td width="5%">{{ $loop->iteration }}</td>
                                        <td>{{ $package->outlet->nama }}</td>
                                        <td>{{ $package->nama_paket }}</td>
                                        <td>Rp{{ number_format($package->harga) }}</td>
                                        <td>{{ Str::ucfirst($package->jenis) }}</td>
                                        <td width="15%">
                                            <a href="{{ route('packages.edit', $package->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('packages.destroy', $package->id) }}"
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
