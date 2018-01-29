<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'project_province';

    public function island(){
        return $this->belongsTo('App\Island', 'island_id');
    }

    public function cities(){
        return $this->hasMany('App\City', 'province_id');
    }
}
