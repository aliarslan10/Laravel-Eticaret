<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogIcerik extends Model
{
    protected $table = "blog_icerik";

    protected $fillable = ['baslik', 'icerik', 'kategori_id', 'durum', 'link', 'resim_linki','tarih'];

    protected $hidden = ['id'];
}
