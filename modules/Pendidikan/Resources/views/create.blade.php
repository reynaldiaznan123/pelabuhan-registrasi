@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Pendidikan
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('pendidikan::store') }}" method="POST">
            @csrf

            <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Judul Pendidikan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Judul pendidikan...">
                    @error('title')
                        <div class="invalid-data">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('pendidikan::index') }}" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
