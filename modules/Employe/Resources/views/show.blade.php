@extends('app')

@section('content')

<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td class="border-0"><b>No. Registrasi</b></td>
                <td class="border-0">{{ $row->noreg }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>No. KTA</b></td>
                <td class="border-0">{{ $row->nokta }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>NIK</b></td>
                <td class="border-0">{{ $row->noktp }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Nama Anggota</b></td>
                <td class="border-0">{{ $row->nama }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Tempat Lahir / Tgl Lahir</b></td>
                <td class="border-0">{{ $row->tmplahir }} / {{ date('d F Y', strtotime($row->tgllahir)) }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Usia</b></td>
                <td class="border-0" id="usia"></td>
            </tr>
            <tr>
                <td class="border-0"><b>Agama</b></td>
                <td class="border-0">{{ ucfirst($row->agama) }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Kabupaten</b></td>
                <td class="border-0">{{ $row->kabupaten }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Kecamatan</b></td>
                <td class="border-0">{{ $row->kecamatan }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Kelurahan</b></td>
                <td class="border-0">{{ $row->kelurahan }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Alamat</b></td>
                <td class="border-0">{{ $row->alamat }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Golongan Darah</b></td>
                <td class="border-0">{{ strtoupper($row->goldarah) }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Pendidikan Formal</b></td>
                <td class="border-0">{{ strtoupper($row->pendidikan) }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Pendidikan Non Formal</b></td>
                <td class="border-0">{{ $q1->kursus }}</td>
            </tr>
            @foreach ($q2 as $item)
                <tr>
                    <td class="border-0"></td>
                    <td class="border-0">{{ $row->kursus }}</td>
                </tr>
            @endforeach
            <tr>
                <td class="border-0"><b>Sertifikasi</b></td>
                <td class="border-0">{{ $q1->sertifikasi }}</td>
            </tr>
            @foreach ($q2 as $item)
                <tr>
                    <td class="border-0"></td>
                    <td class="border-0">{{ $row->sertifikasi }}</td>
                </tr>
            @endforeach
            <tr>
                <td class="border-0"><b>Ukuran Baju</b></td>
                <td class="border-0">{{ strtoupper($row->baju) }}</td>
            </tr>
            <tr>
                <td class="border-0"><b>Ukuran Celana</b></td>
                <td class="border-0">{{ $row->celana ? $row->celana . ' CM' : null }} </td>
            </tr>
            <tr>
                <td class="border-0"><b>Ukuran Sepatu</b></td>
                <td class="border-0">{{  $row->sepatu ? $row->sepatu . ' CM' : null }}</td>
            </tr>
        </table>
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('employe::edit', ['id' => $row->id]) }}" class="btn btn-warning">Ubah</a>
            <form action="{{ route('employe::remove', ['id' => $row->id]) }}" class="mx-2">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            <a href="{{ route('employe::index') }}" class="btn btn-secondary">Tutup</a>
        </div>
    </div>
</div>

@endsection

@push('library-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
@endpush

@push('scripts')
<script>
const start = moment();
const end = moment('{{ $row->tgllahir }}');
$('#usia').html(start.diff(end, 'years'));
</script>
@endpush
