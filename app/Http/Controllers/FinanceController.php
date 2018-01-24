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
        return view('finance.report_budget_dept_detail', compact('tahun'));
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
