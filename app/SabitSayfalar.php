<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SabitSayfalar extends Model
{
    protected $table = "sabit_sayfalar";

    protected $fillable = ['sayfa_adi', 'sayfa_icerik', 'durum', 'sayfa_linki', 'resim_linki', 'menudeki_yeri', 'kategori_id', 'kisa_aciklama', 'icon','description'];

    protected $hidden = ['id'];
}
