@extends('layout')

@section('title')
    Report Project
@endsection

@push('css-head')
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
                        Monitoring Budget Dept
                    </h4>
                    <div id="chart-container">Fetching Data...</div>

                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                    <th>Budget Plan</th>
                                    <th>Realisasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2013</td>
                                    <td>2.000.000.000,00</td>
                                    <td>3.000.000.000,00</td>
                                    <td><a href="{!! route('finance.report_budget_dept_detail', [2013]); !!}">show</a></td>
                                </tr>
                                <tr>
                                    <td>2014</td>
                                    <td>2.000.000.000,00</td>
                                    <td>3.000.000.000,00</td>
                                    <td><a href="{!! route('finance.report_budget_dept_detail',[2014]); !!}">show</a></td>
                                </tr>
                                <tr>
                                    <td>2015</td>
                                    <td>2.000.000.000,00</td>
                                    <td>3.000.000.000,00</td>
                                    <td><a href="{!! route('finance.report_budget_dept_detail',[2015]); !!}">show</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--fusion Chart--}}
    <script src="{{asset('plugins/fusioncharts/js/fusioncharts.js')}}"></script>
    <script src="{{asset('plugins/fusioncharts/js/themes/fusioncharts.theme.fint.js?cacheBust=56')}}"></script>

    <script type="application/javascript">
        FusionCharts.ready(function(){
            var fusioncharts = new FusionCharts({
                type: 'mscolumn2d',
                renderAt: 'chart-container',
                width: '850',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "theme": "fint",
                        // "caption": "PO Customer By Status",
                        // "subCaption": "",
                        "xAxisname": "Status",
                        "yAxisName": "Total",
                        "showSum": "1",
                        "numberPrefix": "",
                        "showvalues": "0",
                        "outCnvBaseFont": "Arial",
                        "outCnvBaseFontSize": "12",
                        "outCnvBaseFontColor": "#000000",
                        "rotateValues": "0",
                        "placeValuesInside": "0",
                        "valueFontColor": "#000000",
                        "valueBgColor": "#FFFFFF",
                        "valueBgAlpha": "50",
                        "formatNumberScale": "0",
                        "decimalSeparator": ",",
                        "thousandSeparator": "."
                    },
                    "categories": [{
                        "category": [
                            {"label": "2013"},
                            {"label": "2014"},
                            {"label": "2015"}
                        ]
                    }],
                    "dataset": [{
                        "seriesname": "Budget Plan",
                        "data": [
                            {"value": "100"},
                            {"value": "200"},
                            {"value": "300"}
                        ]
                    },{
                        "seriesname": "Realization",
                        "data": [
                            {"value": "400"},
                            {"value": "500"},
                            {"value": "600"}
                        ]
                    }]
                }
            });
            fusioncharts.render();
        });
    </script>
@endpush