<?php

namespace Module\Employe\Http\Controllers;

use App\Wilayah;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Module\Employe\Entities\Employe;
use Module\Serikat\Entities\Serikat;

class EmployeCreateController extends Controller
{
    public function index()
    {
        try {
            $form_steps = $this->updateFormSteps(true);
        } catch (Exception $e) {
            $form_steps = null;
        }
        $step = $form_steps ? $form_steps['form_step'] : 1;
        $step = request()->get('step') ? 1 : $step;
        if ($form_steps && $step === 1) {
            $form_steps['form_step'] = $step;
            $this->updateFormSteps(false, $form_steps);
        }
        $data = [
            'serikats' => Serikat::all(),
            'step' => $step
        ];
        return view('employe::create', $data);
    }

    public function process(Request $request)
    {
        if ($request->form_step === '1') {
            $request->validate([
                'nama' => 'required',
                'nokta' => 'required|numeric|digits_between:1,4',
                'regu' => 'required|numeric|digits_between:1,3',
                'noktp' => 'required|numeric|digits_between:16,16',
                'serikat' => 'required',
                'rt' => 'numeric|digits_between:1,3',
                'rw' => 'numeric|digits_between:1,3'
            ]);
            $data = $request->only(array_keys($_POST));
            $data['form_step'] = 2;
            $request->session()->put('form_steps', Crypt::encryptString(json_encode($data)));
            return redirect(route('employe::create'));
        } else if ($request->form_step === '2') {
            $form_steps = $this->updateFormSteps(true);
            $form_steps['form_step'] = 3;
            if (empty($request->photo)) {
                $form_steps['photo'] = $request->file('photo-default')->store('public/berkas');
            } else {
                $form_steps['photo'] = $request->photo;
            }
            $this->updateFormSteps(false, $form_steps);
            return redirect(route('employe::create'));
        } else {
            $request->validate([
                'photo_ktp' => 'required|image',
                'photo_kk' => 'required|image',
                'photo_kta' => 'required|image',
                'ijazah' => 'image',
                'sertifikat' => 'image',
            ]);

            $form_steps = $this->updateFormSteps(true);
            $form_steps['noregu'] = $form_steps['regu'];
            $form_steps['serikat_id'] = $form_steps['serikat'];
            $q1 = $form_steps['kursus'];
            $q2 = $form_steps['sertifikasi'];
            $form_steps['tgllahir'] = date('Y-m-d', strtotime($form_steps['tgllahir']));
            unset(
                $form_steps['_token'],
                $form_steps['form_step'],
                $form_steps['regu'],
                $form_steps['kursus'],
                $form_steps['sertifikasi'],
                $form_steps['serikat']
            );
            if (!file_exists(storage_path('app/' . $form_steps['photo']))) {
                $photo = base64_decode($form_steps['photo']);
                $filename = $form_steps['nama'] . '-' . $form_steps['nokta'] . '-' . $form_steps['noregu'] . '.jpeg';
                if (!is_dir(storage_path('app/public/berkas'))) {
                    mkdir(storage_path('app/public/berkas'));
                }
                file_put_contents(storage_path('app/public/berkas/' . $filename), $photo);
                $form_steps['photo'] = 'berkas/' . $filename;
            }

            $data = [
                'photo_ktp',
                'photo_kk',
                'photo_kta',
                'ijazah',
                'sertifikat',
            ];
            $files = [];
            foreach ($data as $key) {
                $file = $request->file($key);
                if ($file) {
                    $path = $file->store('berkas/' . $form_steps['nama'] . '-' . $form_steps['nokta'] . '-' . $form_steps['noregu']);
                    $files[$key] = $path;
                }
            }
            $c = Employe::where('nokta', $form_steps['nokta'])->first();
            if ($c) {
                $d = Employe::find($c->id);
                $d->update($form_steps);
                $message = 'Data berhasil diubah.';
            } else {
                $form_steps['noreg'] = $this->getNoRegistrasi();
                $form_steps['tgl_pembuatan'] = date('Y-m-d');
                $form_steps['user_id'] = auth()->user()->id;
                $d = Employe::create($form_steps);
                $message = 'Data berhasil ditambahkan.';
            }
            $d->scanning()->create($files);
            foreach ($q1 as $k => $v) {
                if (!empty($v)) {
                    $d->nonFormal()->create([
                        'kursus' => $v,
                        'sertifikasi' => $q2[$k] ?? null
                    ]);
                }
            }
            return redirect(route('employe::frame', ['id' => $d->id]));
        }
    }

    private function updateFormSteps($decode = false, $data = null) {
        return $decode
            ? json_decode(Crypt::decryptString(session('form_steps')), true)
            : request()->session()->put('form_steps', Crypt::encryptString(json_encode($data)));
    }

    private function getNoRegistrasi() {
        $check = Employe::orderBy('noreg', 'desc')->first();
        $prefix = 'OPTKBM';
        $code = null;
        if ($check) {
            $j = str_replace($prefix, '', $check->noreg);
            $n = (int) $j;
            $ni = $n + 1;
            if (strlen($ni) === 1) {
                $code = $prefix . '000' . $ni;
            } else if (strlen($ni) === 2) {
                $code = $prefix . '00' . $ni;
            } else if (strlen($ni) === 3) {
                $code = $prefix . '0' . $ni;
            } else {
                $code = $prefix . $ni;
            }
            // Generate angka baru
            $code = $code;
        } else {
            $code = $prefix . '0001';
        }
        return $code;
    }

    private function generateRandomNumber($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
