<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function data(Request $request)
    {
        $datas = DB::table('sale_order')
            ->leftJoin('res_partner', 'sale_order.partner_id' , '=', 'res_partner.id')
            ->select('sale_order.id','client_order_ref',
                'sale_order.name as no_so', 'amount_total',
                'sale_order.date_order','res_partner.name')
            ->where('sale_order.name', 'ilike', "%{$request->get('name')}%")
            ->orWhere('res_partner.name', 'ilike', "%{$request->get('name')}%")
            ->orWhere('client_order_ref', 'ilike', "%{$request->get('name')}%");

        return DataTables::of($datas)
            ->addColumn('action', '<a href="\sales_order\detail\{{$id}}" class="btn btn-primary trigger">Detail</a>')
//            ->addColumn('action', '<a href="#" data-featherlight="\SalesOrder\{{$id}} .selector" class="btn btn-primary">Detail</a>')
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

    public function show($id)
    {
        //
        return $id;
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
