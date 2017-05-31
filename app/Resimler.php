<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resimler extends Model
{
    protected $table = "resimler";

    protected $fillable = ['r_resim', 'r_aciklama', 'r_kategori_id'];

    protected $hidden = ['r_id'];
}
