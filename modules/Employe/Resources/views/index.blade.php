@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Anggota Terdaftar
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end">
            <a href="{{ route('employe::create') }}" class="btn btn-secondary">Tambah</a>
        </div>
        <table class="table table-hover" id="serikat-list">
            <thead>
                <tr>
                    <th>No. REG</th>
                    <th>No. KTA / Regu</th>
                    <th>NIK</th>
                    <th>Nama</th>
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
        url: '{{ route('employe::index') }}',
    },
    columns: [
        { data: 'noreg', name: 'noreg' },
        { data: 'nokta', name: 'nokta' },
        { data: 'noktp', name: 'noktp' },
        { data: 'nama', name: 'nama' },
        { data: 'action', name: 'action' }
    ]
});
</script>
@endpush
