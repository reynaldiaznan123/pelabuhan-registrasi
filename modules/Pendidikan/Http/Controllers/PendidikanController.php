<?php

namespace Module\Pendidikan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Module\Pendidikan\Entities\Pendidikan;
use Yajra\DataTables\Facades\DataTables;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Pendidikan::all())->make(true);
        }
        return view('pendidikan::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pendidikan::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $values = $request->only(['title']);
        $request->validate([
            'title' => 'required'
        ]);

        Pendidikan::create($values);
        return redirect(route('pendidikan::create'))
            ->withStatus('Data pendidikan berhasil ditambahkan.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $data = Pendidikan::find($id);
        if (!$data) {
            return redirect(route('pendidikan::index'));
        }
        return view('pendidikan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Pendidikan::find($id);
        if (!$data) {
            return redirect(route('pendidikan::index'));
        }
        return view('pendidikan::edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $data = Pendidikan::find($id);
        if (!$data) {
            return redirect(route('pendidikan::index'));
        }
        $data->update($request->only(['title']));
        return redirect(route('pendidikan::edit', $id))
            ->withStatus('Data pendidikan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = Pendidikan::find($id);
        if (!$data) {
            return redirect(route('pendidikan::index'));
        }
    }
}
