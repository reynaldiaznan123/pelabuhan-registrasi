@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Pengguna
    </div>
    <div class="card-body">
        <form action="{{ route('authentication::update', ['id' => $row->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username<span class="text-required">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" value="{{ $row->username }}" placeholder="Username..." readonly>
                    @error('username')
                        <div class="invalid-data">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Kata Sandi<span class="text-required">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="password" name="password" placeholder="Kata sandi...">
                    @error('password')
                        <div class="invalid-data">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="passconf" class="col-sm-3 col-form-label">Konfirmasi Kata Sandi<span class="text-required">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="passconf" name="passconf" placeholder="Konfirmasi kata sandi...">
                    @error('passconf')
                        <div class="invalid-data">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama<span class="text-required">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $row->username }}" placeholder="Nama...">
                    @error('nama')
                        <div class="invalid-data">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger mx-2">Ulang</button>
                <a href="{{ route('authentication::index') }}" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
