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
            {!! Form::open(array('route' => 'finance.report_project', 'class' => 'form-horizontal')) !!}
                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            Report Project
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('year_filter','Tahun', ['class' => 'col-sm-3 form-control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::select('year_filter',$years, null,['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('site_type_filter','Tipe Pekerjaan', ['class' => 'col-sm-3 form-control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::select('site_type_filter',$site_types, null,['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Tampilkan</button>
                    </div>
                </div>
                @if($project_data)
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">General Info</a></li>
                                <li><a href="#tab_2" data-toggle="tab">PO : Penagihan</a></li>
                                <li><a href="#tab_3" data-toggle="tab">Budget : Realisasi</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Jumlah Project</th>
                                            <th>Project Cancel</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $sum_total_project = 0;
                                        @endphp
                                        @foreach($project_data as $data)
                                            <tr>
                                                <td>{{ $data->customer_name }}</td>
                                                <td><div class="pull-right">{{ $data->total_project }}</div></td>
                                                <td><div class="pull-right">0</div></td>
                                                <td><a href="{{ route('finance.report_project.detail') }}">Details</a></td>
                                            </tr>
                                            @php
                                                $sum_total_project += $data->total_project;
                                            @endphp
                                        @endforeach

                                        <tr>
                                            <th>Sub Total</th>
                                            <th><div class="pull-right">{{ $sum_total_project }}</div></th>
                                            <th><div class="pull-right">0</div></th>
                                            <th></th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane active" id="tab_2">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Nilai PO</th>
                                            <th>Nilai Penagihan</th>
                                            <th>%</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $sum_total_po = 0;
                                        @endphp
                                        @foreach($project_data as $data)
                                        <tr>
                                            <td>{{ $data->customer_name }}</td>
                                            <td><div class="pull-right">{{ number_format($data->nilai_po,2, ',', '.') }}</div></td>
                                            <td><div class="pull-right">900.000.000,00</div></td>
                                            <td><div class="pull-right">90%</div></td>
                                            <td><a href="#">Details</a></td>
                                        </tr>
                                        @php
                                            $sum_total_po += $data->nilai_po;
                                        @endphp
                                        @endforeach
                                        <tr>
                                            <th>Sub Total</th>
                                            <th><div class="pull-right">{{ number_format($sum_total_po,2, ',', '.') }}</div></th>
                                            <th><div class="pull-right">900.000.000,00</div></th>
                                            <th><div class="pull-right">90%</div></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Nilai Budget</th>
                                            <th>Realisasi Budget</th>
                                            <th>%</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($project_data as $data)
                                            <tr>
                                                <td>{{ $data->customer_name }}</td>
                                                <td><div class="pull-right">1.000.000.000,00</div></td>
                                                <td><div class="pull-right">900.000.000,00</div></td>
                                                <td><div class="pull-right">90%</div></td>
                                                <td><a href="#">Details</a></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th>Sub Total</th>
                                            <th><div class="pull-right">1.000.000.000,00</div></th>
                                            <th><div class="pull-right">900.000.000,00</div></th>
                                            <th><div class="pull-right">90%</div></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>

                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header">
                        <h4>Summary Project</h4>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Cust</th>
                                <th>Realisasi : Penagihan</th>
                                <th>Nilai Budget : Nilai PO</th>
                                <th>Profit / Loss</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project_data as $data)
                                <tr>
                                    <td>{{ $data->customer_name }}</td>
                                    <td><div class="pull-right">1.000.000.000,00</div></td>
                                    <td><div class="pull-right">900.000.000,00</div></td>
                                    <td><div class="pull-right">90%</div></td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Sub Total</th>
                                <th><div class="pull-right">1.000.000.000,00</div></th>
                                <th><div class="pull-right">900.000.000,00</div></th>
                                <th><div class="pull-right">90%</div></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            {!! Form::close() !!}
        </div>
    </div>
@endsection