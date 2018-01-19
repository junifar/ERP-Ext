@extends('layout')

@section('title')
    Site Detail
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
            <div class="box-header with-border">
                <h3 class="box-title">Site Financial Information - Based on Budget</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Site Information</h3>
                        </div>
                        <div class="box-body">
                            <form class="form-horizontal">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="box box-solid">
                                            <div class="box-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('site_name','Site Name', ['class' => 'col-sm-5 form-control-label']) !!}
                                                        <label class="col-sm-7 form-label">{{ $site->name }}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('site_alias','Alias / PO Name', ['class' => 'col-sm-5 form-control-label']) !!}
                                                        <label class="col-sm-7 form-label">{{ $site->site_alias1 }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('site_id_prasetia','Site ID Prasetia', ['class' => 'col-sm-5 form-control-label']) !!}
                                                        <label class="col-sm-7 form-label">{{ $site->site_id_prasetia  }}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('site_alias_2','Site Alias 2', ['class' => 'col-sm-5 form-control-label']) !!}
                                                        <label class="col-sm-7 form-label">{{ $site->site_alias2  }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="box box-solid">
                                            <div class="box-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('customer','Customer', ['class' => 'col-sm-5 form-control-label']) !!}
                                                        <label class="col-sm-7 form-label">{{ $site->customer_name  }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('site_id_customer','Site ID Customer', ['class' => 'col-sm-5 form-control-label']) !!}
                                                        <label class="col-sm-7 form-label">{{ $site->site_id_customer  }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="box box-solid">
                                            <div class="box-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('tower_type','Tower Type', ['class' => 'col-sm-5 form-control-label']) !!}
                                                        <label class="col-sm-7 form-label">{{ $site->tower_type_name  }}</label>
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::label('field_type','Field Type', ['class' => 'col-sm-5 form-control-label']) !!}
                                                        <label class="col-sm-7 form-label">{{ $site->field_type_name  }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('tinggi_tower','Tinggi Tower', ['class' => 'col-sm-5 form-control-label']) !!}
                                                        <label class="col-sm-7 form-label">{{ $site->tinggi_tower_name  }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box box-solid">
                                        <div class="box-body">
                                            <div class="form-group">
                                                {!! Form::label('area','Area', ['class' => 'col-sm-5 form-control-label']) !!}
                                                <label class="col-sm-7 form-label">{{ $site->area_name  }}</label>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('pulau','Pulau', ['class' => 'col-sm-5 form-control-label']) !!}
                                                <label class="col-sm-7 form-label">{{ $site->island_name  }}</label>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('provinsi','Provinsi', ['class' => 'col-sm-5 form-control-label']) !!}
                                                <label class="col-sm-7 form-label">{{ $site->province_name}}</label>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('kabupaten','Kabupaten / Kota', ['class' => 'col-sm-5 form-control-label']) !!}
                                                <label class="col-sm-7 form-label">{{ $site->city_name }}</label>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('alamat','Alamat', ['class' => 'col-sm-5 form-control-label']) !!}
                                                <label class="col-sm-7 form-label">{{ $site->address }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Project Detail</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab_po" data-toggle="tab" aria-expanded="true">List PO</a></li>
                                            <li class=""><a href="#tab_budget" data-toggle="tab" aria-expanded="false">Budget</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_po">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Project ID</th>
                                                        <th>No SO</th>
                                                        <th>No PO Customer</th>
                                                        <th>No Memo Internal</th>
                                                        <th>Tanggal PO</th>
                                                        <th>Nilai Project</th>
                                                        <th>PIC</th>
                                                        <th>Project Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($project as $data)
                                                        <tr>
                                                            <td>{{ $data->project_id }}</td>
                                                            <td>{{ $data->sale_order_no }}</td>
                                                            <td>{{ $data->client_order_ref }}</td>
                                                            <td>{{ $data->memo_internal }}</td>
                                                            <td>{{ $data->date_order }}</td>
                                                            <td>{{  number_format($data->amount_total,0, ',', '.') }}</td>
                                                            <td>{{ $data->pic  }}</td>
                                                            <td>{{ $data->state }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="tab_2">
                                                2
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection