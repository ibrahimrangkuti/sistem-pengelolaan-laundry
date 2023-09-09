@extends('layouts.app')

@section('title', 'Transaksi #' . $transaction->kode_transaksi)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td>Outlet</td>
                                <td>:</td>
                                <td colspan="7">{{ $transaction->outlet->nama }}</td>
                            </tr>
                            <tr>
                                <td>Pelanggan</td>
                                <td>:</td>
                                <td colspan="7">{{ $transaction->customer->nama }}</td>
                            </tr>
                            <tr>
                                <td>Kasir</td>
                                <td>:</td>
                                <td colspan="7">{{ $transaction->user->nama }}</td>
                            </tr>
                            <tr>
                                <td>Kode Transaksi</td>
                                <td>:</td>
                                <td colspan="7" class="text-info">#{{ $transaction->kode_transaksi }}</td>
                            </tr>
                            <tr>
                                <td>Tgl. Transaksi</td>
                                <td>:</td>
                                <td colspan="7">{{ $transaction->tgl_transaksi }}</td>
                            </tr>
                            <tr>
                                <td>Batas Waktu</td>
                                <td>:</td>
                                <td colspan="7">{{ $transaction->batas_waktu }}</td>
                            </tr>
                            <tr>
                                <td>Tgl. Bayar</td>
                                <td>:</td>
                                <td colspan="7">{{ $transaction->tgl_bayar ? $transaction->tgl_bayar : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Biaya Tambahan</td>
                                <td>:</td>
                                <td>Rp{{ number_format($transaction->biaya_tambahan) }}</td>
                                <td>Diskon</td>
                                <td>:</td>
                                <td>{{ $transaction->diskon }}%</td>
                                <td>Pajak</td>
                                <td>:</td>
                                <td>{{ $transaction->pajak }}%</td>
                            </tr>
                            <tr class="font-weight-bold fs-1" style="font-size: 36px">
                                <td>Total</td>
                                <td>:</td>
                                <td colspan="7">
                                    Rp{{ number_format($transaction->total - ($transaction->total * $transaction->diskon) / 100 + ($transaction->total * $transaction->pajak) / 100 + $transaction->biaya_tambahan) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
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
                                <td>Dibayar</td>
                                <td>:</td>
                                <td colspan="4">
                                    @if ($transaction->dibayar)
                                        <span class="badge badge-success">Sudah dibayar</span>
                                    @else
                                        <span class="badge badge-danger">Belum dibayar</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Dibuat pada</td>
                                <td>:</td>
                                <td colspan="3">{{ $transaction->created_at }}</td>
                                <td>Terakhir diubah</td>
                                <td>:</td>
                                <td colspan="3">{{ $transaction->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('transactions.storeTransactionDetail', $transaction->kode_transaksi) }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="package_id" class="form-label">Paket</label>
                                    <select name="package_id" id="package_id" class="form-control"
                                        data-placeholder="Pilih Paket">
                                        <option></option>
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->nama_paket }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="qty" class="form-label">Jumlah</label>
                                    <input type="number" name="qty" id="qty" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                            Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Paket</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction_details as $transaction_detail)
                                    <tr>
                                        <td width="5%">{{ $loop->iteration }}</td>
                                        <td>{{ $transaction_detail->package->nama_paket }}</td>
                                        <td>{{ $transaction_detail->qty }}</td>
                                        <td>Rp{{ number_format($transaction_detail->subtotal) }}
                                        </td>
                                        <td class="font-italic">
                                            {{ $transaction_detail->keterangan ? $transaction_detail->keterangan : 'Tanpa keterangan' }}
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
