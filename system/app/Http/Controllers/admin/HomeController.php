<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function showberanda(){

        $mulai = Carbon::now();
        $akhir = $mulai->copy()->addWeek();

        $data ['daftartanggal'] = [];

        while ($mulai->lte($akhir)) {
            $daftartanggal[] = $mulai->toDateString();
            $mulai->addDay();
        }

        $data['list_peminjaman'] = peminjaman::whereDate('tanggal_peminjaman', '=', Carbon::today()->toDateString())->get();
        return view('admin.index', $data);
    }


}


