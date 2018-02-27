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

    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/iCheck/all.css')}}">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('route' => 'finance.monitoring_corrective', 'class' => 'form-horizontal')) !!}
                <div class="box box-solid">
                    <div class="box-body">
                         <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Monitoring Maintanance Corrective
                        </h4>
                        <div class="text-center row">
                            <center>
                            <div class="col-md-6">
                                <div class="form-group">
                                        {!! Form::label('years_filter','Tahun', ['class' => 'col-sm-3 form-control-label']) !!}
                                    <div class="col-md-9">
                                        {!! Form::select('year_filter',$years, null,['class' => 'form-control']) !!}   
                                    </div>
                                </div>   
                            </div>
                            </center>
                        </div>   
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Tampilkan</button>
                    </div>
                </div>
				@if($corrective_data)
                <div class="box box-body">
                    <div class="box-body">
                        <div class="header">
                            <h4>Summary Project</h4>
                        </div>

                        <div class="box-body">
                             <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer</th>
                                            <th>Total Project</th>
                                            <th>Nilai PO</th>
                                            <th>Nilai MI(Memo Internal)</th>
                                            <th>Total PO</th>
                                            <th>Nilai Penagihan(%)</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @php 
											  $page_num = 0;
									   @endphp
										@foreach($corrective_data as $data)
                                        <tr>
                                            <td>{{ ++$page_num }}</td>
                                            <td>{{ $data->customer_name }}</td>
                                            <td>{{ $data->total_project }}</td>
                                            <td>0,00</td>
                                            <td>{{ $data->total_mi}}</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td><a href="{!! route('finance.monitoring_corrective_detail'); !!}" class="btn btn-success">Show</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                             </table>   
                        </div>
                    </div>
                </div>
			@endif		
            {!! Form::close() !!}   
        </div>
    </div>
@endsection