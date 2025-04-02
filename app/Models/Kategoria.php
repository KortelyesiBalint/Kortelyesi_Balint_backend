<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $table = "kategorias";
    protected $fillable = ["nev"];

    public function ingatlan()
    {
        return $this->belongsTo(Ingatlan::class,"kategoria","id");
    }
}
