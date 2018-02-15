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
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
					<h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            Monitoring Maintenance Preventive </h4>
								
						<div class="content">
							<table class="table table-bordered ">
								<tr>
									<td rowspan="2" class="text-center">Nomor PO </td>
									<td colspan="2">Jan</td>
									<td colspan="2">Februari</td>
									<td colspan="2">Maret</td>
									
								</tr>
								<tr>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>									
								</tr>
						<!-- Januari -->		
								<tr>
									<td class="text-center">026/OM/BBSC/I-2016/Collo-TSEL</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
								</tr>
								
								
						<!-- End Januari -->
								
								<tr>
								</tr>
								
							</table>
						</div>		
                </div>
            </div>
        </div>
    </div>
@endsection
