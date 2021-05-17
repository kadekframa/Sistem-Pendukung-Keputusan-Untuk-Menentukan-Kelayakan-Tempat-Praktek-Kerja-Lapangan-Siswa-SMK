<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    protected $table = 'tb_seleksi';

    public function siswa_r(){
    	return $this->belongsTo('App\Models\Master_siswa','siswa','id');
    }

    public function tahun_angkatan_r()
    {
    	return $this->belongsTo('App\Models\Master_siswa','tahun_angkatan','id');
    }

    public function industri_r()
    {
    	return $this->belongsTo('App\Models\Master_industri','industri','id');
    }

    public function bobot_r()
    {
        return $this->belongsTo('App\Models\Master_bobot','bobot','id');
    }
}
