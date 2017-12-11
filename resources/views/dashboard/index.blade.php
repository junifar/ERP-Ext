@extends('layout')

@section('title')
   Dashboard
@endsection

@section('content-header')
    <link rel="stylesheet" href="{{asset('bower_components/featherlight/release/featherlight.min.css')}}">

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Sales Order</h3>
                    {{--<div class="box-tools pull-right">--}}
                        {{--<div class="has-feedback">--}}
                            {{--<input type="text" class="form-control input-sm" placeholder="Search Keyword">--}}
                            {{--<span class="glyphicon glyphicon-search form-control-feedback"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-3">
                            <form method="POST" id="search-form" role="form">
                                <div class="input-group input-group-sm">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Search keyword">
                                    <span class="input-group-btn">
                                        {{--<button type="button" class="btn btn-info btn-flat">Search</button>--}}
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <div id="modal-iframe" data-iziModal-title="Sales Order Information"></div>
                        <br/>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered nowrap" id="sale_orders-table">
                                <thead>
                                <tr>
                                    {{--<th></th>--}}
                                    <th>Nomor SO</th>
                                    <th>Nomor PO</th>
                                    <th>Customer</th>
                                    <th>Nilai PO</th>
                                    <th>Tanggal PO</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script src="{{asset('bower_components/featherlight/release/featherlight.min.js')}}" charset="utf-8"></script>
    <script>
        $(document).ready(function() {
            // $('#modal').iziModal();
            // $(document).on('click', '.trigger', function (event) {
            //     console.log('SAmple');
            //     $('#modal').iziModal('open');
            //     event.preventDefault();
            // });


            var oTable = $('#sale_orders-table').DataTable({
                processing  : true,
                serverSide  : true,
                responsive  : true,
                // responsive: {
                //     details:
                //         {
                //             display: $.fn.dataTable.Responsive.display.modal( {
                //                 header: function (row) {
                //                     var data = row.data();
                //                     return 'Details for '+data[0]+' '+data[1];
                //                 }
                //             } ),
                //             renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                //                 tableClass: 'table'
                //             } )
                //         }
                //     },
                scrollX     : true,
                lengthChange: false,
                info        : true,
                autoWidth   : false,
                searching   : false,
                autoFill    : true,
                columnDefs: [
                    // { targets: [3], className: 'dt-body-right' }
                    { targets: [3], className: 'text-right' }
                ],
                ajax:$.fn.dataTable.pipeline( {
                    url: '{!! route('dashboard.data') !!}',
                    data: function(d){
                        d.name = $('input[name=name]').val();
                    },
                    pages: 5 // number of pages to cache
                }),
                {{--ajax: '{!! route('dashboard.data') !!}',--}}
                columns: [

                    { data: 'no_so', name: 'sale_order.name' },
                    { data: 'client_order_ref', name: 'client_order_ref' },
                    { data: 'name', name: 'name' },
                    { data: 'amount_total', name: 'amount_total', render: $.fn.dataTable.render.number( '.', ',', 0) },
                    { data: 'date_order', name: 'date_order' },
                    { data: 'action', name: 'action' }
                ]
            });

            $('#search-form').on('submit', function(e) {
                oTable.clearPipeline();
                oTable.draw();
                e.preventDefault();
            });

            $(document).on('click', '.trigger', function (event) {
                event.preventDefault();
                // $('#modal-iframe').iziModal('open')
                // or
                $('#modal-iframe').iziModal('open', event); // Use "event" to get URL href
                // event.preventDefault();
            })

            $("#modal-iframe").iziModal({
                iframe: true,
                iframeHeight: 500,
                headerColor: '#00a65a'
            });

        });
    </script>

@endpush
