<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    protected $table = 'project_island';

    public function provinces(){
        return $this->hasMany('App\Province', 'island_id');
    }
}
