<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogMenu extends Model
{
    protected $table = "blog_menu";

    protected $fillable = ['menu_adi', 'menu_id', 'kategori_link', 'durum'];

    protected $hidden = ['id'];
}