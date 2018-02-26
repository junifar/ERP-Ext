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
        .text{
             margin: 0px;
             height: 10em;
             align-items: middle;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Monitoring Maintanance Paid Detail
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <b>Tahun : 2018</b> 
                        </div>
                        <div class="col-md-6">
                            <b>Total Nilai PO : 0,00</b>
                        </div>
                        <div class="col-md-6">
                            <b>Customer : PT. TOWER BERSAMA</b>
                        </div>
                        <div class="col-md-6">
                            <b>Total Penagihan :  0,00</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <div class="header">
                        <h4>Summary Project</h4>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="2">PIC</th>
                                            <th>Pembayaran</th>
                                            <th>Nilai Budget</th>
                                            <th>Nilai MI(Memo Internal)</th>
                                            <th>Tanggal</th>
                                            <th>NO CA / GPR / RMB</th>
                                            <th>Status</th>
                                            <th>Nominal</th>
                                            <th>Site</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="10""><h5><b>Junifat @</b></h5></td> 
                                        </tr>
                                        <tr>
                                            <td colspan="2">1</td>
                                            <td>CA Imbas Petir</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>1/9/2015</td>
                                            <td>1500627</td>
                                            <td>Paid</td>
                                            <td>12.000.000</td> 
                                            <td>Sulawesi</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">2</td>
                                            <td>CA Imbas Petir</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>1500627</td>
                                            <td>Paid</td>
                                            <td>12.000.000</td> 
                                            <td>Sulawesi</td>
                                        </tr>

                                         <tr>
                                            <td colspan="10""><h5><b>Wendi @</b></h5></td> 
                                        </tr>
                                        <tr>
                                            <td colspan="2">1</td>
                                            <td>CA Imbas Petir</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>1500627</td>
                                            <td>Paid</td>
                                            <td>12.000.000</td> 
                                            <td>Sulawesi</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">2</td>
                                            <td>CA Imbas Petir</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>1500627</td>
                                            <td>Paid</td>
                                            <td>12.000.000</td> 
                                            <td>Sulawesi</td>
                                        </tr>
                                        
                                         <tr>
                                            <td colspan="10""><h5><b>Andro @</b></h5></td> 
                                        </tr>
                                        <tr>
                                            <td colspan="2">1</td>
                                            <td>CA Imbas Petir</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>1500627</td>
                                            <td>Paid</td>
                                            <td>12.000.000</td> 
                                            <td>Sulawesi</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">2</td>
                                            <td>CA Imbas Petir</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>1500627</td>
                                            <td>Paid</td>
                                            <td>12.000.000</td> 
                                            <td>Sulawesi</td>
                                        </tr>  
                                        
                                    </tbody>
                             </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection