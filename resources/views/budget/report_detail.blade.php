@extends('layout_no_menu')

@section('title')
    Site Detail
@endsection

@push('css-head')
    <link rel="stylesheet" href="{{asset('css/collapsible.css')}}" type="text/css"/>
    <style type="text/css">
        .collapse-custom .navbar-nav .col-width-1 {
            min-width   : 190px;
        }

        .collapse-custom .navbar-nav .col-width-2 {
            min-width   : 250px;
        }

        .collapse-custom .navbar-nav .col-width-3 {
            min-width   : 120px;
        }

        .navbar-default {
            background-color: #f8f8f8;
            border-color: #b5b2b2;
        }
    </style>
@endpush

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{$data->name}}</h3>
        </div>
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="txtArea">Area</label>
                    <input type="text" class="form-control" id="txtArea" placeholder="Area"
                           readonly="true" value="{{$data->area_name}}">
                </div>
                <section class="invoice">
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row col-md-12">
                                <div class="collapse-custom">
                                    <nav class="navbar navbar-default navbar-heading" role="navigation">
                                        <div class="navbar-collapse">
                                            <ul class="nav navbar-nav">
                                                <li class="col-width-2"><a>Site Type</a></li>
                                                <li class="col-width-1"><a>Nomor PO</a></li>
                                                <li class="col-width-3"><a>Nilai PO</a></li>
                                                <li class="col-width-3"><a>Total Penagihan</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                    @php
                                        $sum_nilai_po = null;
                                        $sum_tagihan = null;
                                    @endphp
                                    @foreach($data_po_header as $record_header)
                                        <nav class="navbar navbar-default" role="navigation">
                                            <div class="collapse navbar-collapse" id="navbar-po-header-{{$record_header->id}}" data-toggle="collapse" href="#collapse{{$record_header->id}}">
                                                <ul class="nav navbar-nav">
                                                    <li class="col-width-2"><a>{{$record_header->site_type}}
                                                            @if($record_header->work_category)
                                                                /{{$record_header->work_category}}
                                                            @endif

                                                            @if($record_header->work_description)
                                                                /{{$record_header->work_description}}
                                                            @endif</a></li>
                                                    <li class="col-width-1"><a>{{$record_header->client_order_ref}}</a></li>
                                                    <li class="col-width-3" style="text-align:right;"><a>{{number_format($record_header->price_unit * $record_header->product_uom_qty,2, ',', '.')}}</a></li>
                                                    <li class="col-width-3" style="text-align:right;"><a>{{number_format($record_header->subtotal,2, ',', '.')}}</a></li>
                                                </ul>
                                            </div>
                                        </nav>
                                        <div id="collapse{{$record_header->id}}" class="collapse" data-parent="navbar-po-header-{{$record_header->id}}">
                                            {{--<div class="panel-body">--}}
                                            <table class="table table-striped table-bordered table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>No Invoice</th>
                                                    <th>Nilai Penagihan</th>
                                                    <th>Budget</th>
                                                    <th>Status Budget</th>
                                                    <th>Realisasi</th>
                                                    <th>Laba/Rugi</th>
                                                    <th>Status INV</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($data_po_count == 0)
                                                    <tr>
                                                        <td></td>
                                                        <td class="pull-right"></td>
                                                        <td>{{number_format($record_header->budget_total, 2, ',', '.')}}</td>
                                                        <td>{{$record_header->budget_state}}</td>
                                                        <td>{{number_format($record_header->realisasi, 2, ',', '.')}}</td>
                                                        <td>{{number_format($record_header->budget_total+$record_header->realisasi, 2, ',', '.')}}</td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                                @foreach($data_po as $record)
                                                    @if($record->id == $record_header->id)
                                                        <tr>
                                                            <td>{{$record->no_invoice}}</td>
                                                            <td class="pull-right">{{number_format($record->amount_total, 2, ',', '.')}}</td>
                                                            <td>{{number_format($record->budget_total, 2, ',', '.')}}</td>
                                                            <td>{{$record->budget_state}}</td>
                                                            <td>{{number_format($record->realisasi, 2, ',', '.')}}</td>
                                                            <td>{{number_format($record->amount_total-$record->realisasi, 2, ',', '.')}}</td>
                                                            <td>{{$record->state}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{--</div>--}}
                                        </div>
                                        @php
                                            $sum_nilai_po += $record_header->price_unit * $record_header->product_uom_qty;
                                            $sum_tagihan += $record_header->subtotal;
                                        @endphp
                                    @endforeach
                                    <nav class="navbar navbar-default" role="navigation">
                                        <div class="collapse navbar-collapse" id="navbar-po-footer" data-toggle="collapse" href="#collapse">
                                            <ul class="nav navbar-nav">
                                                <li class="col-width-2"><a><strong>Grand Total</strong></a></li>
                                                <li class="col-width-1"><a></a></li>
                                                <li class="col-width-3" style="text-align:right;"><a>{{number_format($sum_nilai_po,2, ',', '.')}}</a></li>
                                                <li class="col-width-3" style="text-align:right;"><a>{{number_format($sum_tagihan,2, ',', '.')}}</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <br/>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection