<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrunOzellikleri extends Model
{
    protected $table = "urun_ozellikleri";

    protected $fillable = ['urun_id', 'urun_adi', 'marka', 'fiyat', 'aktiflik', 'firsat_urunu', 'indirimli_fiyat'];

    protected $hidden = ['id'];
}