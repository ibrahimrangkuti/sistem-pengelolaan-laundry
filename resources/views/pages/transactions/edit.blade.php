@extends('layouts.app')

@section('title', 'Ubah Transaksi')

@section('content')
    <a href="{{ route('transactions.index') }}" class="btn btn-danger mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('transactions.update', $transaction->kode_transaksi) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            @if (Auth::user()->role == 'admin')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="outlet_id" class="form-label">Outlet</label>
                                        <select name="outlet_id" id="outlet_id" class="form-control"
                                            data-placeholder="Pilih Outlet">
                                            <option></option>
                                            @foreach ($outlets as $outlet)
                                                <option value="{{ $outlet->id }}"
                                                    {{ $transaction->outlet_id == $outlet->id ? 'selected' : '' }}>
                                                    {{ $outlet->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-{{ Auth::user()->role == 'admin' ? '6' : '12' }}">
                                <div class="form-group">
                                    <label for="customer_id" class="form-label">Pelanggan</label>
                                    <select name="customer_id" id="customer_id" class="form-control"
                                        data-placeholder="Pilih Pelanggan">
                                        <option></option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}"
                                                {{ $transaction->customer_id == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_transaksi" class="form-label">Tgl. Transaksi</label>
                                    <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control"
                                        value="{{ $transaction->tgl_transaksi }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batas_waktu" class="form-label">Batas Waktu</label>
                                    <input type="datetime-local" name="batas_waktu" id="batas_waktu" class="form-control"
                                        value="{{ $transaction->batas_waktu }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="biaya_tambahan" class="form-label">Biaya Tambahan</label>
                                    <input type="number" name="biaya_tambahan" id="biaya_tambahan" class="form-control"
                                        value="{{ $transaction->biaya_tambahan }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="diskon" class="form-label">Diskon</label>
                                    <input type="number" name="diskon" id="diskon" class="form-control"
                                        value="{{ $transaction->diskon }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pajak" class="form-label">Pajak</label>
                                    <input type="number" name="pajak" id="pajak" class="form-control"
                                        value="{{ $transaction->pajak }}">
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
@endsection
