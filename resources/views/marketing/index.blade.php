@extends('layout')

@section('title')
    Marketing Dashboard
@endsection

@push('css-head')
@endpush

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Marketing Monitoring</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-pie-graph"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Site</span>
                        <span class="info-box-number">{{ number_format($total_site,0, ',', '.')  }}</span>
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Project</span>
                        <span class="info-box-number">{{ number_format($total_project,0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">PO Customer By Status</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart-container">Fetching Data...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Alokasi Keberadaan SO</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-condensed table-bordered text-center border-dark">
                                    <tbody>
                                    <tr>
                                        <th colspan="2" style="border-color: #0a0a0a">PO Customer</th>
                                        <th colspan="2" style="border-color: #0a0a0a">No PO Customer</th>
                                        <th style="border-color: #0a0a0a">PO Cancel</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border-color: #0a0a0a; font-size: large;">{{ $total_so_customer[0]->total }}</td>
                                        <td colspan="2" style="border-color: #0a0a0a; font-size: large;">{{ $total_so_customer_null[0]->total }}</td>
                                        <td colspan="2" style="border-color: #0a0a0a; font-size: large;" rowspan="3">{{ $total_so_cancel }}</td>
                                    </tr>
                                    <tr>
                                        <th style="border-color: #0a0a0a">Memo Internal</th>
                                        <th style="border-color: #0a0a0a">No Memo Internal</th>
                                        <th style="border-color: #0a0a0a">Memo Internal</th>
                                        <th style="border-color: #0a0a0a">No Memo Internal</th>
                                    </tr>
                                    <tr>
                                        <td style="border-color: #0a0a0a; font-size: large;">{{ $total_so_customer[0]->total_mi }}</td>
                                        <td style="border-color: #0a0a0a; font-size: large;">{{ $total_so_customer[0]->total - $total_so_customer[0]->total_mi }}</td>
                                        <td style="border-color: #0a0a0a; font-size: large;">{{ $total_so_customer_null[0]->total_mi }}</td>
                                        <td style="border-color: #0a0a0a; font-size: large;">{{ $total_so_customer_null[0]->total - $total_so_customer_null[0]->total_mi }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{--fusion Chart--}}
    <script src="{{asset('plugins/fusioncharts/js/fusioncharts.js')}}"></script>
    <script src="{{asset('plugins/fusioncharts/js/themes/fusioncharts.theme.fint.js?cacheBust=56')}}"></script>

    <script type="application/javascript">
        @php
            $labelCustomerByStatus = null;
            $valueCustomerByStatus = null;
        @endphp
        @foreach ($so_per_state as $data)
            @php
                $labelCustomerByStatus .= sprintf('{"label": "%s"}, ', $data->state);
                $valueCustomerByStatus .= sprintf('{"value": "%d"}, ', $data->total);
            @endphp
        @endforeach

        FusionCharts.ready(function(){
            var fusioncharts = new FusionCharts({
                type: 'stackedcolumn2d',
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
                            {!! $labelCustomerByStatus  !!}
                        ]
                    }],
                    "dataset": [{
                        "seriesname": "Status",
                        "data": [
                            {!! $valueCustomerByStatus !!}
                        ]
                    }]
                }
            });

            fusioncharts.render();
        });
    </script>
@endpush