<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\laboratorium;

class alat extends Model
{
    use HasFactory;

    protected $table = 'alat';
    protected $primaryKey = 'id_alat';

    function laboratorium()
    {
        return $this->belongsTo(laboratorium::class, 'id_lab');
    }

    public function handleUploadFotoAlat()
    {
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/alat";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;
            $this->save();

        }
    }
}
