@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Data Pengguna
    </div>
    <div class="card-body">
        <a href="{{ route('authentication::create') }}">Tambah</a>
        <table class="table table-hover">
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </table>
    </div>
</div>
@endsection
