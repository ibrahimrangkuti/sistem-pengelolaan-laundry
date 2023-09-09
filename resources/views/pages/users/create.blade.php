@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
    <a href="{{ route('users.index') }}" class="btn btn-danger mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
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
                                                {{ old('outlet') == $outlet->id ? 'selected' : '' }}>{{ $outlet->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="{{ old('nama') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-control"
                                        data-placeholder="Pilih Role">
                                        <option></option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}"
                                                {{ old('role') == $role ? 'selected' : '' }}>{{ Str::ucfirst($role) }}
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
