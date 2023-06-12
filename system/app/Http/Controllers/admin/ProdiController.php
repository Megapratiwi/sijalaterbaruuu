<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_prodi'] = prodi::all();

        return view('admin.prodi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['prodi'] = prodi::find($id);

        return view('admin.prodi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prodi = new prodi;
        $prodi->nama_prodi = request('nama_prodi');
        $prodi->ketua_prodi = request('ketua_prodi');

        $prodi->save();

        return redirect('admin/prodi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['prodi'] = prodi::find($id);
        return view('admin.prodi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prodi = prodi::find($id);
        $prodi->nama_prodi = request('nama_prodi');
        $prodi->ketua_prodi = request('ketua_prodi');
        $prodi->save();

        return redirect('admin/prodi')->with('warning', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodi = prodi::find($id);
        // $prodi->handleDelete();
        $prodi->delete();
        return redirect('admin/prodi')->with('danger', 'Data Berhasil Dihapus');
    }
}
