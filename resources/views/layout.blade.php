<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            ERP-Ext - @yield('title')
        </title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.2 -->
        <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('bower_components/admin-lte/dist/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('bower_components/admin-lte/dist/css/skins/_all-skins.min.css')}}">
        <!-- Pace style -->
        {{--<link rel="stylesheet" href="{{asset('bower_components/pace/themes/green/pace.min.css')}}">--}}
        <link rel="stylesheet" href="{{asset('bower_components/pace/themes/green/pace-theme-minimal.css')}}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <style type="text/css">
            td.details-control {
                background: url('https://datatables.yajrabox.com/images/details_open.png') no-repeat center center;
                cursor: pointer;
                width: 18px;
            }
        </style>
        @stack('css-head')
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">

                <!-- Logo -->
                    <a href="/" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>ERP</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>ERP</b>-Ext</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            {{--<a href="{!! route('companies'); !!}">--}}
                                {{--<i class="fa fa-dashboard"></i> <span>Admin Dashboard</span>--}}
                            {{--</a>--}}
                        </li>
                        {{--Dashboard Menu--}}
                        <li class="active treeview">
                            <a href="#">
                                <i class="fa fa-th-large"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{!! route('dashboard'); !!}"><i class="fa fa-th-large"></i> Dashboard</a></li>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('content-header')
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.12
                </div>
                <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>

        <!-- jQuery 3 -->
        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        {{--Handlebars--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>

        <!-- DataTables -->
        <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

        <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>


        <!-- PACE -->
        <script src="{{asset('bower_components/pace/pace.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('bower_components/admin-lte/dist/js/adminlte.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
        <!-- jvectormap -->
        {{--<script src="{{asset('bower_components/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
        {{--<script src="{{asset('bower_components/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>--}}
        <!-- SlimScroll 1.3.0 -->
        <script src="{{asset('bower_components/jquery-slimScroll/jquery.slimscroll.min.js')}}"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="{{asset('bower_components/chart.js/Chart.min.js')}}"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        {{--<script src="{{asset('plugins/AdminLTE/dist/js/pages/dashboard2.js')}}"></script>--}}
        <!-- AdminLTE for demo purposes -->

        <script src="{{asset('bower_components/admin-lte/dist/js/demo.js')}}"></script>

        {{--custom module search datatables--}}
        <script src="{{asset('js/pipeline.js')}}"></script>

        <script type="text/javascript">
            // To make Pace works on Ajax calls
            $(document).ajaxStart(function() { Pace.restart(); });
            $('.ajax').click(function(){
                $.ajax({url: '#', success: function(result){
                    $('.ajax-content').html('<hr>Ajax Request Completed !');
                }});
            });
        </script>

        @stack('scripts')
    </body>
</html>