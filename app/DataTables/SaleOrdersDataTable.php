<?php

namespace App\DataTables;

use App\SaleOrder;
use Yajra\DataTables\Services\DataTable;

class SaleOrdersDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query);
    }
    public function query(SaleOrder $model)
    {
        return $model->query()->select('id', 'client_order_ref');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax();
//                    ->addAction(['width' => '80px'])
//                    ->parameters($this->getBuilderParameters());

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'client_order_ref'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'saleordersdatatable_' . time();
    }
}
