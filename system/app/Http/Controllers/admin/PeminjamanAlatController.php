<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\alat;
use App\Models\laboratorium;
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
        $data['list_peminjamanalat'] = alat::all();
        $list_laboratorium = laboratorium::all();
        return view('admin.peminjaman_alat.index', $data, compact('list_laboratorium'));
    }

    public function store(Request $request)
    {
        $peminjaman_alat = new alat;
        $peminjaman_alat->id_lab = request('id_lab');
        $peminjaman_alat->nama_alat = request('nama_alat');
        $peminjaman_alat->jumlah_alat = request('jumlah alat');
        $peminjaman_alat->deskripsi = request('deskripsi');
        $peminjaman_alat->handleUploadFotoAlat();
        $peminjaman_alat->status = 1;
        $peminjaman_alat->save();

        return redirect('admin/peminjaman_alat');
    }

    public function show_peminjamanalat($id){
      $data['alat'] = alat::find($id);
      return view('admin.peminjaman_alat.show', $data);
    }

    public function destroy($id)
    {
        $peminjaman_alat = alat::find($id);
        $peminjaman_alat->delete();
        return redirect('admin/peminjaman_alat')->with('success', 'Data Berhasil Dihapus');
    }

    public function setuju_peminjamanalat($id)
    {
      $peminjaman_alat = alat::find($id);
      $peminjaman_alat->status = 2;
      $peminjaman_alat->save();

      return back()->with('success', 'Data Peminjaman Alat Berhasil Disetujui');

    }
    public function tolak_peminjamanalat($id)
    {
      $peminjaman_alat = alat::find($id);
      $peminjaman_alat->status = 3;
      $peminjaman_alat->save();

      return back()->with('success', 'Data Peminjaman Alat Berhasil Ditolak');

    }

}
