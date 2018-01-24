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
            {!! Form::open(array('route' => 'finance.report_project', 'class' => 'form-horizontal')) !!}
            {{--<form class="form-horizontal">--}}
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('site_type_filter','Tipe Pekerjaan', ['class' => 'col-sm-3 form-control-label']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::select('site_type_filter',$site_types, null,['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('customer_filter','Customer', ['class' => 'col-sm-3 form-control-label']) !!}
                                        <div class="col-sm-9">
                                            {!! Form::select('customer_filter',$customers, null,['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Tampilkan</button>
                    </div>
                </div>
            {{--</form>--}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection