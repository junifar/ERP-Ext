@extends('layout')

@section('title')
    Paket Project Detail
@endsection

@push('css-head')
    <style type="text/css">
        .center-text{
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Paket Project Detail
                    </h4>
                    <div class="row col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    Paket Project : {Packet Project Name}<br/>
                                    {Customer}
                                </h3>

                            </div>
                            <div class="box-body">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Packet Project</th>
                                        <th>Customer</th>
                                        <th class="center-text">Total Project</th>
                                        <th class="center-text">PO SIS</th>
                                        <th class="center-text">PO SIS</th>
                                        <th class="center-text">PO CME</th>
                                        <th class="center-text">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection