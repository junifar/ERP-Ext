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
                        Monitoring Budget Dept {{ $tahun }}
                    </h4>
                    <br/>
                    <div class="col-md-12">
                        <h3>Finance</h3>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Budget View</th>
                                <th>Budget Item</th>
                                <th>Nilai Budget</th>
                                <th>Nilai Pengajuan</th>
                                <th>Sisa Budget</th>
                                <th>%</th>
                                <th>% Budget</th>
                                <th>% Pengajuan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Januari</td>
                                <td>Budget View</td>
                                <td>Budget Item</td>
                                <td>1.000.000,00</td>
                                <td>900.000,00</td>
                                <td>100.000</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush