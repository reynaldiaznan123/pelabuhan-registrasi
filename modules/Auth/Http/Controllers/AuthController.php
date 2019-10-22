<?php

namespace Module\Auth\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $req = request();
        if ($req->ajax()) {
            return DataTables::of(User::all())
                ->addColumn('action', function($row) {
                    $btn = '';
                    // Button Read
                    $btn .= '<a href="'.route('authentication::show', ['id' => $row->id]).'" class="btn btn-sm btn-info">Read</a>&nbsp;';
                    $btn .= '<a href="'.route('authentication::edit', ['id' => $row->id]).'" class="btn btn-sm btn-warning">Edit</a>&nbsp;';
                    $btn .= '<a href="'.route('authentication::delete', ['id' => $row->id]).'" class="btn btn-sm btn-danger">Delete</a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('auth::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('auth::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);
        return redirect(route('authentication::create'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('auth::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('auth::edit', [
            'row' => User::find($id)
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
        // $request->validate([]);
        $data = [
            'username' => $request->username,
            'name' => $request->nama
        ];
        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        }
        User::find($id)->update($data);
        return redirect(route('authentication::edit', ['id' => $id]));
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
