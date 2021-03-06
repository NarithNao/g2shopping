<?php
$user_session = \Illuminate\Support\Facades\Session::get('logged_in');
$users = App\User::all();
if(count($users) <= 0){
    \Illuminate\Support\Facades\Session::forget('logged_in');
    return redirect('admin/login');
}

$user = \App\User::find($user_session[0]['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>G2Shopping Admin</title>

    <link rel="icon" type="image/png" href="{{asset('images/logo/g2-logo.png')}}" sizes="32x32">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- Bootstrap Theme CSS -->
    <link href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- MetisMenu CSS -->
    <link href="{{asset('backend/bower_components/metisMenu/metisMenu.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- Custom CSS -->
    <link href="{{asset('backend/bower_components/sb-admin/sb-admin-2.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- waitMe CSS -->
    <link href="{{asset('backend/bower_components/waitMe/waitMe.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    @yield('css')

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('admin/dashboard')}}">G2Shopping</a>
            <a href="{{url('/')}}" target="_blank"><img src="{{asset('images/logo/shopping-logo.png')}}" width="20px;" style="margin-top: 15px;" data-toggle="tooltip" title="Go to Store Front" data-placement="right"></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{$user->username}} <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{url('admin/profile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>--}}
                    <li class="divider"></li>
                    <li><a href="{{url('admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    {{--<li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>--}}
                    <li class="active">
                        <a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{url('admin/components')}}"><i class="fa fa-cogs fa-fw"></i> Content Management<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('admin/header')}}">Header</a>
                            </li>
                            <li>
                                <a href="{{url('admin/slider')}}">Slider</a>
                            </li>
                            <li>
                                <a href="{{url('admin/block')}}">Block</a>
                            </li>
                            <li>
                                <a href="#">Menu<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="{{url('admin/top-menu')}}">Top Menu</a>
                                    </li>
                                    <li>
                                        <a href="{{url('admin/main-menu')}}">Main Menu</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('admin/footer')}}">Footer</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('admin/pages')}}"><i class="fa fa-file-text fa-fw"></i> Webpages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('admin/page1')}}">Pages1</a>
                            </li>
                            <li>
                                <a href="{{url('admin/page2')}}">Pages2</a>
                            </li>
                        </ul>
                    </li>
                    {{--<li class="text-primary text-capitalize" style="padding: 10px;">Ecommerce</li>--}}
                    <li>
                        <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Sales<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('admin/order')}}">Orders</a>
                            </li>
                            <li>
                                <a href="{{url('admin/cart')}}">Current Shopping Carts</a>
                            </li>
                            <li>
                                <a href="{{url('admin/wishlist')}}">Current Wishlists</a>
                            </li>
                            <li>
                                <a href="{{url('admin/report')}}">Reports</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-tasks fa-fw"></i> Catalog<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('admin/category')}}">Categories</a>
                            </li>
                            <li>
                                <a href="{{url('admin/manufacturer')}}">Manufacturers</a>
                            </li>
                            <li>
                                <a href="{{url('admin/product')}}">Products</a>
                            </li>
                            <li>
                                <a href="{{url('admin/attribute')}}">Attributes</a>
                            </li>
                        </ul>
                    </li>
                    {{--<li>
                        <a href="{{url('admin/administration')}}"><i class="fa fa-user-secret fa-fw"></i> Administration</a>
                    </li>--}}
                    <li>
                        <a href="javascript:;"><i class="fa fa-user-secret fa-fw"></i> Administration<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('admin/user_role')}}">User Roles</a>
                            </li>
                            <li>
                                <a href="{{url('admin/user')}}" id="mn_user" style="background-color: #fff;">Users</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Setting<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('admin/currency')}}">Currentcies</a>
                            </li>
                            <li>
                                <a href="{{url('admin/tax')}}">Taxes</a>
                            </li>
                            <li>
                                <a href="{{url('admin/plugin')}}">Plugin</a>
                            </li>
                            <li>
                                <a href="{{url('admin/seo')}}">SEO</a>
                            </li>
                            <li>
                                <a href="{{url('admin/payment-method')}}">Payment Method</a>
                            </li>
                        </ul>
                    </li>

                    {{--<li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Setting<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('admin/currency')}}">Currentcies</a>
                            </li>
                            <li>
                                <a href="{{url('admin/tax')}}">Taxes</a>
                            </li>
                            <li>
                                <a href="{{url('admin/plugin')}}">Plugin</a>
                            </li>
                            <li>
                                <a href="{{url('admin/seo')}}">SEO</a>
                            </li>
                            <li>
                                <a href="{{url('admin/payment-method')}}">Payment Method</a>
                            </li>
                        </ul>
                    </li>--}}
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('backend/bower_components/metisMenu/metisMenu.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('backend/bower_components/sb-admin/sb-admin-2.js')}}"></script>
{{-- waitMe plugin Javascript --}}
<script src="{{asset('backend/bower_components/waitMe/waitMe.min.js')}}"></script>
{{-- toaster plugin Javascript --}}
<script src="{{asset('jquery/jquery.toaster.js')}}"></script>

{{-- Custom own Javascript functions --}}
<script src="{{asset('backend/js/g2shopping.utilities.js')}}"></script>
<script src="{{asset('backend/js/g2shopping.plugin.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

    @yield('js')

</body>

</html>
