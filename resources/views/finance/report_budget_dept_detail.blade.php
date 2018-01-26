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

        table, thead, tbody, th, td {
            border: 1px solid black !important;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">

                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Monitoring Budget Dept {{ $tahun }}
                    </h4>
                    <br/>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            @php
                                $active = true;
                            @endphp
                            @foreach($budget_plan_line_departments as $data)
                                <li {{ ($active)?'class="active"':'' }}><a href="#tab_{{ strtolower(str_replace(' ', '', $data['department_name'])) }}" data-toggle="tab">{{ $data['department_name'] }}</a></li>
                                @php
                                    $active=false;
                                @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @php
                                $active = true;
                                $dept_subtotal = null;
                            @endphp
                            @foreach($budget_plan_line_departments as $data)
                                <div class="tab-pane {{ ($active)?'active':'' }}" id="tab_{{ strtolower(str_replace(' ', '', $data['department_name'])) }}">
                                    <h3>{{ $data['department_name'] }}</h3>
                                    <div class="row col-md-12">
                                        <div id="chart-container-{{ strtolower(str_replace(' ', '', $data['department_name'])) }}">Fetching Data {{ strtolower(str_replace(' ', '', $data['department_name'])) }}...</div>
                                    </div>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Budget View</th>
                                            <th>Budget Item</th>
                                            <th>Nilai Budget</th>
                                            <th>Nilai Pengajuan</th>
                                            <th>Sisa Budget</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $subtotal = null;
                                        @endphp
                                        @foreach($data['periodes'] as $periode)
                                            <tr>
                                                <th colspan="8" style="background-color: #ecefeb">{{ sprintf("%s s/d %s", $periode['periode_start'], $periode['periode_end']) }}</th>
                                            </tr>
                                            @php
                                                $nilai_budget_subtotal = 0;
                                                $nilai_pengajuan_subtotal = 0;
                                            @endphp
                                            @foreach($periode['datas'] as $item)
                                                <tr>
                                                    <td>{{ $item['budget_view_name'] }}</td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td> <div class="pull-right">{{ number_format($item['amount'],2, ',', '.') }}</div></td>
                                                    <td><div class="pull-right">{{ number_format($item['nilai_pengajuan'],2, ',', '.') }}</div></td>
                                                    <td><div class="pull-right">{{ number_format($item['sisa_budget'],2, ',', '.') }}</div></td>
                                                </tr>
                                                @php
                                                    $nilai_budget_subtotal += $item['amount'];
                                                    $nilai_pengajuan_subtotal += $item['nilai_pengajuan'];
                                                @endphp
                                            @endforeach
                                            @php
                                                $subtotal[] = array('periode' => $periode['periode_start'] .' s/d '. $periode['periode_end'],'nilai_budget_subtotal' => $nilai_budget_subtotal,
                                                'nilai_pengajuan_subtotal' => $nilai_pengajuan_subtotal);
                                            @endphp
                                            <tr>
                                                <th colspan="2" style="background-color: #ecefeb">Sub Total</th>
                                                <th style="background-color: #ecefeb"><div class="pull-right">{{ number_format($nilai_budget_subtotal,2, ',', '.') }}</div></th>
                                                <th style="background-color: #ecefeb"><div class="pull-right">{{ number_format($nilai_pengajuan_subtotal,2, ',', '.') }}</div></th>
                                                <th style="background-color: #ecefeb"><div class="pull-right">{{ number_format($nilai_budget_subtotal+$nilai_pengajuan_subtotal,2, ',', '.') }}</div></th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @php
                                    $active=false;
                                    $dept_subtotal[] = array('department_name' => $data['department_name'], 'subtotals' => $subtotal);
                                @endphp
                            @endforeach
                        </div>
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
            @foreach($dept_subtotal as $data)

                var fusionchart{{ strtolower(str_replace(' ', '', $data['department_name'])) }} = new FusionCharts({
                    type: 'mscolumn2d',
                    renderAt: '{{ sprintf('chart-container-%s',strtolower(str_replace(' ', '', $data['department_name'])))}}',
                    width: '850',
                    height: '400',
                    dataFormat: 'json',
                    dataSource: {
                        "chart": {
                            "theme": "fint",
                            "xAxisname": "Monitoring Budget",
                            "yAxisName": "Total Nilai Budget",
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
                                @foreach($data['subtotals'] as $data_label)
                                    {"label": "{{ $data_label['periode'] }}"},
                                @endforeach
                            ]
                        }],
                        "dataset": [{
                            "seriesname": "Nilai Budget",
                            "data": [
                                @foreach($data['subtotals'] as $data_label)
                                {"value": "{{ $data_label['nilai_budget_subtotal'] }}"},
                                @endforeach
                                {"value": "100"},
                                {"value": "200"},
                                {"value": "300"}
                            ]
                        },{
                            "seriesname": "Nilai Pengajuan",
                            "data": [
                                @foreach($data['subtotals'] as $data_label)
                                {"value": "{{ $data_label['nilai_pengajuan_subtotal'] }}"},
                                @endforeach
                            ]
                        }]
                    }
                });
                fusionchart{{ strtolower(str_replace(' ', '', $data['department_name'])) }}.render();
            @endforeach
        });
    </script>
@endpush