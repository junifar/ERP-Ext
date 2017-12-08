<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function data(Request $request)
    {
//        $datas = SaleOrder::with('partner:id,name')
//            ->select('sale_order.client_order_ref', 'sale_order.partner_id');

        $datas = DB::table('sale_order')
            ->leftJoin('res_partner', 'sale_order.partner_id' , '=', 'res_partner.id')
            ->select('sale_order.id','client_order_ref',
                'sale_order.name as no_so', 'amount_total',
                'sale_order.date_order','res_partner.name');

        return DataTables::of($datas)
            ->addColumn('action', '<a href="\SalesOrder\{{$id}}" class="btn btn-primary">Detail</a>')
            ->filter(function($instance) use ($request){
                if ($request->has('name')) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        return Str::contains($row['name'], $request->get('name')) ? true : false;
                    });
                }
            })
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
