<?php
/**
 * Created by PhpStorm.
 * User: prasetia
 * Date: 1/25/2018
 * Time: 6:35 PM
 */

namespace App\Http\Controllers\Budget;


class BudgetDept
{
    var $deptName;
    var $periode;

    /**
     * BudgetDept constructor.
     * @param $deptName
     * @param $periode
     */
    public function __construct($deptName, $periode)
    {
        $this->deptName = $deptName;
        $this->periode = $periode;
    }

    /**
     * @return mixed
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * @param mixed $periode
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;
    }

    /**
     * @return mixed
     */
    public function getDeptName()
    {
        return $this->deptName;
    }

    /**
     * @param mixed $deptName
     */
    public function setDeptName($deptName)
    {
        $this->deptName = $deptName;
    }
}