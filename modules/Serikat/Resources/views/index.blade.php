@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Serikat Pekerjaan
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end">
            <a href="{{ route('serikat::create') }}" class="btn btn-secondary">Tambah</a>
        </div>
        <table class="table table-hover" id="serikat-list">
            <thead>
                <tr>
                    <th>Nama Serikat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
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
$('#serikat-list').DataTable({
    serverside: true,
    processing: true,
    ajax: {
        url: '{{ route('serikat::index') }}',
    },
    columns: [
        { data: 'title', name: 'title' },
        { data: 'action', name: 'action' }
    ]
});
</script>
@endpush
