@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Data Pengguna
    </div>
    <div class="card-body">
        <a href="{{ route('authentication::create') }}" class="btn btn-primary">Tambah</a>
        <table class="table table-hover" id="user-list">
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </table>
    </div>
</div>
@endsection

@push('library-styles')
<link rel="stylesheet" href="{{ asset('vendors/DataTables/datatables.min.css') }}"/>
@endpush

@push('library-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="{{ asset('vendors/DataTables/datatables.min.js') }}" crossorigin="anonymous"></script>
@endpush
@push('scripts')
{{-- <script src="{{ mix('js/employe.js') }}"></script> --}}
<script>
$('#user-list').DataTable({
    serverside: true,
    processing: true,
    ajax: {
        url: '{{ route('authentication::index') }}',
    },
    columns: [
        { data: 'name', name: 'name' },
        { data: 'action', name: 'action' }
    ]
});
</script>
@endpush
