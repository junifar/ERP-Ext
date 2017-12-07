@extends('layout')

@section('title')
   Dashboard
@endsection

@section('content-header')

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
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search keyword">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat">Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <br/>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="sale_orders-table">
                                <thead>
                                <tr>
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

    {{--{!! $dataTable->scripts() !!}--}}
    <script>

        //
        // Pipelining function for DataTables. To be used to the `ajax` option of DataTables
        //
        $.fn.dataTable.pipeline = function ( opts ) {
            // Configuration options
            var conf = $.extend( {
                pages: 5,     // number of pages to cache
                url: '',      // script url
                data: null,   // function or object with parameters to send to the server
                              // matching how `ajax.data` works in DataTables
                method: 'GET' // Ajax HTTP method
            }, opts );

            // Private variables for storing the cache
            var cacheLower = -1;
            var cacheUpper = null;
            var cacheLastRequest = null;
            var cacheLastJson = null;

            return function ( request, drawCallback, settings ) {
                var ajax          = false;
                var requestStart  = request.start;
                var drawStart     = request.start;
                var requestLength = request.length;
                var requestEnd    = requestStart + requestLength;

                if ( settings.clearCache ) {
                    // API requested that the cache be cleared
                    ajax = true;
                    settings.clearCache = false;
                }
                else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
                    // outside cached data - need to make a request
                    ajax = true;
                }
                else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                    JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                    JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
                ) {
                    // properties changed (ordering, columns, searching)
                    ajax = true;
                }

                // Store the request for checking next time around
                cacheLastRequest = $.extend( true, {}, request );

                if ( ajax ) {
                    // Need data from the server
                    if ( requestStart < cacheLower ) {
                        requestStart = requestStart - (requestLength*(conf.pages-1));

                        if ( requestStart < 0 ) {
                            requestStart = 0;
                        }
                    }

                    cacheLower = requestStart;
                    cacheUpper = requestStart + (requestLength * conf.pages);

                    request.start = requestStart;
                    request.length = requestLength*conf.pages;

                    // Provide the same `data` options as DataTables.
                    if ( $.isFunction ( conf.data ) ) {
                        // As a function it is executed with the data object as an arg
                        // for manipulation. If an object is returned, it is used as the
                        // data object to submit
                        var d = conf.data( request );
                        if ( d ) {
                            $.extend( request, d );
                        }
                    }
                    else if ( $.isPlainObject( conf.data ) ) {
                        // As an object, the data given extends the default
                        $.extend( request, conf.data );
                    }

                    settings.jqXHR = $.ajax( {
                        "type":     conf.method,
                        "url":      conf.url,
                        "data":     request,
                        "dataType": "json",
                        "cache":    false,
                        "success":  function ( json ) {
                            cacheLastJson = $.extend(true, {}, json);

                            if ( cacheLower != drawStart ) {
                                json.data.splice( 0, drawStart-cacheLower );
                            }
                            if ( requestLength >= -1 ) {
                                json.data.splice( requestLength, json.data.length );
                            }

                            drawCallback( json );
                        }
                    } );
                }
                else {
                    json = $.extend( true, {}, cacheLastJson );
                    json.draw = request.draw; // Update the echo for each response
                    json.data.splice( 0, requestStart-cacheLower );
                    json.data.splice( requestLength, json.data.length );

                    drawCallback(json);
                }
            }
        };

        // Register an API method that will empty the pipelined data, forcing an Ajax
        // fetch on the next draw (i.e. `table.clearPipeline().draw()`)
        $.fn.dataTable.Api.register( 'clearPipeline()', function () {
            return this.iterator( 'table', function ( settings ) {
                settings.clearCache = true;
            } );
        } );

        $(document).ready(function() {
            $('#sale_orders-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                scrollX: true,
                columnDefs: [
                    { targets: [3], className: 'dt-body-right' }
                ],
                ajax:$.fn.dataTable.pipeline( {
                    url: '{!! route('dashboard.data') !!}',
                    pages: 5 // number of pages to cache
                } ),
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
        });
    </script>
@endpush
