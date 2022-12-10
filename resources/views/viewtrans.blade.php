
<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>{{ Auth::user()->name }}</title>
        <link rel="shortcut icon" href="{{ url('assets/dist/img/favicon.png') }}" type="image/x-icon">
        <script src="{{ url('ajax/libs/webfont/1.6.26/webfont.js') }}"></script>
        <script>
            WebFont.load({
                google: {families: ['Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i']},
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!-- START GLOBAL MANDATORY STYLE -->
         <link href="{{ url('assets/dist/css/base.css') }}" rel="stylesheet" type="text/css">
        <!-- START PAGE LABEL PLUGINS --> 

        <!-- START THEME LAYOUT STYLE -->
        <link href="{{ url('assets/dist/css/style.css') }}" rel="stylesheet" type="text/css"/>
        
    </head>
    <body class="hold-transition fixed sidebar-mini">
        
        <!-- Preloader -->
        <div class="preloader"></div>
        
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header"> 
                <a href="#" class="logo"> <!-- Logo -->
                    <span class="logo-mini">
                        <!--<b>A</b>H-admin-->
                        <img src="{{ url('assets/dist/img/aglogo.png') }}" alt="img">
                    </span>
                    <span class="logo-lg">
                        <!--<b>Admin</b>H-admin-->
                        <img src="{{ url('assets/dist/img/aglogo.png') }}" alt="img" style="height: 60px;">
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
                                    <li><a href="logout"><i class="ti-key"></i> Logout</a></li>
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
                                    <li><a href="logout">Logout</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </div> <!-- /.sidebar -->
                </aside>
            </header>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
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
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>User Trans Details </h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                                        <table id="example2" class="footable table table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Trans ID</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                <?php
                                                    $date= $data->created_at;
                                                    $dd = date_format($date,"Y-m-d");                                                    
                                                ?>
                                                <tr>
                                                    <td>{{ $data->id; }} </td>
                                                    <td>{{ $data->balance; }}</td>
                                                    <td>{{ $dd; }}</td>
                                                    
                                                    
                                                </tr>  
                                                @endforeach
                                                                                              
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    
                
                </div>
            </div>

            
            
            
            
            <footer class="main-footer">
                <div class="pull-right hidden-xs">Ali Akbar</div>
                <strong>Copyright &copy; 2022</strong> All rights reserved. <i class="fa fa-heart color-green"></i>
            </footer>
        </div> <!-- ./wrapper -->
        
        
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
        
        <!-- modals js -->
        <script src="{{ url('assets/plugins/modals/classie.js') }}"></script>
        <script src="{{ url('assets/plugins/modals/modalEffects.js') }}"></script>
        
    </body>


</html>