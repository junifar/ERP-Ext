<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    protected $table = 'sale_order';

    public function partner(){
        return $this->belongsTo('App\ResPartner', 'partner_id');
    }
}