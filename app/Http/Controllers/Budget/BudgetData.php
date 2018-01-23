<?php
/**
 * Created by PhpStorm.
 * User: prasetia
 * Date: 1/23/2018
 * Time: 9:02 AM
 */

namespace App\Http\Controllers\Budget;


class BudgetData
{
    var $budget_no;
    var $budget_date;
    var $amount_total;
    var $actual_budget;
    var $budget_remaining;
    var $budget_used_request;

    /**
     * BudgetData constructor.
     * @param $budget_no
     * @param $budget_date
     * @param $amount_total
     * @param $actual_budget
     * @param $budget_remaining
     * @param $budget_used_request
     */
    public function __construct($budget_no, $budget_date, $amount_total, $actual_budget, $budget_remaining, $budget_used_request)
    {
        $this->budget_no = $budget_no;
        $this->budget_date = $budget_date;
        $this->amount_total = $amount_total;
        $this->actual_budget = $actual_budget;
        $this->budget_remaining = $budget_remaining;
        $this->budget_used_request = $budget_used_request;
    }

    /**
     * @return mixed
     */
    public function getBudgetUsedRequest()
    {
        return $this->budget_used_request;
    }

    /**
     * @param mixed $budget_used_request
     */
    public function setBudgetUsedRequest($budget_used_request)
    {
        $this->budget_used_request = $budget_used_request;
    }

    /**
     * @return mixed
     */
    public function getBudgetRemaining()
    {
        return $this->budget_remaining;
    }

    /**
     * @param mixed $budget_remaining
     */
    public function setBudgetRemaining($budget_remaining)
    {
        $this->budget_remaining = $budget_remaining;
    }

    /**
     * @return mixed
     */
    public function getActualBudget()
    {
        return $this->actual_budget;
    }

    /**
     * @param mixed $actual_budget
     */
    public function setActualBudget($actual_budget)
    {
        $this->actual_budget = $actual_budget;
    }

    /**
     * @return mixed
     */
    public function getBudgetDate()
    {
        return $this->budget_date;
    }

    /**
     * @param mixed $budget_date
     */
    public function setBudgetDate($budget_date)
    {
        $this->budget_date = $budget_date;
    }

    /**
     * @return mixed
     */
    public function getAmountTotal()
    {
        return $this->amount_total;
    }

    /**
     * @param mixed $amount_total
     */
    public function setAmountTotal($amount_total)
    {
        $this->amount_total = $amount_total;
    }


    /**
     * @return mixed
     */
    public function getBudgetNo()
    {
        return $this->budget_no;
    }

    /**
     * @param mixed $budget_no
     */
    public function setBudgetNo($budget_no)
    {
        $this->budget_no = $budget_no;
    }
}