<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siparisler extends Model
{
    protected $table = "siparisler";

    protected $fillable = ['urun_id', 'urun_adi', 'adet', 'birim_fiyat', 'toplam_fiyat','toplam_odenen',
    						'kullanici_id', 'siparis_detay_id', 'siparis_kodu',  'created_at', 'updated_at'];

    protected $hidden = ['id'];
}