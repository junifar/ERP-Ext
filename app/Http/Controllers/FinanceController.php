<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{

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

        $budget_plan_ids = null;

        foreach ($budget_plan_line_datas as $data){
            $budget_plan_ids[] = $data->budget_plan_id;
        }

        $budget_plan_request = DB::table('budget_used_request')
            ->select(
                'budget_used_request.budget_item_id',
                DB::raw('sum(budget_used_request.request) as total')
            )
            ->groupBy(
                'budget_used_request.budget_item_id'
            )
            ->whereIn('budget_used_request.budget_item_id', $budget_plan_ids)
            ->get();

        $budget_plan_line_departments = $this->_reportBudgetDeptDetailGetDeptName($budget_plan_line_datas, $budget_plan_request);

        return view('finance.report_budget_dept_detail', compact('tahun', 'budget_plan_line_datas',
            'budget_plan_line_departments'));
    }

    private function _reportBudgetDeptDetailGetDeptName($datas, $budget_plan_request){
        $value = null;
        foreach ($datas as $data){
            $isfound = false;
            if($value){
                foreach ($value as $check){
                    if($check['department_name'] == $data->department_name){
                        $isfound = true;
                        break;
                    }
                }
            }
            if(!$isfound){
                $value_periode = $this->_getPeriodes($datas, $data, $budget_plan_request);
                $value[] = array('department_name' => $data->department_name, 'periodes' => $value_periode);
            }

        }
        return $value;
    }

    /**
     * @param $datas
     * @param $data
     * @return array|null
     */
    private function _getPeriodes($datas, $data, $budget_plan_request)
    {
        $value_periode = null;
        foreach ($datas as $data_check_periode) {
            if ($data_check_periode->department_name == $data->department_name) {
                $isfound_periode = false;
                if ($value_periode) {
                    foreach ($value_periode as $check_periode) {
                        if ($check_periode['date'] == $data_check_periode->date) {
                            $isfound_periode = true;
                            break;
                        }
                    }
                }
                if (!$isfound_periode) {
                    $value_budget_data = null;
                    foreach ($datas as $data_check_budget_data){
                        if($data_check_budget_data->department_name == $data->department_name &&
                            $data_check_budget_data->date == $data_check_periode->date){

                            $nilai_pengajuan = 0;
                            foreach ($budget_plan_request as $nilai_pengajuan_data){
                                if($nilai_pengajuan_data->budget_item_id == $data_check_budget_data->budget_plan_id){
                                    $nilai_pengajuan = $nilai_pengajuan_data->total;
                                    break;
                                }
                            }

                            $value_budget_data[] = array(
                                'budget_view_name' => $data_check_budget_data->budget_view_name,
                                'name' => $data_check_budget_data->name,
                                'amount' => $data_check_budget_data->amount,
                                'nilai_pengajuan' => $nilai_pengajuan,
                                'sisa_budget' => $data_check_budget_data->amount + $nilai_pengajuan,
//                                ((float)($data_check_budget_data->amount + $nilai_pengajuan)) / ((float)$data_check_budget_data->amount) * 100
                                'persentase_budget' => 9999
                            );
                        }
                    }
                    $value_periode[] = array('date' => $data_check_periode->date,
                        'periode_start' => $data_check_periode->periode_start,
                        'periode_end' => $data_check_periode->periode_end,
                        'datas' => $value_budget_data);
                }
            }
        }
        return $value_periode;
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
