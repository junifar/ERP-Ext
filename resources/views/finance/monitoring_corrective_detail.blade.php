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
             margin: auto;
             padding: 10px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        Monitoring Maintanance Corrective Detail
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
                                            <th>No</th>
                                            <th colspan="2">PIC</th>
                                            <th>Pembayaran</th>
                                            <th>Nilai MI(Memo Internal)</th>
                                            <th>Tanggal</th>
                                            <th>NO CA / GPR</th>
                                            <th>Status</th>
                                            <th>Nominal</th>
                                            <th>Site</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="3" class="text">1</td>
                                            <td colspan="2">Junifat @</td> 
                                            <td colspan="7">&nbsp;</td> 
                                        </tr>
                                        <tr>
                                            <td colspan="2">1</td>
                                            <td>24</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>ok</td>
                                            <td>1000.000</td>
                                            <td>Sulawesi</td> 
                                        </tr>
                                       <tr>
                                            <td colspan="2">2</td>
                                            <td>24</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>ok</td>
                                            <td>1000.000</td>
                                            <td>Sulawesi</td> 
                                       </tr>

                                          <tr>
                                            <td rowspan="3" class="text">2</td>
                                            <td colspan="2">Wendi</td> 
                                            <td colspan="7">&nbsp;</td> 
                                        </tr>
                                        <tr>
                                            <td colspan="2">1</td>
                                            <td>24</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>ok</td>
                                            <td>1000.000</td>
                                            <td>Sulawesi</td> 
                                        </tr>
                                       <tr>
                                            <td colspan="2">2</td>
                                            <td>24</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>ok</td>
                                            <td>1000.000</td>
                                            <td>Sulawesi</td> 
                                       </tr>

                                          <tr>
                                            <td rowspan="3" class="text">3</td>
                                            <td colspan="2">Andro</td> 
                                            <td colspan="7">&nbsp;</td> 
                                        </tr>
                                        <tr>
                                            <td colspan="2">1</td>
                                            <td>24</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>ok</td>
                                            <td>1000.000</td>
                                            <td>Sulawesi</td> 
                                        </tr>
                                       <tr>
                                            <td colspan="2">2</td>
                                            <td>24</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>0,00</td>
                                            <td>ok</td>
                                            <td>1000.000</td>
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