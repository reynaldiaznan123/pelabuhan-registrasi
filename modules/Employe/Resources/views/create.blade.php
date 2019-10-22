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
        <form action="{{ route('employe::store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="form_step" value="{{ $step }}">

            @if ($step == 1)
            {{-- <div class="form-group">
                <div class="form-group-in row">
                    <label for="noreg" class="col-sm-3 col-form-label">Nomor Registrasi</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" id="noreg" name="noreg" class="form-control-plaintext" readonly value="asdas">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary">Custom</button>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="form-text">asda</span>
            </div> --}}
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Anggota</label>
                <div class="col-sm-9">
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama anggota...">
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
                    <input type="text" name="noktp" id="input-utama-sertifikasi" placeholder="NIK..." class="form-control">
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
                            <input type="text" id="nokta" name="nokta" class="form-control" placeholder="No. KTA...">
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
                            <input type="text" name="regu" class="form-control" placeholder="Regu...">
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
                        <option value="KRK">KRK</option>
                        <option value="Wakil">WAKIL</option>
                        <option value="Derek / Pilot">DEREK / PILOT</option>
                        <option value="Anggota">ANGGOTA</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alokasi</label>
                <div class="col-sm-9" id="alokasi">
                    <input type="text" name="alokasi" id="alokasi" placeholder="Alokasi..." class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-in row">
                    <label for="tmplahir" class="col-sm-3 col-form-label">Tempat lahir / Tgl lahir</label>
                    <div class="col-sm-9">
                        <div class="d-xl-flex">
                            <div class="flex-md-grow-1">
                                <input type="text" id="tmplahir" name="tmplahir" class="form-control" placeholder="Tempat lahir...">
                            </div>
                            <div class="align-self-md-center px-3 py-2">
                                <span class="d-none d-lg-block">/</span>
                            </div>
                            <div>
                                <input type="text" name="tgllahir" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="input[name='tgllahir']" placeholder="Tanggal lahir...">
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
                            <option value="belum kawin">Belum Kawin</option>
                            <option value="kawin">Kawin</option>
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
                            <option value="islam">ISLAM</option>
                            <option value="hindu">HINDU</option>
                            <option value="budha">BUDHA</option>
                            <option value="kristen protestan">KRISTEN PROTESTAN</option>
                            <option value="katolik">KATOLIK</option>
                            <option value="kong hu cu">KONG HU CU</option>
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
                            <option value="O Positif">O Positif</option>
                            <option value="O Negatif">O Negatif</option>
                            <option value="A Positif">A Positif</option>
                            <option value="A Negatif">A Negatif</option>
                            <option value="B Positif">B Positif</option>
                            <option value="B Negatif">B Negatif</option>
                            <option value="AB Positif">AB Positif</option>
                            <option value="AB Negatif">AB Negatif</option>
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
                            <option value="SD">SD</option>
                            <option value="SLTP">SLTP</option>
                            <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                            <option value="DIPLOMA">DIPLOMA</option>
                            <option value="SARJANA">SARJANA</option>
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
                        <textarea id="alamat" name="alamat" placeholder="Alamat" class="form-control mb-3" cols="30" rows="5"></textarea>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <input type="text" name="rt" class="form-control" placeholder="RT">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="rw" class="form-control" placeholder="RW">
                            </div>
                        </div>
                        <input type="text" name="kelurahan" class="form-control mb-3" placeholder="Desa / Kelurahan">
                        <input type="text" name="kecamatan" class="form-control mb-3" placeholder="Kecamatan">
                        <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="serikat" class="col-sm-3 col-form-label">Serikat Pekerja</label>
                <div class="col-sm-9">
                    <select id="serikat" name="serikat" class="form-control select-custom" data-placeholder="Pendidikan formal...">
                        <option></option>
                        @foreach ($serikats as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
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
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                                <option value="xxxl">XXXL</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="celana" class="form-control" placeholder="Ukuran celana...">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="sepatu" class="form-control" placeholder="Ukuran sepatu...">
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
                    <img src="" alt="" id="photo-result">
                </div>
                <div class="custom-file" id="photo-upload">
                    <input type="file" class="custom-file-input" name="photo-default" id="photo-default">
                    <label class="custom-file-label" for="photo-default">Choose file...</label>
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
                <button type="reset" class="btn btn-danger">Ulang</button>&nbsp;
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
<link rel="stylesheet" href="{{ asset('vendors/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/select2/dist/css/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/datetimepicker/datetimepicker.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" integrity="sha256-e47xOkXs1JXFbjjpoRr1/LhVcqSzRmGmPqsrUQeVs+g=" crossorigin="anonymous">
@endpush

@push('library-scripts')
<script src="{{ asset('vendors/moment-with-locales.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/select2/dist/js/select2.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/file-input.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/validation/validate.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/validation/methods.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/datetimepicker.min.js') }}" crossorigin="anonymous"></script>
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
        // console.loh(raw_image_data, data_uri);
        document.getElementById('photo-output').value = raw_image_data;
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
        if (!!!navigator.mediaDevices) {
            // $('#photo-upload').slideDown();
            // $('#got-result').slideUp();
            // $('label[for="list-devices"]').slideUp();
            // $(devices).slideUp();
        }
        Webcam.on('load', function() {
            Webcam.attach('#my_camera');
        });
        Webcam.on('error', function(err) {
            console.log(err);
        });

        document.getElementById('got-result').addEventListener('click', take_snapshot);
        devices.addEventListener('change', start);

        clearTimeout(timer);
    }, 1000);
}

@if ($step == 2) start();  @endif


// Scanner
// window.onload = function () {
//     Dynamsoft.WebTwainEnv.Load();
// };
// Dynamsoft.WebTwainEnv.AutoLoad = false;
// Dynamsoft.WebTwainEnv.RegisterEvent('OnWebTwainReady', Dynamsoft_OnReady); // Register OnWebTwainReady event. This event fires as soon as Dynamic Web TWAIN is initialized and ready to be used

// var DWObject;

// function Dynamsoft_OnReady() {
//     DWObject = Dynamsoft.WebTwainEnv.GetWebTwain('dwtcontrolContainer'); // Get the Dynamic Web TWAIN object that is embeded in the div with id 'dwtcontrolContainer'
// }

// function AcquireImage() {
//     if (DWObject) {
//         DWObject.SelectSource(function () {
//             var OnAcquireImageSuccess, OnAcquireImageFailure;
//             OnAcquireImageSuccess = OnAcquireImageFailure = function () {
//                 DWObject.CloseSource();
//             };

//             DWObject.OpenSource();
//             DWObject.IfShowUI = false; //Disable scanner UI.
//             DWObject.IfDisableSourceAfterAcquire = true;//Scanner source will be disabled automatically after scan.
//             if (document.getElementById("ADF").checked)//Use auto feeder or use the flatbed
//                 DWObject.IfFeederEnabled = true;//Enbale Document Feeder
//             else
//                 DWObject.IfFeederEnabled = false;//Disable Document Feeder

//             if (document.getElementById("ADF").checked && DWObject.IfFeederEnabled == true)  // if paper is NOT loaded on the feeder
//             {
//                 if (DWObject.IfFeederLoaded != true && DWObject.ErrorCode == 0) {
//                     if (confirm("No paper detected on the feeder, do you want to scan from the flatbed instead?"))
//                         DWObject.IfFeederEnabled = false;
//                     else
//                         return;
//                 }
//             }

//             DWObject.AcquireImage(OnAcquireImageSuccess, OnAcquireImageFailure);
//         }, function () { console.log('SelectSource failed!'); });
//     }
// }
</script>
@endpush
