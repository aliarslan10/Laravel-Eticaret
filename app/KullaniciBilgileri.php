<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KullaniciBilgileri extends Model
{
    protected $table = "kullanici_bilgileri";

    protected $fillable = ['mail_adresi', 'sifre', 'ad_soyad', 'kurum', 'yetki', 'cinsiyet', 'cep_telefonu'];

    protected $hidden = ['id'];
}