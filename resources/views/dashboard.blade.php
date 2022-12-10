
<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>{{ Auth::user()->name }}</title>
        <link rel="shortcut icon" href="assets/dist/img/favicon.png" type="image/x-icon">
        <script src="ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
            WebFont.load({
                google: {families: ['Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i']},
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!-- START GLOBAL MANDATORY STYLE -->
         <link href="assets/dist/css/base.css" rel="stylesheet" type="text/css">
        <!-- START PAGE LABEL PLUGINS --> 

        <!-- START THEME LAYOUT STYLE -->
        <link href="assets/dist/css/style.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body class="hold-transition fixed sidebar-mini">
<?php
$bal = App\Models\Wallet::where('user_id', '=', Auth::user()->id)->sum('balance');;

?>
        <!-- Preloader -->
        <div class="preloader"></div>
        
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header"> 
                <a href="#" class="logo"> <!-- Logo -->
                    <span class="logo-mini">
                        <!--<b>A</b>H-admin-->
                        <img src="assets/dist/img/aglogo.png" alt="img">
                    </span>
                    <span class="logo-lg">
                        <!--<b>Admin</b>H-admin-->
                        <img src="assets/dist/img/aglogo.png" alt="img" style="height: 60px;">
                    </span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle hidden-sm hidden-md hidden-lg" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="ti-menu-alt"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <form class="navbar-form hidden-xs" role="search">
                                    <div class="input-group add-on">
                                        <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit" data-toggle="tooltip" data-placement="bottom" title="Search"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="dropdown dropdown-settings">
                                <a href="#" class="dropdown-toggle bubbly-button" data-toggle="dropdown"> <i class="fa fa-bell-o"></i><span class="badge fadeAnim">2</span></a>
                                
                            </li>
                            <li class="dropdown dropdown-settings">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="ti-email"></i><span class="badge fadeAnim">3</span></a>
                                
                            </li>
                            <li class="dropdown dropdown-settings">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="ti-menu"></i></a>
                                
                            </li>
                            <li class="dropdown dropdown-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="ti-user"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('dashboard')}}"><i class="ti-user"></i> User Profile</a></li>
                                    <?php if(Auth::user()->id == 1){ ?>
                                    <li><a href="{{route('manageuser')}}"><i class="ti-user"></i> Manage User</a></li>
                                    <?php }?>
                                    <li><a href="#"><i class="ti-settings"></i> Settings</a></li>
                                    <li><a href="{{ url('logout') }}"><i class="ti-key"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <aside class="main-sidebar">
                    <!-- sidebar -->
                    <div class="sidebar">
                        <!-- sidebar menu -->
                        <ul class="sidebar-menu">
                            <li class="treeview">
                                <a href="#">
                                    <i class="ti-home"></i><span>Dashboard</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if(Auth::user()->id == 1){ ?>
                                    <li><a href="{{ route('manageuser') }}">Mange User</a></li>
                                    <?php }?>
                                    <li><a href="{{route('dashboard')}}">My Profile</a></li>
                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div> <!-- /.sidebar -->
                </aside>
            </header>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                <!-- Main content -->
                <div class="content">
                    <div class="content-header">
                        <div class="header-icon">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <div class="header-title">
                            <h1><?php if(Auth::user()->id == 1){ echo 'Super Admin'; }else{ echo 'Admin';}?></h1>
                            <small>A simple and user-friendly Basic form</small>
                            <ol class="breadcrumb">
                                <li><a href="#"><i class="pe-7s-home"></i> Home</a></li>
                                <li><a href="#">Forms</a></li>
                                <li class="active">Basic Form</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Form controls -->
                        
                        <!-- Textual inputs -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <?php if(Auth::user()->id != 1){ ?>
                                        <button type="button" class="btn btn-success" data-toggle="modal" onclick="clickaddBal({{ Auth::user()->id }});">
                                            Topup wallet
                                        </button>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="panel-body">
                                
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" value="{{ Auth::user()->name }}" name="name">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="email" value="{{ Auth::user()->email }}" name="email">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="example-tel-input" class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" value="{{ Auth::user()->mobile }}" id="mobile">
                                        </div>
                                    </div>
                                    
                                    <?php
                                        $date= Auth::user()->created_at;
                                        $dd = date_format($date,"Y-m-d");
                                        
                                    ?>
                                    <div class="form-group row">
                                        <label for="example-date-input" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" value="{{ $dd; }}" id="example-date-input">
                                        </div>
                                    </div>

                                    <?php if(Auth::user()->id != 1){ ?>

                                    <div class="form-group row">
                                        <label for="example-tel-input" class="col-sm-3 col-form-label">Total Balance</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" value="{{ $bal }}" readonly>
                                        </div>
                                    </div>
                                    <?php }?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkboxes & Radios -->
                    
                
                </div>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">Ali Akbar</div>
                <strong>Copyright &copy; 2022</strong> All rights reserved. <i class="fa fa-heart color-green"></i>
            </footer>
        </div> <!-- ./wrapper -->

        <div id="user-wallet-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add Balance</h4>
                    </div>
                    <div class="modal-body" id="wallet_body">                
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function clickaddBal(user_id){
                $.ajax({
                    url: '{{ route("clickmodal") }}',
                    type: 'POST',
                    data: {
                        'user_id':      user_id,
                        '_token':       $('input[name=_token]').val()
                    },
                    success: function(data){
                        $('#wallet_body').html(data);
                        $('#user-wallet-modal').modal('show');
                    }
                }); 
            }
            function addwallet(user_id){
                $.ajax({
                    url: '{{ route("clickmodal") }}',
                    type: 'POST',
                    data: {
                        'user_id':      user_id,
                        '_token':       $('input[name=_token]').val()
                    },
                    success: function(data){
                        $('#wallet_body').html(data);
                        $('#user-wallet-modal').modal('show');
                    }
                }); 
            }
        </script>
        <!-- START CORE PLUGINS -->
        <script src="{{ url('assets/plugins/jQuery/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ url('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
        <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ url('assets/plugins/fastclick/fastclick.min.js') }}"></script>
        <script src="{{ url('assets/plugins/metisMenu/metisMenu.min.js') }}"></script>
        <script src="{{ url('assets/plugins/lobipanel/lobipanel.min.js') }}"></script>
        <!-- START THEME LABEL SCRIPT -->
        <script src="{{ url('assets/dist/js/theme.js') }}"></script>
        
        
    </body>


</html>