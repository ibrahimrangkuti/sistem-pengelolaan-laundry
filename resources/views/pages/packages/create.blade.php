@extends('layouts.app')

@section('title', 'Tambah Paket')

@section('content')
    <a href="{{ route('packages.index') }}" class="btn btn-danger mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('packages.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="outlet_id" class="form-label">Outlet</label>
                                    <select name="outlet_id" id="outlet_id" class="form-control"
                                        data-placeholder="Pilih Outlet">
                                        <option></option>
                                        @foreach ($outlets as $outlet)
                                            <option value="{{ $outlet->id }}"
                                                {{ old('outlet_id') == $outlet->id ? 'selected' : '' }}>{{ $outlet->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_paket" class="form-label">Nama</label>
                                    <input type="text" name="nama_paket" id="nama_paket" class="form-control"
                                        value="{{ old('nama_paket') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga" class="form-label">Harga</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" name="harga" id="harga"
                                            aria-describedby="basic-addon1" value="{{ old('harga') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <select name="jenis" id="jenis" class="form-control"
                                        data-placeholder="Pilih Jenis">
                                        <option></option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type }}"
                                                {{ old('jenis') == $type ? 'selected' : '' }}>{{ Str::ucfirst($type) }}
                                            </option>
                                        @endforeach
                                    </select>
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
