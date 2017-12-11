@extends('layout')

@section('title')
    Site
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Site</h3>
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
                        <div id="modal-iframe" data-iziModal-title="Site Information"></div>
                        <br/>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered nowrap" id="site-table">
                                <thead>
                                <tr>
                                    <th>Nama Site</th>
                                    <th>Site ID Customer</th>
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
    <script>
        $(document).ready(function(){
            var oTable = $('#site-table').dataTable({
                processing      : true,
                serverSide      : true,
                responsive      : true,
                lengthChange    : false,
                info            : true,
                autoWidth       : false,
                searching       : false,
                autofill        : true,
                iDisplayLength  : 7,
                ajax:$.fn.dataTable.pipeline( {
                    url: '{!! route('site.data') !!}',
                    data: function(d){
                        d.name = $('input[name=name]').val();
                    },
                    pages: 5 // number of pages to cache
                }),
                {{--ajax: '{!! route('dashboard.data') !!}',--}}
                columns: [

                    { data: 'name', name: 'name' },
                    { data: 'site_id_customer', name: 'site_id_customer' },
                    { data: 'action', name: 'action' }
                ]
            });

            $('#search-form').on('submit', function(e) {
                oTable.clearPipeline();
                oTable.draw();
                e.preventDefault();
            });
        })
    </script>
@endpush