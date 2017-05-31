<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiparisDetaylari extends Model
{
    protected $table = "siparis_detaylari";

    protected $fillable = ['ad_soyad', 'mail_adresi', 'tckimlik','ulke', 'sehir', 'adres', 'cep_telefonu', 'odeme_turu', 'kullanici_id', 'toplam_odenen', 'siparis_kodu'];

    protected $hidden = ['id'];
}