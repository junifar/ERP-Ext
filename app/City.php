<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'project_city';

    public function province(){
        return $this->belongsTo('App\Provinces', 'province_id');
    }
}
