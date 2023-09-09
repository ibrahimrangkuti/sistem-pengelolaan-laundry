@extends('layouts.app')

@section('title', 'Ubah Pelanggan')

@section('content')
    <a href="{{ route('customers.index') }}" class="btn btn-danger mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="{{ $customer->nama }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control">{{ $customer->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                        data-placeholder="Pilih Jenis Kelamin">
                                        <option></option>
                                        <option value="L" {{ $customer->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki
                                            -
                                            Laki</option>
                                        <option value="P" {{ $customer->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp" class="form-label">Telepon</label>
                                    <input type="number" name="telp" id="telp" class="form-control"
                                        value="{{ $customer->telp }}">
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

@push('script')
    <script>
        $('select.form-control').select2({
            theme: 'bootstrap4',
            placeholder: $(this).data('placeholder'),
        });
    </script>
@endpush
