<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteAyarlari extends Model
{
    protected $table = "site_ayarlari";

    protected $fillable = ['enust_bilgi', 'footer1', 'footer2', 'faceboook', 'twitter', 'linkedin', 'google_plus', 'title', 'durum'];

    protected $hidden = ['id'];
}
