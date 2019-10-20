<?php

namespace Module\Employe\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Module\Employe\Entities\Employe;
use Module\Serikat\Entities\Serikat;
use Yajra\DataTables\Facades\DataTables;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $req = request();
        if ($req->ajax()) {
            return DataTables::of(Employe::all())
                ->editColumn('nokta', function($row) {
                    return $row->nokta . ' - ' . $row->noregu;
                })
                ->addColumn('action', function($row) {
                    $btn = '<div class="btn-group" role="group">';

                    $btn .= '<a href="'.route('employe::read', ['id' => $row->id]).'" class="btn btn-sm btn-info"><i class="c-icon material-icons">drafts</i></a>';
                    $btn .= '<a href="'.route('employe::edit', ['id' => $row->id]).'" class="btn btn-sm btn-warning"><i class="c-icon material-icons">print</i></a>';

                    $btn .= '</div>';

                    return $btn;
                })
                ->make(true);
        }
        return view('employe::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('employe::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $data = Employe::find($id);
        $nonFormalFirst = $data->nonFormal()->first();
        $nonFormals = $data->nonFormal()->where('employe_id', '!=', $nonFormalFirst->employe_id)->get();
        $serikats = $data->serikat()->get();
        return view('employe::show', [
            'row' => $data,
            'q1' => $nonFormalFirst,
            'q2' => $nonFormals,
            'q3' => $serikats
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $row = Employe::find($id);
        $form_steps = null;
        if (session('form_steps')) {
            $form_steps = $this->updateFormSteps(true);
        }
        $step = $form_steps ? $form_steps['form_step'] : 1;
        $step = request()->get('step') ? 1 : $step;
        if ($form_steps && $step === 1) {
            $form_steps['form_step'] = $step;
            $this->updateFormSteps(false, $form_steps);
        }
        $data = [
            'serikats' => Serikat::all(),
            'step' => $step,
            'row' => $row
        ];
        return view('employe::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if ($request->form_step === '1') {
            $request->validate([
                'nama' => 'required',
                'nokta' => 'required|numeric|digits_between:1,4',
                'regu' => 'required|numeric|digits_between:1,3',
                'noktp' => 'required|numeric|digits_between:16,16',
                'serikat' => 'required',
                'rt' => 'digits_between:0,3',
                'rw' => 'digits_between:0,3'
            ]);
            $data = $request->only(array_keys($_POST));
            $data['form_step'] = 2;
            $request->session()->put('form_steps', Crypt::encryptString(json_encode($data)));
            return redirect(route('employe::edit', ['id' => $id]));
        } else if ($request->form_step === '2') {
            $form_steps = $this->updateFormSteps(true);
            $form_steps['form_step'] = 3;
            $form_steps['photo'] = $request->photo;
            $this->updateFormSteps(false, $form_steps);
            return redirect(route('employe::edit', ['id' => $id]));
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
            $photo = base64_decode($form_steps['photo']);
            $form_steps['tgllahir'] = date('Y-m-d', strtotime($form_steps['tgllahir']));
            unset(
                $form_steps['_token'],
                $form_steps['form_step'],
                $form_steps['regu'],
                $form_steps['kursus'],
                $form_steps['sertifikasi'],
                $form_steps['serikat']
            );
            // try {
            //     Storage::disk('public')->delete('berkas/' . $form_steps['nama'] . '-' . $form_steps['nokta'] . '.jpeg');
            // } catch (Exception $e) {}
            // Storage::disk('public')->put('berkas/' . $form_steps['nama'] . '-' . $form_steps['nokta'] . '.jpeg', $photo);
            // $form_steps['photo'] = 'berkas/' . $form_steps['nama'] . '-' . $form_steps['nokta'] . '.jpeg';
            $filename = $form_steps['nama'] . '-' . $form_steps['nokta'] . '-' . $form_steps['noregu'] . '.jpeg';
            if (!is_dir(storage_path('app/public/berkas'))) {
                mkdir(storage_path('app/public/berkas'));
            }
            file_put_contents(storage_path('app/public/berkas/' . $filename), $photo);
            $form_steps['photo'] = 'berkas/' . $filename;
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
                    $path = $file->store('berkas/' . $form_steps['nama'] . '-' . $form_steps['nokta']);
                    $files[$key] = $path;
                }
            }
            $d = Employe::find($id);
            if (empty($d->noreg)) {
                $form_steps['noreg'] = $this->getNoRegistrasi();
            }
            $c1 = $d->update($form_steps);
            $files['employe_id'] = $d->id;
            $c2 = $d->scanning()->updateOrCreate($files);
            foreach ($q1 as $k => $v) {
                if (!empty($v)) {
                    $d->nonFormal()->update([
                        'kursus' => $v,
                        'sertifikasi' => $q2[$k] ?? null
                    ]);
                }
            }
            return redirect(route('employe::frame', ['id' => $d->id]));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function getNoRegistrasi() {
        $check = Employe::orderBy('noreg', 'desc')->first();
        $prefix = 'OPTKBM';
        $code = null;
        if ($check) {
            $j = str_replace($prefix, '', $check->noreg);
            $n = (int) $j;
            if (strlen($n) === 1) {
                $code = $prefix . '000' . ($n + 1);
            } else if (strlen($n) === 2) {
                $code = $prefix . '00' . ($n + 1);
            } else if (strlen($n) === 3) {
                $code = $prefix . '0' . ($n + 1);
            } else {
                $code = $prefix . ($n + 1);
            }
            // Generate angka baru
            $code = $code;
        } else {
            $code = $prefix . '0001';
        }
        return $code;
    }

    public function check(Request $request) {
        $nokta = $request->get('nokta');
        $noregu = $request->get('noregu');
        $data = Employe::where('nokta', $nokta)->whereAnd('noregu', $noregu)->first();
        $status = 0;
        $id = null;
        if ($data) {
            $status = 1;
            $id = $data->id;
        }
        return Response([
            'status' => $status,
            'id' => $id
        ]);
    }

    private function updateFormSteps($decode = false, $data = null) {
        return $decode
            ? json_decode(Crypt::decryptString(session('form_steps')), true)
            : request()->session()->put('form_steps', Crypt::encryptString(json_encode($data)));
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
