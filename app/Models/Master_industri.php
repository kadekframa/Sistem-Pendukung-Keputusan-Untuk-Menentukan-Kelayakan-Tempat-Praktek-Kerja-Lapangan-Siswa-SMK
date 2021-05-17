<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master_industri extends Model
{
    protected $table = 'tb_industri';

    public function biodata_industri()
    {
        return $this->hasOne('App\Models\Biodata','industri','id');
    }
}