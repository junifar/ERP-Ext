<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetPlanLine extends Model
{
    protected $table = 'budget_plan_line';

    public function budget(){
        return $this->belongsTo('App\Budget', 'budget_id');
    }

    public function budgetUsedRequests(){
        return $this->hasMany('App\BudgetUsedRequest', 'budget_item_id');
    }
}
