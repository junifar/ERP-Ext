<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function reportproject(){
        $years = $this->_get_ten_years();
        $site_types = $this->_get_site_types();
        $customers = $this->_get_customers();
        return view('finance.report_project', compact('years', 'site_types', 'customers'));
    }

    public function reportBudgetDept(){
        $budget_by_years = DB::table('budget_plan')
            ->select(
                'hr_department.name as department_name',
                DB::raw('EXTRACT(YEAR from periode_start) as tahun'),
                DB::raw('sum(budget_plan_line.amount) as total')
            )
            ->leftJoin('hr_department', 'budget_plan.department_id', '=', 'hr_department.id')
            ->leftJoin('budget_plan_line', 'budget_plan_line.budget_id', '=', 'budget_plan.id')
            ->groupBy(
                'hr_department.name',
                DB::raw('EXTRACT(YEAR from periode_start)')
            )
            ->orderBy('hr_department.name',
                DB::raw('EXTRACT(YEAR from periode_start)')
            )
            ->where('budget_plan.type', '=', 'department')
            ->get();
        return view('finance.report_budget_dept', compact('budget_by_years'));
    }

    public function reportBudgetDeptDetail($tahun){
        $budget_plan_line_datas = DB::table('budget_plan')
            ->select(
                'budget_plan_line.id',
                'hr_department.name as department_name',
                'budget_plan.id as budget_plan_id',
                'budget_plan.date',
                'budget_plan.periode_start',
                'budget_plan.periode_end',
                'budget_plan_line_view.name as budget_view_name',
                'budget_plan_line.name',
                'budget_plan_line.amount'
            )
            ->leftJoin('budget_plan_line', 'budget_plan_line.budget_id', '=', 'budget_plan.id')
            ->leftJoin('hr_department', 'hr_department.id', '=', 'budget_plan.department_id')
            ->leftJoin('budget_plan_line as budget_plan_line_view', 'budget_plan_line.parent_id', 'budget_plan_line_view.id')
            ->where('budget_plan_line.type', '<>', 'view')
            ->where('budget_plan.type', '=', 'department')
            ->orderBy('hr_department.name', 'asc')
            ->orderBy('budget_plan.date', 'asc')
            ->get();
        $budget_plan_line_departments = $this->_reportBudgetDeptDetailGetDeptName($budget_plan_line_datas);
        return $budget_plan_line_departments;
        $budget_plan_line_department_periods = $this->_reportBudgetDeptDetailGetDeptPeriode($budget_plan_line_datas, $budget_plan_line_departments);
        return $budget_plan_line_department_periods;
        return view('finance.report_budget_dept_detail', compact('tahun', 'budget_plan_line_datas',
            'budget_plan_line_departments'));
    }

    private function _reportBudgetDeptDetailGetDeptName($datas){
        $value = null;
        foreach ($datas as $data){
            $isfound = false;
            if($value){
                foreach ($value as &$check){
                    if($check == $data->department_name){
                        $isfound = true;
                        break;
                    }
                }
            }
            if(!$isfound)
                $value[] = $data->department_name;
        }
        return $value;
    }

    private function _reportBudgetDeptDetailGetDeptPeriode($datas, $departments){
        $value = null;
        foreach ($departments as $department){
            $value_data = null;
            foreach ($datas as $data){
                if($data->department_name == $department){
                    $value_data[] =  array($data->budget_plan_id, sprintf('%s - %s', $data->periode_start, $data->periode_end));
                }
                $value[$department] = $value_data;
            }
        }
        return $value;
    }

    private function _get_ten_years(){
        $currentYear = date("Y") - 5;
        $years[$currentYear] = $currentYear;
        for ($i=1; $i<9; $i++){
            $years[$currentYear+$i] = $currentYear+$i;
        }
        return $years;
    }

    private function _get_site_types(){
        return DB::table('project_site_type')
            ->select('id', 'name')
            ->pluck('name', 'id');
    }

    private function _get_customers(){
        return DB::table('sale_order')
            ->leftJoin('res_partner', 'sale_order.partner_id', 'res_partner.id')
            ->select('res_partner.id', 'res_partner.name')
            ->orderBy('name', 'asc')
            ->distinct()
            ->pluck('name','id');
    }
}
