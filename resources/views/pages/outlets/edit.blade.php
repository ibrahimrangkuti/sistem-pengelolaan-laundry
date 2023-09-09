@extends('layouts.app')

@section('title', 'Ubah Outlet')

@section('content')
    <a href="{{ route('outlets.index') }}" class="btn btn-danger mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('outlets.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="{{ $outlet->nama }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control">{{ $outlet->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="telp" class="form-label">Telepon</label>
                                    <input type="number" name="telp" id="telp" class="form-control"
                                        value="{{ $outlet->telp }}">
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
