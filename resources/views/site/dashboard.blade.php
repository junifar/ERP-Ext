@extends('layout')

@section('title')
    Site Dashboard
@endsection

@push('css-head')

@endpush

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Site Monitoring</small>
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
                        <h3 class="box-title">Rekap Project Per Tahun</h3>
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
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Project Status</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart-project-status">Fetching Data...</div>
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

    {{--<script src="https://adminlte.io/themes/AdminLTE/dist/js/pages/dashboard2.js"/>--}}
    <script type="application/javascript">
        @php
            $label = null;
            $value_cme = null;
            $value_mtc = null;

            $label_project_status = null;
            $label_project_status_value = null;
        @endphp

        @foreach ($project_per_tahun as $data)
        @php
            if (!$data->date_order == null):
                $label .= sprintf('{"label": "%s"}, ', $data->date_order);
                $value_cme .= sprintf('{"value": "%d"}, ', $data->total_cme);
                $value_mtc .= sprintf('{"value": "%d"}, ', $data->total_mtc);
            endif;
        @endphp
        @endforeach
        @foreach($project_state_status as $data)
        @php
            $label_project_status .= sprintf('{"label": "%s"}, ', $data->state);
            $label_project_status_value .= sprintf('{"value": "%d"}, ', $data->total_state);
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
                            "caption": "Alokasi Project",
                            "subCaption": "Periode: Tahunan",
                            "xAxisname": "Tahun",
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
                                {!! $label  !!}
                                ]
                        }],
                        "dataset": [{
                            "seriesname": "CME",
                            "data": [
                                {!! $value_cme !!}
                            ]
                        }, {
                            "seriesname": "Maintenance",
                            "data": [
                                {!! $value_mtc !!}
                            ]
                        }]
                    }
                }
            );
            fusioncharts.render();

            var fusionchart_project_states = new FusionCharts({
                type: 'stackedcolumn2d',
                renderAt: 'chart-project-status',
                width: '850',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "theme": "fint",
                        "caption": "Project Status",
                        // "subCaption": "Periode: Tahunan",
                        "xAxisname": "Tahun",
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
                            {!! $label_project_status  !!}
                        ]
                    }],
                    "dataset": [{
                        "seriesname": "Total",
                        "data": [
                            {!! $label_project_status_value !!}
                        ]
                    }]
                }
            });
            fusionchart_project_states.render();
        });

    </script>
@endpush