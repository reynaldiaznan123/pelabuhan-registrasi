<?php

namespace Module\Serikat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Module\Serikat\Entities\Serikat;
use Yajra\DataTables\Facades\DataTables;

class SerikatController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Serikat::all())
                ->addColumn('action', function($row) {
                    $btn = '';
                    // Button Read
                    $btn .= '<a href="'.route('serikat::read', ['id' => $row->id]).'" class="btn btn-sm btn-info">Read</a>&nbsp;';
                    $btn .= '<a href="'.route('serikat::edit', ['id' => $row->id]).'" class="btn btn-sm btn-warning">Edit</a>&nbsp;';
                    // $btn .= '<a href="'.route('serikat::delete').'" class="btn btn-input">Delete</a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('serikat::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('serikat::create');
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

        Serikat::create($values);
        return redirect(route('serikat::create'))
            ->withStatus('Data serikat pekerjaan berhasil ditambahkan.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('serikat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('serikat::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
