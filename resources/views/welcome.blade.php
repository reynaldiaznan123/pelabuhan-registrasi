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
<link rel="stylesheet" href="{{ asset('vendors/sweetalert/sweetalert.min.css') }}" crossorigin="anonymous">
@endpush

@push('library-scripts')
<script src="{{ asset('vendors/sweetalert/sweetalert.all.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/inputmask/inputmask.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/inputmask/jquery.inputmask.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/validation/validate.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/validation/methods.min.js') }}" crossorigin="anonymous"></script>
@endpush

@push('scripts')
<script>
const elm = $('#search-engine');

elm.validate({
    rules: {
        no_kta: {
            required: true,
            minlength: 4,
            maxlength: 4,
            number: true
        },
        no_regu: {
            required: true,
            minlength: 3,
            maxlength: 3,
            number: true
        }
    },
    messages: {
        no_kta: {
            required: 'Mohon isi No. KTA!',
            minlength: 'No. KTA Minimal panjang karakter 4!',
            maxlength: 'No. KTA Maximal panjang karakter 4!',
            number: 'No. KTA harus angka!'
        },
        no_regu: {
            required: 'Mohon isi No. Regu!',
            minlength: 'No. Regu Minimal panjang karakter 3!',
            maxlength: 'No. Regu Maximal panjang karakter 3!',
            number: 'No. Regu harus angka!'
        }
    },
    errorPlacement: function(error, element) {
        // Add the `invalid-feedback` class to the error element
        error.addClass("invalid-feedback");

        const group = elm.find('> .input-group');
        if ($(group).next().hasClass('error')) {
            group.next().remove();
        }
        group.append(error);
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
    },
    submitHandler: function() {
        const btn = elm.find('button[type="submit"]');
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
    }
});
</script>
@endpush
