@extends('app')

@section('content')
<div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="frame-card d-flex justify-content-center">
                    {{-- {{ $row->photo }} --}}
                    <img src="{{ asset('storage/' . str_replace('public', '', $row->photo)) }}" class="frame-image" alt="">
                    <img src="{{ asset('vectors/vector.jpg') }}" alt="">
                    <div class="frame-content">
                        <span>{{ $row->nama }}</span>
                        <span class="frame-dummy"></span>
                        <span>No. Reg {{ $row->noreg }}</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="frame-close" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.frame-card {
    position: relative;
}
.frame-content {
    position: absolute;
    bottom: 30px;
    font-size: 14px;
    text-align: center;
}
.frame-content span {
    display: block;
    color: #ffffff;
}
.frame-content span:last-child {
    font-weight: 500;
    font-size: 13px;
}
.frame-image {
    position: absolute;
    width: 125px;
    height: 125px;
    border-radius: 100%;
    top: 123px;
}
</style>
@endpush

@push('scripts')
<script>
$('#exampleModalCenter').modal('show');
$('#frame-close').click(() => {
    window.location.href = '{{ route('dashboard') }}';
});
</script>
@endpush
