<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopluMailSablonu extends Model
{
    protected $table = "toplu_mail";

    protected $fillable = ['konu', 'mesaj'];

    protected $hidden = ['id'];
}
