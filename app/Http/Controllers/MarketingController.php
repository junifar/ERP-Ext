<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketingController extends Controller
{
    public function index()
    {
        $total_site = DB::table('project_site')
            ->count();

        $total_project = DB::table('project_project')
            ->leftJoin('sale_order_line', 'sale_order_line.project_id', '=', 'project_project.id')
            ->leftJoin('sale_order', 'sale_order_line.order_id', '=', 'sale_order.id')
            ->where(DB::raw('EXTRACT (YEAR FROM sale_order.date_order)'), '<>', 214)
            ->whereIn('project_project.site_type_id', [1, 2, 3, 5, 6, 7, 8, 10])
            ->count();

        $so_per_state = DB::table('sale_order')
            ->select(
                'sale_order.state',
                DB::raw('COUNT(ID) AS total')
            )->groupBy(
                'sale_order.state'
            )->orderBy(
                DB::raw('COUNT(ID)'), 'desc'
            )->get();

        $total_so_customer = DB::table('sale_order')
            ->select(
                DB::raw('COUNT(ID) AS total'),
                DB::raw('COUNT(MEMO_INTERNAL) AS total_mi')
            )
            ->whereNotNull('sale_order.client_order_ref')
            ->where('sale_order.state', '<>', 'cancel')
            ->get();
        $total_so_customer_null = DB::table('sale_order')
            ->select(
                DB::raw('COUNT(ID) AS total'),
                DB::raw('COUNT(MEMO_INTERNAL) AS total_mi')
            )
            ->whereNull('sale_order.client_order_ref')
            ->where('sale_order.state', '<>', 'cancel')
            ->get();
        $total_so_cancel = DB::table('sale_order')->where('sale_order.state', '=', 'cancel')->count();

        return view('marketing.index', compact('total_site', 'total_project', 'so_per_state',
            'total_so_customer', 'total_so_customer_null',
            'total_so_cancel'));
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
}
