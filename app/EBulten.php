<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EBulten extends Model
{
    protected $table = "e_bulten";

    protected $fillable = ['eposta', 'updated_at', 'created_at'];

    protected $hidden = ['id'];
}