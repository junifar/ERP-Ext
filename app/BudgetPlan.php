<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetPlan extends Model
{
    protected $table = 'budget_plan';

    public function budgetPlanLines(){
        return $this->hasMany('App\BudgetPlanLine', 'budget_id');
    }
}
