<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SabitSayfaKategori extends Model
{
    protected $table = "sabit_sayfa_kategori";

    protected $fillable = ['kategori', 'durum', 'alt_menu', 'link', 'menudeki_yeri', 'sira'];

    protected $hidden = ['id'];
}