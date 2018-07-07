<?php

include"partials/dbconfig.php";
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Tea ERP</title>
        <!-- GLOBAL MAINLY STYLES-->
        <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
        <link href="assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
        <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
        <link href="assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
        <link href="assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
        <!-- PLUGINS STYLES-->
        <!-- THEME STYLES-->
        <link href="assets/css/main.min.css" rel="stylesheet" />
        <style type="text/css">
            .none{display: none;}
        </style>
        <!-- PAGE LEVEL STYLES-->
        <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
        <script src="assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    </head>
	<style></style>
    <body class="fixed-navbar">
        <div class="page-wrapper">
            <!-- START HEADER-->
            <header class="header">
                <div class="page-brand">
                    <a href="javascript:;">
                        <span class="brand">TEA CRM</span>
                        <span class="brand-mini">TEAOOS</span>
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
                            <a class="nav-link dropdown-toggle toolbar-icon" data-toggle="dropdown" href="javascript:;"><i class=""><span class="" Log Out></span></i></a><span><a href="logout.php"><p style="margin-bottom:40px">Logout</p></a></span>

                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                                <div class="dropdown-arrow"></div>
                                <div class="dropdown-header text-center">
                                   
                                    <a class="text-muted font-13" href="javascript:;">view all</a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown" href="javascript:;"><span>Admin</span>
                                <img src="assets/img/users/admin-image.png" alt="image" /></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <div class="dropdown-arrow"></div>
                           
                            <div class="p-3">
                                <ul class="timeline scroller" data-height="20px">
                                     <li class="timeline-item"><a style="margin-top:-10px" href="<?php echo $homeDirMain; ?>/reset_pass.php">Change Password</a></li>
                               
								</ul>
								
                            </div>
                        </div>
                    </li>
                    </ul>
                    <!-- END TOP-RIGHT TOOLBAR-->
                </div>
            </header>
            <!-- END HEADER-->
            <!-- START SIDEBAR-->
            <nav class="page-sidebar" id="sidebar" style="position:fixed" >
                <div id="sidebar-collapse" >
                    <ul class="side-menu metismenu">
                        <li><a href="#/"onclick="loadpage('listhome')" title="Home"><i class="sidebar-item-icon ti-home" style="color:white"></i> <span class="nav-label">Home</span></a></li>
                    <li><a href="#" onclick="loadpage('listemployees')"  title="Employees"><i class="sidebar-item-icon fa fa-users" style="color:white"></i><span class="nav-label" style="margin-left: 17px;"> Employees</span> <i class="ti-plus" style="margin-left:130px;margin-top:5px"></i></a>
                          
                        </li>   
   <li><a href="#" onclick="loadpage('listsuppliers')"  title="Suppliers"><i class="sidebar-item-icon fa fa-users" style="color:white"></i><span class="nav-label" style="margin-left: 17px;"> Suppliers</span> <i class="ti-plus" style="margin-left:130px;margin-top:5px"></i></a>
                          
                        </li> 
  <li><a href="#" onclick="loadpage('listproducts')"  title="Products"><i class="sidebar-item-icon fa fa-shopping-cart" style="color:white"></i><span class="nav-label" style="margin-left: 17px;"> Products</span> <i class="ti-plus" style="margin-left:130px;margin-top:5px"></i></a></li>
  <li><a href="#" onclick="loadpage('listdivision')"  title="Division"><i class="sidebar-item-icon fa fa-shopping-cart" style="color:white"></i><span class="nav-label" style="margin-left: 17px;"> Division</span> <i class="ti-plus" style="margin-left:130px;margin-top:5px"></i></a></li>
  <li><a href="#" onclick="loadpage('listmanagers')"  title="Division"><i class="sidebar-item-icon fa fa-shopping-cart" style="color:white"></i><span class="nav-label" style="margin-left: 17px;"> Division Managers</span> <i class="ti-plus" style="margin-left:130px;margin-top:5px"></i></a></li>
  <li><a href="#" onclick="loadpage('addpurchase')"  title="Purchase"><i class="sidebar-item-icon fa fa-shopping-cart" style="color:white"></i><span class="nav-label" style="margin-left: 17px;">Add Purchase</span> <i class="ti-plus" style="margin-left:130px;margin-top:5px"></i></a></li>
                  
                       
                       
						
                        <li><a href="logout.php"title="Logout"><i class="sidebar-item-icon ti-power-off"style="color:white"></i> <span class="nav-label">Logout</span></a></li>
						
						</ul>
                </div>
            </nav>
            <!-- END SIDEBAR-->
            <div class="content-wrapper">
                <!-- START PAGE CONTENT-->
                <div id="main">
				<div class="page-content fade-in-up">
 

<div class="ibox login-content"  ng-controller="LoginController">
<div class="row">
        <div class="text-center col-sm-4 col- md-4">
            <span class="auth-head-icon" ><i class=""></i></span>
        </div>  <div class="col-sm-4 col- md-4">   <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                                
                                <img src="assets/img/users/logo.png" width="200px" style="margin-left:80px" height="200px" alt="image" />
                            </a>
		           
             <p style="font-family:poppins;font-size:30px;text-align:center;margin-left:20px">Welcome To</p>
   
	  <p style="font-family:poppins;font-size:30px;text-align:center">Tea App </p>
	   <p style="font-family:poppins;font-size:30px;text-align:center"> Management System </p>
           </div><div class="col-sm-4 col- md-4" ></div>
          
       </div>    
    </div>



 
</div>
                </div>
                <!-- END PAGE CONTENT-->
                <footer class="page-footer">
                    <div class="font-13">2018 © <b>Tea APP</b></div>
                    <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
                </footer>
            </div>
        </div>
        <!-- BEGIN PAGA BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
        <div class="preloader-backdrop">
            <div class="page-preloader">Loading</div>
        </div>
        <script src="assets/vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/vendors/metisMenu/dist/metisMenu.min.js"></script>
        <script src="assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
        <script src="assets/vendors/toastr/toastr.min.js"></script>
        <script src="assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <!-- PAGE LEVEL PLUGINS-->
        <!-- CORE SCRIPTS-->
        <script src="assets/js/app.min.js"></script>
        <!-- PAGE LEVEL SCRIPTS-->
        <script>
                                    $(document).ready(function () {
                                        var allcookies = document.cookie;
                                        cookiearray = allcookies.split(';');
                                        if (cookiearray.length > 0) {

                                            // Now take key value pair out of this array
                                            name = cookiearray[3].split('=')[0];



                                            value = cookiearray[3].split('=')[1];


                                            loadpage(value);
                                        }
                                    });
                                    function loadpage(page)
                                    {
                                        document.cookie = "page=" + page;
                                        var allcookies = document.cookie;

                                       console.log(allcookies);

                                        $("#main").load("partials/" + page + ".php");
                                    }
        </script>
    </body>
</html>