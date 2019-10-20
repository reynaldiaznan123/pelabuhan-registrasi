@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Ubah Serikat Pekerjaan
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('serikat::update', ['id' => $data->id]) }}" method="POST">
            @csrf
            @method('put')

            <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Nama Serikat Pekerjaan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Nama serikat pekerjaan..." value="{{ $data->title }}">
                    @error('title')
                        <div class="invalid-data">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('serikat::index') }}" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
