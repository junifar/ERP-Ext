@extends('layout')

@section('title')
    Paket Project
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
                        Informasi Paket Project
                    </h4>
                    <div class="row">
                        <div class="col-md-12">
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
                                <tbody>
                                <tr>
                                    <td>Packet 1</td>
                                    <td>PT Tower Bersama</td>
                                    <td>
                                        <div class="row"><div class="center-text">90</div></div>
                                    </td>
                                    <td><div class="center-text">90</div></td>
                                    <td><div class="center-text">90</div></td>
                                    <td><div class="center-text">90</div></td>
                                    <td>
                                        <div class="col-md-12 center-text"><a href="{{ route('project.project_batch_detail', [1, 1]) }}">Detail</a></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Packet 1</td>
                                    <td>PT Tower Bersama</td>
                                    <td>
                                        <div class="row"><div class="center-text">90</div></div>
                                    </td>
                                    <td><div class="center-text">90</div></td>
                                    <td><div class="center-text">90</div></td>
                                    <td><div class="center-text">90</div></td>
                                    <td>
                                        <div class="col-md-12 center-text"><a href="{{ route('project.project_batch_detail', [1, 1]) }}">Detail</a></div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection