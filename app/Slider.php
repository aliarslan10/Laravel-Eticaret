<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "sliders";

    protected $fillable = ['slider_adi', 'slider_icerik', 'slider_resim_url','durum'];

    protected $hidden = ['id'];
}
