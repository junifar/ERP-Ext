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

        table, thead, tbody, th, td {
            border: 1px solid black !important;
        }
    </style>

    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/iCheck/all.css')}}">
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">
            {!! Form::open(array('finance.monitoring_preventive', 'class' => 'form-horizontal')) !!}
                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            Monitoring Maintenance Preventive
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                {!! Form::label('year_filter','Tahun', ['class' => 'col-sm-3 form-control-label']) !!}
                                    <div class="col-sm-9">
                                    {!! Form::select('year_filter',$years, null,['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                {!! Form::label('area','Area', ['class' => 'col-sm-3 form-control-label']) !!}
                                    <div class="col-sm-5">
                                        <div class="input-group date">
                                            {!! Form::select('project_area',$project_area, null,['class' => 'form-control']) !!}  
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                {!! Form::label('res_partner','Customer', ['class' => 'col-sm-3 form-control-label']) !!}
                                    <div class="col-sm-9">
									
                                    {!! Form::select('res_partner',$customer_lists, null,['class' => 'form-control']) !!}    
                                    
								</div>	
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Tampilkan</button>
                    </div>
                </div>
		 
    <div class="box box-solid">
        <div class="box-body">
            <div class="nav-tabs-custom">
        <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th colspan="6" class="text-center"><h3>Preventive Info</h3></th>
                                </tr>
                               <tr>
								<th>Tahun</th>
								<th>Customer</th>
                                <th>Nomor PO</th>
                                <th>Nilai PO</th>
                                <th>Nilai Penagihan</th>
								<th>Tools</th>
                               </tr>
                            </thead>
                          <tbody>
                          <tr>
								<td>2016</td>
								<td>BBSC</td>
                                <td>026/OM/BBSC/I-2016/Collo-TSEL</td>
                                <td>1.200.0000</td>
                                <td>1.200.000</td>  
								<td><a href="{!! route('finance.monitoring_preventive_detail'); !!}">Show</a></td>
                          </tr>
                          </tbody>
                    </table>
					
					
                 </div> 
				</div>	<!-- Tab Content -->
			</div>	
		</div>
		</div>
		
		 <div class="box box-solid">
        <div class="box-body">
            <div class="nav-tabs-custom">
        <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th colspan="5" class="text-center"><h3>Summary Project</h3></th>
                                </tr>
                               <tr>
								<th>Customer</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nilai Budget : Nilai PO</th>
                               </tr>
                            </thead>
                          <tbody>
                          <tr>
								<td>BBSC</td>
                                <td>4 May 2016</td>
                                <td>0 %</td>								
                          </tr>
                          </tbody>
                    </table>
                 </div> 
				</div>	<!-- Tab Content -->
			</div>	
		</div>
		</div>
        {!! Form::close() !!}	
</div>
  
@endsection

@push('scripts')
    <script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/iCheck/icheck.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datepicker').datepicker({
                autoclose: true
            })

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })
        });
    </script>
@endpush