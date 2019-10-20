@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Pendidikan
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end">
            <a href="{{ route('pendidikan::create') }}" class="btn btn-secondary">Tambah</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection


