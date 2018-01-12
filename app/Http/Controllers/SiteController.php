<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class SiteController extends Controller
{
    public function index()
    {
        //
        return view('site.index');
    }

    public function index_data(Request $request){
        $datas = DB::table('project_site')
            ->leftJoin('project_area', 'project_site.area_id' , '=', 'project_area.id')
            ->select(
                'project_site.id', 'project_site.name',
                'site_id_customer', 'site_alias1',
                'site_alias2', 'project_area.name as area_name')
            ->where('project_site.name', 'ilike', "%{$request->get('name')}%")
            ->orWhere('site_id_customer', 'ilike', "%{$request->get('name')}%");

        return DataTables::of($datas)
            ->addColumn('action', '<a href="\site\detail\{{$id}}" class="btn btn-primary trigger">Detail</a>')
            ->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function getSiteData($sheet, $id){
        $data = DB::table('project_site')
            ->leftJoin('project_area', 'project_site.area_id' , '=', 'project_area.id')
            ->leftJoin('project_tinggi_tower', 'project_site.tinggi_tower_id', '=', 'project_tinggi_tower.id')
            ->leftJoin('project_tower_type', 'project_site.tower_type_id', '=', 'project_tower_type.id')
            ->select(
                'project_site.id', 'project_site.name','site_id_prasetia',
                'project_tinggi_tower.name as tinggi_tower', 'project_area.name as area_name',
                'project_tower_type.name as tower_type_name'
            )
            ->where('project_site.id', '=', "{$id}")->first();
        $sheet->Row(1, array('Site Name : ', $data->name));
        $sheet->Row(2, array('Site ID : ', $data->site_id_prasetia));
        $sheet->Row(3, array('Tower Height : ', $data->tower_type_name . ' ' . $data->tinggi_tower));
        $sheet->Row(4, array('Province : ', $data->area_name));
    }

    public function getExportBody($sheet, $id){
        $sum_nilai_po = 0;
        $sum_nilai_penagihan = 0;
        $sum_budget = 0;
        $sum_realisasi = 0;
        $sum_laba = 0;
        $row_count = 8;

        $data_po = DB::table('sale_order_line')
            ->leftJoin('sale_order', 'sale_order_line.order_id', '=', 'sale_order.id')
            ->leftJoin('project_project', 'sale_order_line.project_id', '=', 'project_project.id')
            ->leftJoin('project_site_type', 'project_project.site_type_id', '=', 'project_site_type.id')
            ->leftJoin('project_misc_category', 'project_project.misc_category_id', '=', 'project_misc_category.id')
            ->leftJoin('project_misc_work', 'project_project.misc_work_id', '=', 'project_misc_work.id')
            ->leftJoin('account_invoice_line', 'account_invoice_line.project_id', '=', 'project_project.id')
            ->leftJoin('account_invoice', 'account_invoice_line.invoice_id', '=', 'account_invoice.id')
            ->leftJoin('budget_plan', 'budget_plan.project_id', '=', 'project_project.id')
            ->leftJoin('budget_plan_line', 'budget_plan_line.budget_id', '=', 'budget_plan.id')
            ->leftJoin('budget_used', 'budget_used.budget_item_id', '=', 'budget_plan_line.id')
            ->where('project_project.site_id', '=', "{$id}")
            ->where('sale_order.state', '=', DB::raw("'progress'"))
            ->wherein('account_invoice.state', ['open', 'paid'])
            ->where('account_invoice.type', '=', DB::raw("'out_invoice'"))
            ->select(
                'sale_order.state',
                'sale_order_line.id',
                'sale_order_line.price_unit',
                'sale_order_line.product_uom_qty',
                'sale_order.client_order_ref',
                'project_site_type.name as site_type',
                'project_misc_category.name as work_category',
                'project_misc_work.name as work_description',
                'account_invoice.name_sequence as no_invoice',
                'account_invoice.amount_total',
                'account_invoice.state',
                'account_invoice.last_payment_date',
                'budget_plan.state as budget_state',
                DB::raw('sum(budget_plan_line.amount) as budget_total'),
                DB::raw('sum(budget_used.amount) as realisasi'))
            ->groupBy('sale_order.state',
                'sale_order_line.id',
                'sale_order_line.price_unit',
                'sale_order_line.product_uom_qty',
                'sale_order.client_order_ref',
                'project_site_type.name',
                'project_misc_category.name',
                'project_misc_work.name',
                'account_invoice.name_sequence',
                'account_invoice.state',
                'account_invoice.last_payment_date',
                'budget_plan.state',
                'account_invoice.amount_total')
            ->get();

        $data_po_count = DB::table('sale_order_line')
            ->leftJoin('sale_order', 'sale_order_line.order_id', '=', 'sale_order.id')
            ->leftJoin('project_project', 'sale_order_line.project_id', '=', 'project_project.id')
            ->leftJoin('project_site_type', 'project_project.site_type_id', '=', 'project_site_type.id')
            ->leftJoin('project_misc_category', 'project_project.misc_category_id', '=', 'project_misc_category.id')
            ->leftJoin('project_misc_work', 'project_project.misc_work_id', '=', 'project_misc_work.id')
            ->leftJoin('account_invoice_line', 'account_invoice_line.project_id', '=', 'project_project.id')
            ->leftJoin('account_invoice', 'account_invoice_line.invoice_id', '=', 'account_invoice.id')
            ->leftJoin('budget_plan', 'budget_plan.project_id', '=', 'project_project.id')
            ->leftJoin('budget_plan_line', 'budget_plan_line.budget_id', '=', 'budget_plan.id')
            ->leftJoin('budget_used', 'budget_used.budget_item_id', '=', 'budget_plan_line.id')
            ->where('project_project.site_id', '=', "{$id}")
            ->where('sale_order.state', '=', DB::raw("'progress'"))
            ->wherein('account_invoice.state', ['open', 'paid'])
            ->where('account_invoice.type', '=', DB::raw("'out_invoice'"))
            ->select(
                'sale_order.state',
                'sale_order_line.id',
                'sale_order_line.price_unit',
                'sale_order_line.product_uom_qty',
                'sale_order.client_order_ref',
                'project_site_type.name as site_type',
                'project_misc_category.name as work_category',
                'project_misc_work.name as work_description',
                'account_invoice.name_sequence as no_invoice',
                'account_invoice.amount_total',
                'account_invoice.state',
                'account_invoice.last_payment_date',
                'budget_plan.state as budget_state',
                DB::raw('sum(budget_plan_line.amount) as budget_total'),
                DB::raw('sum(budget_used.amount) as realisasi'))
            ->groupBy('sale_order.state',
                'sale_order_line.id',
                'sale_order_line.price_unit',
                'sale_order_line.product_uom_qty',
                'sale_order.client_order_ref',
                'project_site_type.name',
                'project_misc_category.name',
                'project_misc_work.name',
                'account_invoice.name_sequence',
                'account_invoice.state',
                'account_invoice.last_payment_date',
                'budget_plan.state',
                'account_invoice.amount_total')
            ->count();

        if($data_po_count == 0):
            $data_po_header = DB::table('project_project')
                ->leftJoin('budget_plan', 'project_project.id', '=', 'budget_plan.project_id')
                ->leftJoin('budget_plan_line', 'budget_plan.id', '=', 'budget_plan_line.budget_id')
                ->leftJoin('budget_used', 'budget_used.budget_item_id', '=', 'budget_plan_line.id')
                ->leftJoin('sale_order_line', 'sale_order_line.project_id', '=', 'project_project.id')
                ->leftJoin('sale_order', 'sale_order_line.order_id', '=', 'sale_order.id')
                ->leftJoin('account_invoice_line', 'account_invoice_line.project_id', '=', 'project_project.id')
                ->leftJoin('account_invoice', 'account_invoice_line.invoice_id', '=', 'account_invoice.id')
                ->leftJoin('project_site_type', 'project_project.site_type_id', '=', 'project_site_type.id')
                ->leftJoin('project_misc_category', 'project_project.misc_category_id', '=', 'project_misc_category.id')
                ->leftJoin('project_misc_work', 'project_project.misc_work_id', '=', 'project_misc_work.id')
                ->where('project_project.site_id', '=', "{$id}")
                ->whereNotNull('budget_plan.id')
                ->select(
                    'sale_order.state',
                    'sale_order_line.id',
                    'sale_order_line.price_unit',
                    'sale_order_line.product_uom_qty',
                    'sale_order.client_order_ref',
                    'project_site_type.name as site_type',
                    'project_misc_category.name as work_category',
                    'project_misc_work.name as work_description',
                    DB::raw('sum(account_invoice.amount_total) as subtotal'),
                    'budget_plan.name',
                    'budget_plan.state as budget_state',
                    DB::raw('sum(budget_plan_line.amount) as budget_total'),
                    DB::raw('sum(budget_used.amount) as realisasi')
                )
                ->groupBy(
                    'sale_order.state',
                    'sale_order_line.id',
                    'sale_order_line.price_unit',
                    'sale_order_line.product_uom_qty',
                    'sale_order.client_order_ref',
                    'project_site_type.name',
                    'project_misc_category.name',
                    'project_misc_work.name',
                    'budget_plan.state',
                    'budget_plan.name'
                )->get();

            foreach ($data_po_header as $row):
                $sheet->Row($row_count++, array(
                    '', '', '',
                    '', '', $row->budget_total,
                    $row->realisasi, $row->budget_total + $row->realisasi, '',
                    '', ''
                ));
                $sum_budget += $row->budget_total;
                $sum_realisasi += $row->realisasi;
                $sum_laba += $row->budget_total - $row->realisasi;
            endforeach;
        endif;

        foreach ($data_po as $row ):

            $sheet->Row($row_count++, array(
                $row->site_type, $row->client_order_ref, $row->price_unit * $row->product_uom_qty,
                $row->no_invoice, $row->amount_total, $row->budget_total,
                $row->realisasi, $row->amount_total - $row->realisasi, $row->last_payment_date,
                '', $row->state
            ));
            $sum_nilai_po += $row->price_unit * $row->product_uom_qty;
            $sum_nilai_penagihan += $row->amount_total;
            $sum_budget += $row->budget_total;
            $sum_realisasi += $row->realisasi;
            $sum_laba += $row->amount_total - $row->realisasi;
        endforeach;

        $sheet->setBorder('A8:K'. $row_count, 'thin');

        $sheet->Row($row_count, array(
            'Sub Total', '', $sum_nilai_po,
            '', $sum_nilai_penagihan, $sum_budget,
            $sum_realisasi, $sum_laba, '',
            '', ''
        ));
    }

    public function export($id){

        if(!$id){
            abort(404);
        }

        return Excel::create('Sample',function($excel) use ($id) {
            $excel->sheet('Site Financial', function($sheet) use ($id) {

                $sheet->setColumnFormat(array(
                    'C' => '#,##0.00',
                    'E' => '#,##0.00',
                    'F' => '#,##0.00',
                    'H' => '#,##0.00'
                ));

                $sheet->cells('A6:K7', function($cells) {
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                });

                $sheet->setBorder('A6:K7', 'thin');
//                $sheet->setBorder('A7:K7', 'thin');

                $this->getSiteData($sheet, $id);

                $sheet->Row(6, array(
                    'Jenis PO', 'Nomor PO', 'Nilai PO',
                    'No INV', 'Nilai Penagihan', 'Budget',
                    'Realisasi', 'Realisasi Laba/Rugi', 'Start Payment',
                    'End Project', 'Status INV'
                ));
                $sheet->Row(7, array(
                    '', '', '',
                    '', '(a)', '',
                    '(b)', '(a-b)', '',
                    '', ''
                ));
                $this->getExportBody($sheet, $id);
            });
        })->download('xls');
    }

    public function show($id)
    {
        if(!$id){
            abort(404);
        }
        $data = DB::table('project_site')
            ->leftJoin('project_area', 'project_site.area_id' , '=', 'project_area.id')
            ->select(
                'project_site.id', 'project_site.name',
                'site_id_customer', 'site_alias1',
                'site_alias2', 'project_area.name as area_name')
            ->where('project_site.id', '=', "{$id}")->first();

        $data_po_header = DB::table('sale_order_line')
            ->leftJoin('sale_order', 'sale_order_line.order_id', '=', 'sale_order.id')
            ->leftJoin('project_project', 'sale_order_line.project_id', '=', 'project_project.id')
            ->leftJoin('project_site_type', 'project_project.site_type_id', '=', 'project_site_type.id')
            ->leftJoin('project_misc_category', 'project_project.misc_category_id', '=', 'project_misc_category.id')
            ->leftJoin('project_misc_work', 'project_project.misc_work_id', '=', 'project_misc_work.id')
            ->leftJoin('account_invoice_line', 'account_invoice_line.project_id', '=', 'project_project.id')
            ->leftJoin('account_invoice', 'account_invoice_line.invoice_id', '=', 'account_invoice.id')
            ->where('project_project.site_id', '=', "{$id}")
            ->where('sale_order.state', '=', DB::raw("'progress'"))
//            ->where('account_invoice.state', '=', DB::raw("'paid'"))
//            ->where('account_invoice.type', '=', DB::raw("'out_invoice'"))
            ->select(
                'sale_order.state',
                'sale_order_line.id',
                'sale_order_line.price_unit',
                'sale_order_line.product_uom_qty',
                'sale_order.client_order_ref',
                'project_site_type.name as site_type',
                'project_misc_category.name as work_category',
                'project_misc_work.name as work_description',
                DB::raw('sum(account_invoice.amount_total) as subtotal'))
            ->groupBy('sale_order.state',
                'sale_order_line.id',
                'sale_order_line.price_unit',
                'sale_order_line.product_uom_qty',
                'sale_order.client_order_ref',
                'project_site_type.name',
                'project_misc_category.name',
                'project_misc_work.name')->get();

        $data_po = DB::table('sale_order_line')
            ->leftJoin('sale_order', 'sale_order_line.order_id', '=', 'sale_order.id')
            ->leftJoin('project_project', 'sale_order_line.project_id', '=', 'project_project.id')
            ->leftJoin('account_invoice_line', 'account_invoice_line.project_id', '=', 'project_project.id')
            ->leftJoin('account_invoice', 'account_invoice_line.invoice_id', '=', 'account_invoice.id')
            ->leftJoin('budget_plan', 'budget_plan.project_id', '=', 'project_project.id')
            ->leftJoin('budget_plan_line', 'budget_plan_line.budget_id', '=', 'budget_plan.id')
            ->leftJoin('budget_used', 'budget_used.budget_item_id', '=', 'budget_plan_line.id')
            ->where('project_project.site_id', '=', "{$id}")
            ->where('sale_order.state', '=', DB::raw("'progress'"))
            ->wherein('account_invoice.state', ['open', 'paid'])
            ->where('account_invoice.type', '=', DB::raw("'out_invoice'"))
            ->select(
                'sale_order_line.id',
                'sale_order_line.price_unit',
                'sale_order_line.product_uom_qty',
                'account_invoice.name_sequence as no_invoice',
                'account_invoice.amount_total',
                'account_invoice.state',
                'budget_plan.state as budget_state',
                DB::raw('sum(budget_plan_line.amount) as budget_total'),
                DB::raw('sum(budget_used.amount) as realisasi'))
            ->groupBy('sale_order_line.id',
                'sale_order_line.price_unit',
                'sale_order_line.product_uom_qty',
                'account_invoice.name_sequence',
                'account_invoice.state',
                'budget_plan.state',
                'account_invoice.amount_total')
//            ->toSql();
            ->get();
//        $data_po = DB::table('budget_plan')->select('id')->get();
//        return $data_po;

        return view('site.show', compact('data','data_po_header', 'data_po', 'id'));
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
}
