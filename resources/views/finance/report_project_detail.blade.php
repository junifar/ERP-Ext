@extends('layout')

@section('title')
    Report Project Detail
@endsection

@push('css-head')
    {{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.jqueryui.min.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <style type="text/css">
        .form-label{
            margin-bottom: 0;
            font-weight: 300;
        }

        .form-control-label {
            margin-bottom: 0;
            text-align: left;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Report Project Detail
                    </h4>
                    <div class="row col-md-12">
                        <table class="display compact nowrap" id="project_data" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Site</th>
                                <th>Start Payment</th>
                                <th>Site ID</th>
                                <th>Customer</th>
                                <th>Type Project</th>
                                <th>Estimasi Nilai PO</th>
                                <th>Estimasi Budget</th>
                                <th>Gross Margin</th>
                                <th>%</th>
                                <th>Realisasi Budget</th>
                                <th>No PO</th>
                                <th>Nilai PO</th>
                                <th>No Invoice</th>
                                <th>Laba / Rugi</th>
                                <th>%</th>
                                <th>Status Inv</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($resume_project as $data)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $data->site_name }}</td>
                                    <td>$data->start_payment</td>
                                    <td>{{ $data->project_id }}</td>
                                    <td>{{ $data->customer_name }}</td>
                                    <td>{{ $data->project_type }}</td>
                                    <td>
                                        <div class="pull-right">
                                            @foreach( $data->budget_plans as $values)
                                                {{ number_format(!empty($values->estimate_po)?$values->estimate_po:0,2, ',', '.') }}
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $estimate_po = 0;
                                            $amount_total = 0;
                                        @endphp
                                        @foreach( $data->budget_plans as $values)
                                            @php
                                                $estimate_po = isset($values->estimate_po)?$values->estimate_po:0;
                                                $amount_total = isset($values->amount_total)?$values->amount_total:0;
                                            @endphp
                                            {{ number_format(isset($values->amount_total)?$values->amount_total:0,2, ',', '.') }}
                                        @endforeach
                                    </td>
                                    <td>{{ number_format($estimate_po-$amount_total,2, ',', '.') }}</td>
                                    <td>{{ number_format(($estimate_po != 0)?(float)($estimate_po-$amount_total)/(float)$estimate_po : 0, 2) }}%</td>
                                    <td>Realisasi Budget</td>
                                    <td>{{ $data->client_order_ref }}</td>
                                    <td>{{ number_format($data->nilai_po,2, ',', '.') }}</td>
                                    <td>No Invoice</td>
                                    <td>Laba / Rugi</td>
                                    <td>%</td>
                                    <td>Status Inv</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.jqueryui.min.js"></script>--}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var oTable = $('#project_data').DataTable({
                scrollX: true,
                bPaginate: true,
                searching: false,
                ordering: false,
                bInfo : false,
                fixedColumns: true,
                columnDefs: [
                    { width: 10, targets: [0, 9, 15] },
                    { width: 150, targets: [1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12, 13, 14, 16] }
                ]
            });
        });
    </script>
@endpush