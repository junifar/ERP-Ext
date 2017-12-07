<?php

namespace App\Http\Controllers;

use App\DataTables\SaleOrdersDataTable;
use App\SaleOrder;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index(SaleOrdersDataTable $dataTable)
    {
//        return SaleOrder::All();
//        return $dataTable->render('dashboard.index');
//        return DataTables::of(SaleOrder::query())->make(true);
        return view('dashboard.index');
    }

    public function data()
    {
//        return SaleOrder::with('partner')->take(10)->get();
        return DataTables::of(SaleOrder::query()->with('partner')->get(['client_order_ref', 'partner.id']))->make(true);
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
