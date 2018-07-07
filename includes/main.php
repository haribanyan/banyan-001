<!DOCTYPE html>
<html>
    <head>
        <title>Sakthi Vinayaka CRM</title>

        <base href="/erps(2)/">
        <link href="app-assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="app-assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="app-assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
        <link href="app-assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
        <link href="app-assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
        <link href="app-assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
        <link href="app-assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
        <!-- PLUGINS STYLES-->
        <link href="app-assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
        <!-- THEME STYLES-->
        <link href="app-assets/css/main.min.css" rel="stylesheet" />
        <style>
            input.ng-invalid {
                border-color: #e29e9e;
            }
            input.ng-valid {
                border-color: #5c6bc0;
            }
            span.error{
                color:#ff0000;
            }
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            <div id="sidebar">
                <!-- START HEADER-->
                <header class="header">
                    <div class="page-brand">
                        <a href="javascript:;">
                            <span class="brand">SVT CRM</span>
                            <span class="brand-mini">SVT</span>
                        </a>
                    </div>
                    <div class="flexbox flex-1">
                        <!-- START TOP-LEFT TOOLBAR-->
                        <ul class="nav navbar-toolbar">
                            <li>
                                <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                            </li>

                        </ul>
                        <!-- END TOP-LEFT TOOLBAR-->
                        <!-- START TOP-RIGHT TOOLBAR-->
                        <ul class="nav navbar-toolbar">
                            <li class="dropdown dropdown-notification">
                                <a class="nav-link dropdown-toggle toolbar-icon" data-toggle="dropdown" href="javascript:;"><i class="ti-bell rel"><span class="notify-signal"></span></i></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                                    <div class="dropdown-arrow"></div>
                                    <div class="dropdown-header text-center">
                                        <div>
                                            <span class="font-18"><strong>14 New</strong> Notifications</span>
                                        </div>
                                        <a class="text-muted font-13" href="javascript:;">view all</a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown dropdown-user">
                                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                                    <span>Super User</span>
                                    <img src="assets/img/users/admin-image.png" alt="image" />
                                </a>
                            </li>

                        </ul>
                        <!-- END TOP-RIGHT TOOLBAR-->
                    </div>
                </header>
            </div>   
            <!-- START SIDEBAR-->
            <nav class="page-sidebar" id="sidebar">
                <div id="sidebar-collapse">
                    <ul class="side-menu metismenu">
                        <li><a href="#/"><i class="sidebar-item-icon ti-home"></i> <span class="nav-label">Dashboard</span></a></li>
                        <li><a href="#/customers"title="Customers"><i class="sidebar-item-icon ti-user"></i> <span class="nav-label">Customers</span></a></li>
                        <li><a href="#/components"title="components"><i class="sidebar-item-icon fa fa-cube"></i> <span class="nav-label">Components</span></a></li>
                        <li><a href="#/products"title="Product"><i class="sidebar-item-icon fa fa-cube"></i> <span class="nav-label">Products</span></a></li>
                        <li><a href="#/sales"title="Sales"><i class="sidebar-item-icon fa fa-money"></i> <span class="nav-label">Sales</span></a></li>
                        <li><a href="#/vendors"title="Vendors"><i class="sidebar-item-icon ti-shopping-cart"></i> <span class="nav-label">Vendors</span></a></li>
                        <li><a href=""title="Vendors"><i class="sidebar-item-icon fa fa-cog"></i> <span class="nav-label">Purchase</span></a></li>
                        <li><a href="#/employee"title="Employees"><i class="sidebar-item-icon fa fa-users"></i> <span class="nav-label">Employees</span></a></li>
                        <li><a href=""title="Vendors"><i class="sidebar-item-icon ti-lock"></i> <span class="nav-label">UserRoles</span></a></li>
                        <li><a href="#/bankdetails"title="Vendors"><i class="sidebar-item-icon ti-lock"></i> <span class="nav-label">Transaction</span></a></li>
                        <li><a href=""title="Vendors"><i class="sidebar-item-icon ti-briefcase"></i> <span class="nav-label">Organizations</span></a></li>
                        <li><a href=""title="Reports"><i class="sidebar-item-icon ti-bar-chart"></i> <span class="nav-label">Reports</span></a></li>
                        <li><a href="#/login"title="Logout"><i class="sidebar-item-icon ti-power-off"></i> <span class="nav-label">Logout</span></a></li></ul>

                </div>
            </nav>
            <!-- END SIDEBAR-->
            <div>

            </div>
            <!-- BEGIN PAGA BACKDROPS-->
            <div class="sidenav-backdrop backdrop"></div>
            <div class="preloader-backdrop">
                <div class="page-preloader">Loading</div>
            </div>
            <!-- END PAGA BACKDROPS-->

          
            <script src="app-assets/vendors/jquery/dist/jquery.min.js"></script>

            <script src="app-assets/vendors/popper.js/dist/umd/popper.min.js"></script>
            <script src="app-assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="app-assets/vendors/metisMenu/dist/metisMenu.min.js"></script>
            <script src="app-assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <script src="app-assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
            <script src="app-assets/vendors/toastr/toastr.min.js"></script>
            <script src="app-assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
            <script src="app-assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
            <!-- PAGE LEVEL PLUGINS-->
            <script src="app-assets/vendors/chart.js/dist/Chart.min.js"></script>
            <script src="app-assets/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
            <script src="app-assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
            <script src="app-assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <!-- CORE SCRIPTS-->
            <script src="app-assets/js/app.min.js"></script>
            <!-- PAGE LEVEL SCRIPTS-->
            <script src="app-assets/js/scripts/dashboard_visitors.js"></script>

    </body>
</html>