<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function showmahasiswa()
    {
        $data['list_mahasiswa'] = mahasiswa::all();
        return view('mahasiswa.index', $data);
    }
}
