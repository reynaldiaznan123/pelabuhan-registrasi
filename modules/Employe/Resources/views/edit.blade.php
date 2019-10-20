@extends('app')

@section('content')
<div class="card">
    <div class="card-header">
        Form Pendaftaran Karyawan
    </div>
    <div class="card-body">
        <div class="alert alert-info" role="alert">
            @if ($step == 1)
            <ol class="m-0">
                <li>Isi form dengan benar.</li>
                <li>Apabila menambahkan kursus maka sertifikasi akan bertambah jg.</li>
            </ol>
            @endif
        </div>
        <form action="{{ route('employe::update', ['id' => $row->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="form_step" value="{{ $step }}">

            @if ($step == 1)
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Anggota</label>
                <div class="col-sm-9">
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $row->nama }}" placeholder="Nama anggota...">
                    @error('nama')
                        <div class="invalid-data">
                            <span>{{ str_replace('nama', 'nama anggota', $message) }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">No. KTP / NIK</label>
                <div class="col-sm-9" id="target-content-2">
                    <input type="text" name="noktp" id="input-utama-sertifikasi" value="{{ $row->noktp }}" placeholder="NIK..." class="form-control">
                    @error('noktp')
                        <div class="invalid-data">
                            <span>{{ str_replace('noktp', 'nik', $message) }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="nokta" class="col-sm-3 col-form-label">No. KTA / Regu</label>
                <div class="col-sm-9">
                    <div class="d-xl-flex">
                        <div class="flex-md-grow-1">
                            <input type="text" id="nokta" name="nokta" class="form-control" value="{{ $row->nokta }}" placeholder="No. KTA...">
                            @error('nokta')
                                <div class="invalid-data">
                                    <span>{{ str_replace('nokta', 'no. kta', $message) }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="align-self-md-center px-3 py-2">
                            <span class="d-none d-lg-block">/</span>
                        </div>
                        <div>
                            <input type="text" name="regu" class="form-control" value="{{ $row->noregu }}" placeholder="Regu...">
                            @error('regu')
                                <div class="invalid-data">
                                    <span>{{ str_replace('regu', 'no. regu', $message) }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-9">
                    <select id="jabatan" name="jabatan" class="form-control select-custom" data-placeholder="Jabatan...">
                        <option></option>
                        <option value="KRK" @if($row->jabatan === 'KRK') selected @endif>KRK</option>
                        <option value="Wakil" @if($row->jabatan === 'Wakil') selected @endif>WAKIL</option>
                        <option value="Derek" @if($row->jabatan === 'Derek') selected @endif>DEREK / PILOT</option>
                        <option value="Anggota" @if($row->jabatan === 'Anggota') selected @endif>ANGGOTA</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alokasi</label>
                <div class="col-sm-9" id="alokasi">
                    <input type="text" name="alokasi" value="{{ $row->alokasi }}" id="alokasi" placeholder="Alokasi..." class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label for="tmplahir" class="col-sm-3 col-form-label">Tempat lahir / Tgl lahir</label>
                    <div class="col-sm-9">
                        <div class="d-xl-flex">
                            <div class="flex-md-grow-1">
                                <input type="text" id="tmplahir" name="tmplahir" value="{{ $row->tmplahir }}" class="form-control" placeholder="Tempat lahir...">
                            </div>
                            <div class="align-self-md-center px-3 py-2">
                                <span class="d-none d-lg-block">/</span>
                            </div>
                            <div>
                                <div class="input-group">
                                    <input type="text" disabled value="{{ $row->tgllahir }}" class="form-control">
                                    <input type="text" name="tgllahir" data-target-input="nearest" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="input[name='tgllahir']" placeholder="Tanggal lahir...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label for="usia" class="col-sm-3 col-form-label">Usia</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input type="text" id="usia" name="usia" class="form-control" placeholder="Umur." disabled>
                            <div class="input-group-append">
                                <span class="input-group-text">Thn</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label class="col-sm-3 col-form-label" for="status">Status</label>
                    <div class="col-sm-9">
                        <select id="status" name="status" class="form-control select-custom" data-placeholder="Status...">
                            <option></option>
                            <option value="belum kawin" @if($row->jabatan === 'belum kawin') selected @endif>Belum Kawin</option>
                            <option value="kawin" @if($row->jabatan === 'kawin') selected @endif>Kawin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                    <div class="col-sm-9">
                        <select id="agama" name="agama" class="form-control select-custom" data-placeholder="Agama...">
                            <option></option>
                            <option value="islam" @if(strtolower($row->agama) === 'islam') selected @endif>ISLAM</option>
                            <option value="hindu" @if(strtolower($row->agama) === 'hindu') selected @endif>HINDU</option>
                            <option value="budha" @if(strtolower($row->agama) === 'budha') selected @endif>BUDHA</option>
                            <option value="kristen protestan" @if(strtolower($row->agama) === 'kristen protestan') selected @endif>KRISTEN PROTESTAN</option>
                            <option value="katolik" @if(strtolower($row->agama) === 'katolik') selected @endif>KATOLIK</option>
                            <option value="kong hu cu" @if(strtolower($row->agama) === 'kong hu cu') selected @endif>KONG HU CU</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label for="goldarah" class="col-sm-3 col-form-label">Golongan Darah</label>
                    <div class="col-sm-9">
                        <select id="goldarah" name="goldarah" class="form-control select-custom" data-placeholder="Golongan darah...">
                            <option></option>
                            <option value="O Positif" @if(strtolower($row->goldarah) === 'o positif') selected @endif>O Positif</option>
                            <option value="O Negatif" @if(strtolower($row->goldarah) === 'o negatif') selected @endif>O Negatif</option>
                            <option value="A Positif" @if(strtolower($row->goldarah) === 'a positif') selected @endif>A Positif</option>
                            <option value="A Negatif" @if(strtolower($row->goldarah) === 'a negatif') selected @endif>A Negatif</option>
                            <option value="B Positif" @if(strtolower($row->goldarah) === 'b positif') selected @endif>B Positif</option>
                            <option value="B Negatif" @if(strtolower($row->goldarah) === 'b negatif') selected @endif>B Negatif</option>
                            <option value="AB Positif" @if(strtolower($row->goldarah) === 'ab positif') selected @endif>AB Positif</option>
                            <option value="AB Negatif" @if(strtolower($row->goldarah) === 'ab negatif') selected @endif>AB Negatif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan Formal</label>
                    <div class="col-sm-9">
                        <select id="pendidikan" name="pendidikan" class="form-control select-custom" data-placeholder="Pendidikan formal...">
                            <option></option>
                            <option value="SD" @if(strtolower($row->pendidikan) === 'sd') selected @endif>SD</option>
                            <option value="SLTP" @if(strtolower($row->pendidikan) === 'sltp') selected @endif>SLTP</option>
                            <option value="SLTA" @if(strtolower($row->pendidikan) === 'slta') selected @endif>SLTA / SEDERAJAT</option>
                            <option value="DIPLOMA" @if(strtolower($row->pendidikan) === 'diploma') selected @endif>DIPLOMA</option>
                            <option value="SARJANA" @if(strtolower($row->pendidikan) === 'sarjana') selected @endif>SARJANA</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label class="col-sm-3 col-form-label">Pend. Non Formal</label>
                    <div class="col-sm-9">
                        <div id="target-content-1">
                            <div class="input-group">
                                <input type="text" name="kursus[]" id="input-utama-kursus" placeholder="Kursus" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" id="add-input" class="btn btn-primary">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label class="col-sm-3 col-form-label">Sertifikasi</label>
                    <div class="col-sm-9" id="target-content-2">
                        <input type="text" name="sertifikasi[]" id="input-utama-sertifikasi" placeholder="Sertifikasi" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <textarea id="alamat" name="alamat" placeholder="Alamat" class="form-control mb-3" cols="30" rows="5">
                            {{ $row->alamat }}
                        </textarea>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <input type="text" name="rt" value="{{ $row->rt }}" class="form-control" placeholder="RT">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="rw" value="{{ $row->rw }}" class="form-control" placeholder="RW">
                            </div>
                        </div>
                        <input type="text" name="kelurahan" value="{{ $row->kelurahan }}" class="form-control mb-3" placeholder="Desa / Kelurahan">
                        <input type="text" name="kecamatan" value="{{ $row->kecamatan }}" class="form-control mb-3" placeholder="Kecamatan">
                        <input type="text" name="kabupaten" value="{{ $row->kabupaten }}" class="form-control" placeholder="Kabupaten">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="serikat" class="col-sm-3 col-form-label">Serikat Pekerja</label>
                <div class="col-sm-9">
                    <select id="serikat" name="serikat" class="form-control select-custom" data-placeholder="Serikat pekerjaan...">
                        <option></option>
                        @foreach ($serikats as $item)
                            <option value="{{ $item->id }}" @if($item->id === $row->serikat_id) selected @endif>{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('serikat')
                        <div class="invalid-data">
                            <span>{{ str_replace('serikat', 'serikat pekerjaan', $message) }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="ukuran_pakaian" class="col-sm-3 col-form-label">Ukuran Pakaian</label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-6">
                            <select name="baju" id="ukuran_pakaian" class="select-custom" data-placeholder="Ukuran baju...">
                                <option></option>
                                <option value="s" @if(strtolower($row->baju) === 's') selected @endif>S</option>
                                <option value="m" @if(strtolower($row->baju) === 'm') selected @endif>M</option>
                                <option value="l" @if(strtolower($row->baju) === 'l') selected @endif>L</option>
                                <option value="xl" @if(strtolower($row->baju) === 'xl') selected @endif>XL</option>
                                <option value="xxl" @if(strtolower($row->baju) === 'xxl') selected @endif>XXL</option>
                                <option value="xxxl" @if(strtolower($row->baju) === 'xxxl') selected @endif>XXXL</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="celana" value="{{ $row->celana }}" class="form-control" placeholder="Ukuran celana...">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="sepatu" value="{{ $row->sepatu }}" class="form-control" placeholder="Ukuran sepatu...">
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($step == 2)

            <div class="frame-preview-photo">
                <label for="list-devices">Daftar Perangkat</label>
                <select id="list-devices" class="form-control"></select>
                <div class="frame-preview-content d-sm-flex justify-content-beteen my-4">
                    {{-- <video src="" id="photo-preview" playsinline autoplay></video> --}}
                    <div id="my_camera"></div>
                    <img @if($row->photo) src="{{ storage_path($row->photo) }}" @endif alt="" id="photo-result">
                </div>
                <input type="hidden" type="hidden" id="photo-output" name="photo">
                <button type="button" id="got-result" class="btn btn-primary">Ambil Foto!</button>
            </div>

            {{-- <select size="1" id="source" style="position: relative; width: 220px;"></select>
            <input type="button" value="Scan" onclick="AcquireImage();" />

            <!-- dwtcontrolContainer is the default div id for Dynamic Web TWAIN control.
            If you need to rename the id, you should also change the id in the dynamsoft.webtwain.config.js accordingly. -->
            <div id="dwtcontrolContainer"></div> --}}
            @else

            <div class="form-group row">
                <label for="photo_ktp" class="col-sm-3 col-form-label">Photo KTP<span class="text-required">*</span></label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo_ktp" id="photo_ktp">
                        <label class="custom-file-label" for="photo_ktp">Choose file...</label>
                    </div>
                    @error('photo_ktp')
                        <div class="invalid-data">
                            <span>{{ str_replace('photo_ktp', 'photo ktp', $message) }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="photo_kk" class="col-sm-3 col-form-label">Photo KK<span class="text-required">*</span></label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo_kk" id="photo_kk">
                        <label class="custom-file-label" for="photo_kk">Choose file...</label>
                    </div>
                    @error('photo_kk')
                        <div class="invalid-data">
                            <span>{{ str_replace('photo_kk', 'photo kk', $message) }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="photo_kta" class="col-sm-3 col-form-label">Photo KTA<span class="text-required">*</span></label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo_kta" id="photo_kta">
                        <label class="custom-file-label" for="photo_kta">Choose file...</label>
                    </div>
                    @error('photo_kta')
                        <div class="invalid-data">
                            <span>{{ str_replace('photo_kta', 'photo kta', $message) }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="ijazah" class="col-sm-3 col-form-label">Ijazah</label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="ijazah" id="ijazah">
                        <label class="custom-file-label" for="ijazah">Choose file...</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="sertifikat" class="col-sm-3 col-form-label">Sertifikat Keahlian</label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="sertifikat" id="sertifikat">
                        <label class="custom-file-label" for="sertifikat">Choose file...</label>
                    </div>
                </div>
            </div>

            @endif

            <div class="d-flex justify-content-end mt-4">
                @if ($step == 1)
                <button type="reset" id="reset" class="btn btn-danger">Ulang</button>&nbsp;
                @else
                <a href="{{ route('employe::create') }}?step=1" class="btn btn-warning">Kembali</a>&nbsp;
                @endif
                <button type="submit" class="btn btn-success">Lanjutkan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('library-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" integrity="sha256-e47xOkXs1JXFbjjpoRr1/LhVcqSzRmGmPqsrUQeVs+g=" crossorigin="anonymous">
@endpush

@push('library-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js" integrity="sha256-cs4thShDfjkqFGk5s2Lxj35sgSRr4MRcyccmi0WKqCM=" crossorigin="anonymous"></script>
{{-- <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js" integrity="sha256-t+nJEiBiQ6CP53aJk5ptfJ+gno5gl3N0RKYycDqZ5ko=" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/dwt@15.2.0/dist/dynamsoft.webtwain.initiate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dwt@15.2.0/dist/dynamsoft.webtwain.config.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dwt@15.2.0/dist/dynamsoft.webtwain.min.js"></script> --}}
@endpush
@push('scripts')
<script>
bsCustomFileInput.init();
const startTime = moment();
const endTime = moment('{{ $row->tgllahir }}');
$('input[name="usia"]').val(startTime.diff(endTime, 'years'));
$('input[name="tgllahir"]').datetimepicker({
    format: 'DD-MM-YYYY'
});

$('input[name="tgllahir"]').on('change.datetimepicker', (e) => {
    const start = moment();
    const end = moment(e.date);
    const selisih = start.diff(end, 'years');
    $('input[name="usia"]').val(selisih);
});
$('.select-custom').select2({
    width: '100%',
    theme: 'bootstrap4'
});
$('#add-input').click(() => {
    const inputUtamaKursus = $('#input-utama-kursus');
    const inputUtamaSertifikasi = $('#input-utama-sertifikasi');
    if (inputUtamaKursus.val() !== '' && inputUtamaKursus.val() !== null) {
        let clone1 = inputUtamaKursus.clone(true).val('');
        const clone2 = inputUtamaSertifikasi.clone(true);
        const target1 = $('#target-content-1');
        const target2 = $('#target-content-2');
        let templateKursus = $(`<div class="input-group tmpla-kursus" data-unique-id="${$('.tmpla-kursus').length}"><div class="input-group-append"><button type="button" class="btn btn-danger remove-input-data">Remove</button></div></div>`);
        templateKursus = templateKursus.find('button').parent().parent().prepend(clone1);
        const templateSertifikasi = clone2.attr({
            class: `${clone2.attr('class')} tmpla-sertifikasi`,
            'data-unique-id': $('.tmpla-sertifikasi').length,
            disabled: true
        });
        target1.append(templateKursus);
        target2.append(templateSertifikasi);
    } else {
        alert('Isi terlebih dahulu kursus utama!');
    }
});
$('#target-content-1').on('click', '.remove-input-data', (e) => {
    const input = $(e.currentTarget).parent().parent();
    const id = input.data('uniqueId');
    input.remove();
    $(`.tmpla-sertifikasi[data-unique-id="${id}"]`).remove();
});
$('#target-content-1').on('keyup', '.tmpla-kursus', (e) => {
    const templateKursus = $(e.currentTarget);
    const input = templateKursus.find('input');
    const id = templateKursus.data('uniqueId');
    const target = $(`.tmpla-sertifikasi[data-unique-id="${id}"]`);
    if (input.val() !== '' && input.val() !== null) {
        target.removeAttr('disabled');
    } else {
        target.attr('disabled', true);
    }
});

// Photo
const video = document.getElementById('photo-preview');
const img = document.getElementById('photo-result');
const devices = document.getElementById('list-devices');

function gotDevices(deviceInfos) {
    for (let i = 0; i < deviceInfos.length; i++) {
        const deviceInfo = deviceInfos[i];
        const option = document.createElement('option');
        if (deviceInfo.kind === 'audioinput') {
            // option.text = deviceInfo.label || `microphone ${audioInputSelect.length + 1}`;
        } else if (deviceInfo.kind === 'audiooutput') {
            // option.text = deviceInfo.label || `speaker ${audioOutputSelect.length + 1}`;
        } else if (deviceInfo.kind === 'videoinput') {
            option.value = deviceInfo.deviceId;
            option.text = deviceInfo.label || `camera ${devices.length + 1}`;
            devices.appendChild(option);
        } else {
            console.log('Some other kind of source/device: ', deviceInfo);
        }
    }
}

if (navigator && navigator.mediaDevices) {
    navigator.mediaDevices
        .enumerateDevices()
        .then(gotDevices)
        .catch(handleError);
}

function handleError(error) {
  console.log('navigator.MediaDevices.getUserMedia error: ', error.message, error.name);
}

function take_snapshot() {
    // take snapshot and get image data
    Webcam.snap(function(data_uri) {
        const raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
        document.getElementById('photo-output').value = raw_image_data;
        console.log(raw_image_data);
        // display results in page
        img.src = data_uri;
    });
}

function start() {
    const timer = setTimeout(() => {
        const videoSource = devices.value;
        Webcam.set({
            width: 320,
            height: 320,
            image_format: 'jpeg',
            jpeg_quality: 90,
            constraints: {
                width: 320,
                height: 320,
                deviceId: videoSource ? { exact: videoSource } : undefined,
                facingMode: 'user',
				frameRate: 30
            }
        });
        Webcam.attach('#my_camera');

        document.getElementById('got-result').addEventListener('click', take_snapshot);
        devices.addEventListener('change', start);

        clearTimeout(timer);
    }, 1000);
}

@if ($step == 2) start();  @endif
</script>
@endpush
