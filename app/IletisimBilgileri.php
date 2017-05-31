<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IletisimBilgileri extends Model
{
    protected $table = "iletisim_bilgileri";

    protected $fillable = ['sube', 'telefon1', 'telefon2','fax', 'mail1', 'mail2', 'adres', 'konum'];

    protected $hidden = ['id'];
}