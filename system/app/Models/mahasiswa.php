<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ModelAuthenticate;
use App\Models\peminjaman;

class mahasiswa extends ModelAuthenticate
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';

    function peminjaman()
    {
        return $this->belongsTo(peminjaman::class, 'id_mahasiswa');
    }

    function handleUploadFotoMahasiswa()
    {
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/mahasiswa";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;
            $this->save();
        }
    }
}
