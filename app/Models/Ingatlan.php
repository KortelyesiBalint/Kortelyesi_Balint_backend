<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingatlan extends Model
{
    protected $table = "ingatlans";
    protected $fillable = ["kategoria", "leiras", "hirdetesDatuma", "tehermentes", "ar", "kepUrl"];

    public function kategoria()
    {
        return $this->hasOne(Kategoria::class,"id","kategoria");
    }
}
