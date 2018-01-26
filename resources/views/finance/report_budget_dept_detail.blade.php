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
                                <li {{ ($active)?'class="active"':'' }}><a href="#tab_{{ strtolower($data['department_name']) }}" data-toggle="tab">{{ $data['department_name'] }}</a></li>
                                @php
                                    $active=false;
                                @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @php
                                $active = true;
                            @endphp
                            @foreach($budget_plan_line_departments as $data)
                                <div class="tab-pane {{ ($active)?'active':'' }}" id="tab_{{ strtolower($data['department_name']) }}">
                                    <h3>{{ $data['department_name'] }}</h3>
                                    <div class="row col-md-12">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Likes</span>
                                                    <span class="info-box-number">41,410</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">CPU Traffic</span>
                                                    <span class="info-box-number">90<small>%</small></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Likes</span>
                                                    <span class="info-box-number">41,410</span>
                                                </div>
                                            </div>
                                        </div>
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
                                        @foreach($data['periodes'] as $periode)
                                            <tr>
                                                <th colspan="8" style="background-color: #ecefeb">{{ sprintf("%s s/d %s", $periode['periode_start'], $periode['periode_end']) }}</th>
                                            </tr>
                                            @foreach($periode['datas'] as $item)
                                                <tr>
                                                    <td>{{ $item['budget_view_name'] }}</td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ number_format($item['amount'],2, ',', '.') }}</td>
                                                    <td>{{ number_format($item['nilai_pengajuan'],2, ',', '.') }}</td>
                                                    <td>{{ number_format($item['sisa_budget'],2, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @php
                                    $active=false;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection