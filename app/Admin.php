<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";

    protected $fillable = ['kullanici_adi', 'sifre'];

    protected $hidden = ['id'];
}
