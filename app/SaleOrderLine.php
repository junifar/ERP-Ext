<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrderLine extends Model
{
    protected $table = 'sale_order_line';

    public function sale_order(){
        return $this->belongsTo('App\SaleOrder', 'order_id');
    }

    public function project_project(){
        return $this->belongsTo('App\Project', 'project_id');
    }
}
