<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelAuthenticate;
use Illuminate\Support\Str;

class kalab extends ModelAuthenticate
{
    protected $table = 'kalab';
    protected $primaryKey = 'id_kalab';

    public function handleUploadFotoKalab()
    {
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/kalab";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;
            $this->save();

        }
    }
}
