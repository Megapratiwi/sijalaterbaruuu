<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_jurusan'] = jurusan::all();

        return view('admin.jurusan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editjurusan($id)
    {
        $data['jurusan'] = jurusan::find($id);
        return view('admin.jurusan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storejurusan(Request $request)
    {
        $jurusan = new jurusan;
        $jurusan->nama_jurusan = request('nama_jurusan');
        $jurusan->ketua_jurusan = request('ketua_jurusan');

        $jurusan->save();

        return redirect('admin/jurusan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['jurusan'] = jurusan::find($id);
        return view('admin.jurusan.show', $data);
        
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
    public function update_jurusan(Request $request, $id)
    {
        $jurusan = jurusan::find($id);
        $jurusan->nama_jurusan = request('nama_jurusan');
        $jurusan->ketua_jurusan = request('ketua_jurusan');

        $jurusan->save();
        return redirect('admin/jurusan')->with('warning', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = jurusan::find($id);
        // $jurusan->handleDelete();
        $jurusan->delete();
        return redirect('admin/jurusan')->with('danger', 'Data Berhasil Dihapus');
    }
}
