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
        {!! Form::open(array('route' => 'finance.monitoring_preventive', 'class' => 'form-horizontal')) !!}
            <div class="box box-solid">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Monitoring Maintenance Preventive
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            {!! Form::label('years_filter','Tahun', ['class' => 'col-sm-3 form-control-label']) !!}
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

	   @if($preventive_data)
		   
            <div class="box box-solid">
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                             <div class="tab-pane active" id="tab_1">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="10" class="text-center"><h3>Preventive Info</h3></th>
                                        </tr>
                                       <tr>
        								<th>Nomor Budget</th>
                                        <th>Nomor PO</th>
        								<th>Nilai PO</th>
                                        <th>Nomor Invoice</th>
                                        <th>Nilai Penagihan</th>
                                        <th>Total Nilai Penagihan </th>
        								<th>% Penagihan</th>
        								<th>Nilai Budget</th>
        								<th>Nilai Realisasi</th>
        								<th>% Budget</th>
        								<th>Laba/Rugi</th>
        								<th>Tools</th>
                                       </tr>
                                    </thead>
                                  <tbody>   
                                    @php
                                        $nilai_penagihan = 0;
                                         $nilai_poAsli = (isset($data->nilai_po)) ? $data->nilai_po : 0;
                                    @endphp
                                @foreach($preventive_data as $data)
                                  <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->nomor_po }}</td>
        								<td>{{ number_format($nilai_poAsli,2, ',', '.') }}</td>
                                        <td>
                                            @foreach($data->invoices as $invoice )
                                                <div class="col-md-12">{{ $invoice->nomor_invoice }}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($data->invoices as $invoice )
                                                <div class="col-md-12">{{ $invoice->nilai_penagihan }}</div>
                                                @php 
                                                    $nilai_penagihan += $invoice->nilai_penagihan;
                                                @endphp
                                            @endforeach
                                        </td>
        								<td>{{ number_format($nilai_penagihan,2,',','.') }}</td>
        								<td>{{ number_format(($nilai_poAsli >0 ) ? ((float)$nilai_penagihan / (float) $nilai_po)*100 : 0,2) }} %</td>
        								<td>{{ number_format($data->nilai_budget,2,',','.') }}</td>
        								<td>{{ number_format($data->nilai_realisasi,2,',','.') }}</td>
        								<td>{{ number_format(($data->nilai_budget >0 ) ? ((float)$data->nilai_realisasi / (float) $data->nilai_budget)*100 : 0,2) }}</td>
        								<td>{{ number_format($nilai_poAsli - $data->nilai_realisasi) }}</td>
        								<td><a href="{!! route('finance.monitoring_preventive_detail'); !!}">Show</a></td>
                                  </tr>
                                @endforeach  
                                                   
                                  </tbody>
                            </table>	
                         </div> 
    				</div>	<!-- Tab Content -->
		         </div>	
	          </div>
	        </div>
	       
    		
        @endif
        {!! Form::close() !!}	
    </div>
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