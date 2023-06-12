<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
		return view ('login');
	}

	public function LoginProses()
    {
        if (auth()->guard('mahasiswa')->attempt(['username' => request('username'), 'password' => request('password')])){
            return redirect('mahasiswa/beranda_mahasiswa');
        }

        if (auth()->guard('admin')->attempt(['username' => request('username'), 'password' => request('password')])){
            return redirect('admin/beranda');
        }

        if (auth()->guard('kalab')->attempt(['username' => request('username'), 'password' => request('password')])){
            return redirect('kalab/beranda_kalab');
        }

		return redirect('login')->with('error', 'Login Gagal');
	}

	public function logout(Request $request)
    {
		auth()->logout();
		$request->session()->invalidate();
		return redirect('login');
	}
    


}
