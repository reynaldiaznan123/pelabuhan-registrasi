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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.0/b-flash-1.6.0/b-html5-1.6.0/b-print-1.6.0/kt-2.5.1/r-2.2.3/sc-2.0.1/sl-1.3.1/datatables.min.css"/>
@endpush

@push('library-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.0/b-flash-1.6.0/b-html5-1.6.0/b-print-1.6.0/kt-2.5.1/r-2.2.3/sc-2.0.1/sl-1.3.1/datatables.min.js"></script>
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
