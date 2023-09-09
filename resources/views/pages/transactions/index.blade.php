@extends('layouts.app')

@section('title', 'Data Transaksi')

@section('content')
    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Transaksi</a>
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
                                    <th>Pelanggan</th>
                                    <th>Kasir</th>
                                    <th>Kode Transaksi</th>
                                    <th>Tgl. Transaksi</th>
                                    <th>Batas Waktu</th>
                                    <th>Tgl. Bayar</th>
                                    <th>Status</th>
                                    <th>Dibayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td width="5%">{{ $loop->iteration }}</td>
                                        <td>{{ $transaction->outlet->nama }}</td>
                                        <td>{{ $transaction->customer->nama }}</td>
                                        <td>{{ $transaction->user->nama }}</td>
                                        <td class="text-info">#{{ $transaction->kode_transaksi }}</td>
                                        <td>{{ $transaction->tgl_transaksi }}</td>
                                        <td>{{ $transaction->batas_waktu }}</td>
                                        <td>{{ $transaction->tgl_bayar ? $transaction->tgl_bayar : '-' }}</td>
                                        <td>
                                            @if ($transaction->status == 'baru')
                                                <span class="badge badge-primary">Baru</span>
                                            @elseif($transaction->status == 'proses')
                                                <span class="badge badge-warning">Proses</span>
                                            @elseif($transaction->status == 'selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif($transaction->status == 'diambil')
                                                <span class="badge badge-info">Diambil</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($transaction->dibayar)
                                                <span class="badge badge-success">Dibayar</span>
                                            @else
                                                <span class="badge badge-danger">Belum Dibayar</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('transactions.detail', $transaction->kode_transaksi) }}"
                                                class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('transactions.edit', $transaction->kode_transaksi) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
