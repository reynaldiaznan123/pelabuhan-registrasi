@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Rekapitulasi
    </div>
    <div class="card-body">
        <div class="btn-group mb-4">
            <button type="type" data-type="hari" class="btn btn-info btn-rekap">Hari</button>
            <button type="type" data-type="minggu" class="btn btn-secondary btn-rekap">Minggu</button>
            <button type="type" data-type="umur" class="btn btn-primary btn-rekap">Umur</button>
        </div>
        <div class="form-action">
            <div class="item-group" id="hari">
                <input type="text" class="form-control" name="rekap_hari">
            </div>
            <div class="item-group" id="minggu">

            </div>
            <div class="item-group" id="umur">
                <div class="input-group">
                    <input type="number" class="form-control" name="rekap_umur">
                    <div class="input-group-append">
                        <span class="input-group-text">Thn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.item-group:not(:last-child) {
    margin-bottom: 8px;
}
</style>
@endpush

@push('scripts')
<script>
$('.item-group').slideUp(320);
$('.btn-rekap').click((e) => {
    const type = $(e.currentTarget).data('type');
    $('.item-group').slideUp('fast');
    $('.item-group#' + type).slideDown(320);
});
</script>
@endpush
