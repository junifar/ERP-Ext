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
                            @foreach($budget_by_years as $data)
                                <tr>
                                    <td>{{ $data->tahun }}</td>
                                    <td>{{ number_format($data->total,2, ',', '.') }}</td>
                                    <td>{{ number_format($data->realization,2, ',', '.') }}</td>
                                    <td><a href="{!! route('finance.report_budget_dept_detail', [$data->tahun]); !!}">show</a></td>
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
                            @foreach($budget_by_years as $data)
                                {"label": "{{ $data->tahun }}"},
                            @endforeach
                        ]
                    }],
                    "dataset": [{
                        "seriesname": "Budget Plan",
                        "data": [
                            @foreach($budget_by_years as $data)
                            {"value": "{{ $data->total }}"},
                            @endforeach
                        ]
                    },{
                        "seriesname": "Realization",
                        "data": [
                            @foreach($budget_by_years as $data)
                            {"value": "{{ $data->realization }}"},
                            @endforeach
                        ]
                    }]
                }
            });
            fusioncharts.render();
        });
    </script>
@endpush