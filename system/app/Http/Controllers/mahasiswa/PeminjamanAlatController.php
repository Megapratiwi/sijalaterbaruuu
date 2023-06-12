<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\alat;
use App\Models\laboratorium;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class PeminjamanAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['list_alatmahasiswa'] = alat::all();
        $list_laboratorium = laboratorium::all();
        return view('mahasiswa.alat.index', $data, compact('list_laboratorium'));

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
    public function store_alatmahasiswa(Request $request)
    {
        $peminjaman_alatmahasiswa = new alat();
        $peminjaman_alatmahasiswa->id_lab = request('id_lab');
        $peminjaman_alatmahasiswa->nama_alat = request('nama_alat');
        $peminjaman_alatmahasiswa->jumlah_alat = request('jumlah_alat');
        $peminjaman_alatmahasiswa->tanggal_peminjaman = request('tanggal_peminjaman');
        $peminjaman_alatmahasiswa->tanggal_selesai = request('tanggal_selesai');
        $peminjaman_alatmahasiswa->waktu_mulai = request('waktu_mulai');
        $peminjaman_alatmahasiswa->waktu_selesai = request('waktu_selesai');
        $peminjaman_alatmahasiswa->deskripsi = request('deskripsi');
        $peminjaman_alatmahasiswa->status = 1;
        $peminjaman_alatmahasiswa->save();
        
        return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_alatmahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $data['peminjaman_alatmahasiswa'] = alat::find($id);
        return view('mahasiswa.alat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_alatmahasiswa($id)
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        $list_laboratorium = laboratorium::all();
        $data['peminjaman_alatmahasiswa'] = alat::find($id);
        return view('mahasiswa.alat.edit', $data, compact('list_laboratorium'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_alatmahasiswa(Request $request, $id)
    {
        $peminjaman_alatmahasiswa = alat::find($id);
        $peminjaman_alatmahasiswa->id_lab = request('id_lab');
        $peminjaman_alatmahasiswa->nama_alat = request('nama_alat');
        $peminjaman_alatmahasiswa->jumlah_alat = request('jumlah_alat');
        $peminjaman_alatmahasiswa->tanggal_peminjaman = request('tanggal_peminjaman');
        $peminjaman_alatmahasiswa->tanggal_selesai = request('tanggal_selesai');
        $peminjaman_alatmahasiswa->waktu_mulai = request('waktu_mulai');
        $peminjaman_alatmahasiswa->waktu_selesai = request('waktu_selesai');
        $peminjaman_alatmahasiswa->deskripsi = request('deskripsi');
        $peminjaman_alatmahasiswa->status = 1;
        $peminjaman_alatmahasiswa->save();

        return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('success', 'Data Berhasil Diedit');
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
        $peminjaman_alatmahasiswa = alat::find($id);
        //$peminjaman_alatmahasiswa->handleDelete();
        $peminjaman_alatmahasiswa->delete();
        return redirect('mahasiswa/peminjaman_alatmahasiswa')->with('success', 'Data Berhasil Dihapus');
    }
}
