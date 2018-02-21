@extends('layout')

@section('title')
    Report Project
@endsection

@push('css-head')
    {{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.jqueryui.min.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <style type="text/css">
        .form-label{
            margin-bottom: 0;
            font-weight: 300;
        }

        .form-control-label {
            margin-bottom: 0;
            text-align: left;
        }
		
		.table2 {
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
							Detail Monitoring Preventive
                        </h4>
                         <div class="row">
                            <div class="col-md-6">
							 <label>Nama Customer :</label>
                                    BBSC
                            </div>
							
							<div class="col-md-6">
							 <label>Tahun :</label>
                                    2017
                            </div>							
							
                            <div class="col-md-5">
                               <label>Area :</label>
                                    Sulawesi 
								</div>	
                                </div>

                            </div>
                        </div>
		</div>
					 
	<div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      Monitoring Preventive Detail Desain
                    </h4>
                    <div class="row col-md-12">
                        <table class="display compact nowrap" id="project_data" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
								
                                <th>Product</th>
								<th>Description</th>
                                <th>Customer</th>
                                <th>Area</th>
                                <th>Estimasi Nilai PO</th>
                                <th>Estimasi Budget</th>
                                <th>Gross Margin</th>
                                <th>%</th>
                                <th>Realisasi Budget</th>
                                <th>No PO</th>
                                <th>Nilai PO</th>
                                <th>No Invoice</th>
                                <th>Nilai Invoice</th>
                                <th>Laba / Rugi</th>
                                <th>%</th>
                                <th>Status Inv</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                                <tr>
                                    <td>1</td>
                                    
                                    <td>[z- sewa genset maintenance] z- Sewa Genset Maintenance</td>
                                    <td>Sewa Genset Merk Deutz</td>
                                    <td>BBSC</td>
                                    <td>Sulawesi</td>
                                    <td>
                                        <div class="pull-right">
                                            86.900.000,00	
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pull-right">
											55.000.000,00	
                                        </div>

                                    </td>
                                    <td><div class="pull-right">31.900.000,00</div></td>
                                    <td></td>
                                    <td><div class="pull-right">31.900.000,00</div></td>
                                    <td></td>
                                    <td><div class="pull-right">31.900.000,00</div></td>
                                    <td>
                                       
                                            <div class="row col-md-12">1370/PCR/INT/PCH-PD/V/16</div>
                                            <br/>                                      
                                    </td>
                                    <td>
                                        
                                            <div class="col-md-12"><div class="pull-right">31.900.000,00</div></div>
                                           
                                    </td>
                                    <td>100</td>
                                    <td>0</td>
                                    <td>
                                            <div class="row col-md-12">7514/PO/INT/PCH-PD/I/17</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><div class="pull-right">31.900.000,00<</div></th>
                                    <th><div class="pull-right">31.900.000,00<</div></th>
                                    <th><div class="pull-right">31.900.000,00<</div></th>
                                    <th>-</th>
                                    <th><div class="pull-right">31.900.000,00<</div></th>
                                    <th>-</th>
                                    <th><div class="pull-right"></div></th>
                                    <th>-</th>
                                    <th><div class="pull-right">0</div></th>
                                    <th><div class="pull-right">0</div></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>                 
                </div>
            </div>
   </div>
      
			
	
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
				 <div class="nav-tabs-custom">
					 <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Januari - April</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Mei - Agustus</a></li>
                                <li><a href="#tab_3" data-toggle="tab">September - Desember</a></li>
                            </ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
							<table class="table table-bordered ">
								<tr>
									<td rowspan="2" class="text-center" >Nomor PO </td>
									<td colspan="2">Januari</td>
									<td colspan="2">Februari</td>
									<td colspan="2">Maret</td>
									<td colspan="2">April</td>
								</tr>
								<tr>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>									
								</tr>
							
								<tr>
									<td class="text-center">026/OM/BBSC/I-2016/Collo-TSEL</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
								</tr>
								<tr>
								</tr>
								
							</table>
						</div>
					<!-- End  Januari - April -->
						
						<div class="tab-pane" id="tab_2">
							<table class="table table-bordered ">
								<tr>
									<td rowspan="2" class="text-center" >Nomor PO </td>
									<td colspan="2">Mei</td>
									<td colspan="2">Juni</td>
									<td colspan="2">Juli</td>
									<td colspan="2">Agustus</td>
								</tr>
								<tr>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>									
								</tr>
							
								<tr>
									<td class="text-center">026/OM/BBSC/I-2016/Collo-TSEL</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
								</tr>
								<tr>
								</tr>
								
							</table>
						</div>
						<!-- End Mei - Agustus -->
						
						<div class="tab-pane" id="tab_3">
							<table class="table table-bordered ">
								<tr>
									<td rowspan="2" class="text-center" >Nomor PO </td>
									<td colspan="2">September</td>
									<td colspan="2">Oktober</td>
									<td colspan="2">November</td>
									<td colspan="2">Desember</td>
								</tr>
								<tr>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>
									<td>Nomor PO</td>	
									<td>Nilai PO</td>									
								</tr>
							
								<tr>
									<td class="text-center">026/OM/BBSC/I-2016/Collo-TSEL</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
									<td>1.200.0000</td>
								</tr>
								<tr>
								</tr>
								
							</table>
						</div>
						<!-- September - Desember -->
					
					</div>
				</div>						
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.jqueryui.min.js"></script>--}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var oTable = $('#project_data').DataTable({
                scrollX: true,
                bPaginate: false,
                searching: false,
                ordering: false,
                bInfo : false,
                fixedColumns: true,
                columnDefs: [
                    { width: 10, targets: [0, 9, 15] },
                    { width: 150, targets: [1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12, 13, 14, 16] }
                ]
            });
        });
    </script>
@endpush
