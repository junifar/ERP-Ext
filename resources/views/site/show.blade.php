@extends('layout_no_menu')

@section('title')
    Site Detail
@endsection

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

            </div>
            <section class="invoice">
                <!-- Table row -->
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Site Type</th>
                                <th>Nomor PO</th>
                                <th>Nilai PO</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data_po_header as $record_header)
                                <tr>
                                    <td>
                                        {{$record_header->site_type}}
                                        @if($record_header->work_category)
                                            /{{$record_header->work_category}}
                                        @endif

                                        @if($record_header->work_description)
                                            /{{$record_header->work_description}}
                                        @endif
                                    </td>
                                    <td>{{$record_header->client_order_ref}}</td>
                                    <td>{{number_format($record_header->price_unit * $record_header->product_uom_qty,2, ',', '.')}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table class="table table-striped table-bordered table-condensed">
                                            <thead>
                                            <tr>
                                                <th>No Invoice</th>
                                                <th>Nilai Penagihan</th>
                                                <th>Budget</th>
                                                <th>Realisasi</th>
                                                <th>Laba/Rugi</th>
                                                <th>Status INV</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data_po as $record)
                                                    @if($record->id == $record_header->id)
                                                        <tr>
                                                            <td>{{$record->no_invoice}}</td>
                                                            <td class="pull-right">{{number_format($record->amount_total, 2, ',', '.')}}</td>
                                                            <th>{Budget}</th>
                                                            <th>{Realisasi}</th>
                                                            <th>{Laba/Rugi}</th>
                                                            <th>{Status INV}</th>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach

                            {{--@php--}}
                                {{--$site_type = null;--}}
                                {{--$work_category = null;--}}
                                {{--$work_description = null;--}}
                                {{--$client_order_ref = null;--}}
                                {{--$price_unit = null;--}}
                                {{--$sum_price_unit = null;--}}
                                {{--$sum_amount_total = null;--}}
                            {{--@endphp--}}
                            {{--@foreach($data_po as $record)--}}
                            {{--<tr>--}}
                                {{--@if($site_type != $record->site_type)--}}
                                    {{--<td>--}}
                                        {{--{{$record->site_type}}--}}
                                        {{--@if($record->work_category)--}}
                                        {{--/{{$record->work_category}}--}}
                                        {{--@endif--}}

                                        {{--@if($record->work_description)--}}
                                        {{--/{{$record->work_description}}--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                {{--@else--}}
                                    {{--<td></td>--}}
                                {{--@endif--}}

                                {{--@if($client_order_ref != $record->client_order_ref)--}}
                                    {{--<td>{{$record->client_order_ref}}</td>--}}
                                {{--@else--}}
                                    {{--<td></td>--}}
                                {{--@endif--}}

                                {{--@if($price_unit != $record->price_unit * $record->product_uom_qty)--}}
                                    {{--<td>{{number_format($record->price_unit * $record->product_uom_qty,2, ',', '.')}}</td>--}}
                                    {{--@php--}}
                                        {{--$sum_price_unit += $record->price_unit * $record->product_uom_qty;--}}
                                    {{--@endphp--}}
                                {{--@else--}}
                                    {{--<td></td>--}}
                                {{--@endif--}}

                                {{--<td>{{$record->no_invoice}}</td>--}}
                                {{--<td class="pull-right">{{number_format($record->amount_total, 2, ',', '.')}}</td>--}}

                                {{--@php--}}
                                    {{--$site_type = $record->site_type;--}}
                                    {{--$work_category = $record->work_category;--}}
                                    {{--$work_description = $record->work_description;--}}
                                    {{--$client_order_ref = $record->client_order_ref;--}}
                                    {{--$price_unit = $record->price_unit * $record->product_uom_qty;--}}
                                    {{--$sum_amount_total += $record->amount_total;--}}
                                {{--@endphp--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--<tr>--}}
                                {{--<th colspan="2">Total</th>--}}
                                {{--<th class="pull-right">{{number_format($sum_price_unit, 2, ',', '.')}}</th>--}}
                                {{--<th></th>--}}
                                {{--<th class="pull-right">{{number_format($sum_amount_total, 2, ',', '.')}}</th>--}}
                            {{--</tr>--}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                        </button>
                        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                            <i class="fa fa-download"></i> Generate PDF
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection