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
                    <h3 class="box-title">Kecamatan</h3>
                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Search Keyword">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
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
                                    <th>Name</th>
                                    <th>Customer</th>
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
        $(function() {
            $('#sale_orders-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('dashboard.data') !!}',
                columns: [
                    { data: 'name', name: 'client_order_ref' },
                    { data: 'customer', name: 'partner.name' },
                ]
            });
        });
    </script>
@endpush
