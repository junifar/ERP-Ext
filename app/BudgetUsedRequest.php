<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetUsedRequest extends Model
{
    protected $table = 'budget_used_request';

    public function budgetPlanLine(){
        return $this->belongsTo('App\BudgetPlanLine', 'budget_item_id');
    }
}
