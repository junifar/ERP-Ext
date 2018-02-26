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
            @foreach($budget_plan as $data)
                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            Detail Monitoring Preventive
                        </h4>
                         <div class="row">
                            <div class="col-md-6">
                             <label>Nama Customer :</label>
                                    {{ $data->customer_name }}
                            </div>
                            
                            <div class="col-md-6">
                             <label>Tahun :</label>
                                    {{ $data->year }}
                            </div>                          
                            
                            <div class="col-md-5">
                               <label>Area :</label>
                                    {{ $data->area_name }} 
                                </div>  
                                </div>

                            </div>
                </div>
            @endforeach
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
                                <th>Nomor Budget</th>
                                <th >Bulan Berjalan</th>
                                <th></th>
                                <th></th>
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
                                @php 
                                     $page_num = 0;
                                @endphp
                                @foreach($budget_plan as $data)
                                <tr>
                                    <td>{{ ++$page_num }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>
                                        
                                            {{ number_format($data->estimate_po,2, ',', '.')}}   
                                        
                                    </td>
                                    <td>
                                        
                                            0   
                                      

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
                             @endforeach   
                            </tbody>
                        </table>
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