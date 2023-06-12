<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\laboratorium;
use App\Models\mahasiswa;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['list_peminjamanmahasiswa'] = peminjaman::all();
        $list_laboratorium = laboratorium::all();
        return view('mahasiswa.peminjaman.index', $data, compact('list_laboratorium'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_peminjamanmahasiswa(Request $request)
    {
        $peminjaman_mahasiswa = new peminjaman();
        $peminjaman_mahasiswa->id_lab = request('id_lab');
        $peminjaman_mahasiswa->id_mahasiswa = request()->user()->id_mahasiswa;
        $peminjaman_mahasiswa->tanggal_peminjaman = request('tanggal_peminjaman');
        $peminjaman_mahasiswa->tanggal_selesai = request('tanggal_selesai');
        $peminjaman_mahasiswa->waktu_mulai = request('waktu_mulai');
        $peminjaman_mahasiswa->waktu_selesai = request('waktu_selesai');
        $peminjaman_mahasiswa->keperluan_alat = request('keperluan_alat');
        $peminjaman_mahasiswa->status = 1;
        $peminjaman_mahasiswa->save();

        return redirect('mahasiswa/peminjaman_mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_peminjamanmahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['peminjaman_mahasiswa'] = peminjaman::find($id);
        return view('mahasiswa.peminjaman.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_peminjamanmahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['peminjaman_mahasiswa'] = peminjaman::find($id);
        return view('mahasiswa.peminjaman.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_peminjamanmahasiswa(Request $request, $id)
    {
        $peminjaman_mahasiswa = peminjaman::find($id);
        $peminjaman_mahasiswa->id_lab = request('id_lab');
        $peminjaman_mahasiswa->tanggal_peminjaman = request('tanggal_peminjaman');
        $peminjaman_mahasiswa->tanggal_selesai = request('tanggal_selesai');
        $peminjaman_mahasiswa->waktu_mulai = request('waktu_mulai');
        $peminjaman_mahasiswa->waktu_selesai = request('waktu_selesai');
        $peminjaman_mahasiswa->keperluan_alat = request('keperluan_alat');
        $peminjaman_mahasiswa->status = 1;
        $peminjaman_mahasiswa->save();

        return redirect('mahasiswa/peminjaman_mahasiswa')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $peminjaman_mahasiswa = peminjaman::find($id);
        //$peminjaman_mahasiswa->handleDelete();
        $peminjaman_mahasiswa->delete();
        return redirect('mahasiswa/peminjaman_mahasiswa')->with('success', 'Data Berhasil Dihapus');
    }
}
