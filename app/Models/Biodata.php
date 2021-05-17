<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'tb_biodata';

    public function industri_r()
    {
    	return $this->belongsTo('App\Models\Master_industri','industri','id');
    }

    public function users_r()
    {
    	return $this->belongsTo('App\User','users','id');
    }

    public function status_r()
    {
    	return $this->belongsTo('App\Models\Status','status','id');
    }

    public function statuspenilaian_r()
    {
        return $this->belongsTo('App\Models\Statuspenilaian','status_penilaian','id');
    }

    public function bobotk1_r()
    {
        return $this->belongsTo('App\Models\Master_bobot','bobot_k1','id');
    }

    public function bobotk2_r()
    {
        return $this->belongsTo('App\Models\Master_bobot','bobot_k2','id');
    }

    public function bobotk3_r()
    {
        return $this->belongsTo('App\Models\Master_bobot','bobot_k3','id');
    }

    public function bobotk4_r()
    {
        return $this->belongsTo('App\Models\Master_bobot','bobot_k4','id');
    }
}
