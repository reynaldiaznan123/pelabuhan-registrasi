@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <i class="c-icon material-icons">search</i> Pencarian
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="search-engine">
                        <div class="input-group">
                            <input type="text" name="no_kta" class="form-control" placeholder="No. KTA">
                            <input type="text" name="no_regu" class="form-control" placeholder="No. Regu">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                            </div>
                            <div class="input-group-append">
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('library-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" integrity="sha256-2bAj1LMT7CXUYUwuEnqqooPb1W0Sw0uKMsqNH0HwMa4=" crossorigin="anonymous">
@endpush

@push('library-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js" integrity="sha256-2RS1U6UNZdLS0Bc9z2vsvV4yLIbJNKxyA4mrx5uossk=" crossorigin="anonymous"></script>
@endpush

@push('scripts')
<script>
$('#search-engine').submit((e) => {
    e.preventDefault();
    if ($('input[name="no_kta"]').val() == '') {
        alert('Mohon isi no kta!');
        return;
    }
    if ($('input[name="no_regu"]').val() == '') {
        alert('Mohon isi no regu!');
        return;
    }

    const btn = $(e.currentTarget).find('button[type="submit"]');
    $.ajax({
        url: '{{ route('employe::check') }}',
        dataType: 'json',
        data: {
            nokta: $('input[name="no_kta"]').val(),
            noregu: $('input[name="no_regu"]').val()
        },
        beforeSend: function() {
            btn.val('Loading...').prop('disabled', true);
        },
        success: function(res) {
            btn.val('Tampilkan').prop('disabled', false);
            if (res.status === 0) {
                Swal.fire({
                    title: 'Pencarian anggota',
                    text: 'Anggota ini belum terdaftar',
                    type: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Daftarkan!',
                    cancelButtonText: 'Lewati'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = '{{ route('employe::create') }}'
                    }
                });
            } else {
                window.location.href = '{{ url('employe/edit') }}/' + res.id
            }
        }
    })
});
</script>
@endpush
