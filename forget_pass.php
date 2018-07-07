<?php
if (isset($_COOKIE['admin_id'])) {
    if ($_COOKIE['admin_id'] == '') {
        header("Location: index.php");
    }
}
include"partials/dbconfig.php";
?> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>SVT ERP</title>
    <!-- GLOBAL MAINLY STYLES-->
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
<style>
    body {
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url('assets/img/blog/20.jpg');
    }
    .errors{
        color:#ff0000;
    }
    .cover {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(117, 54, 230, .1);
    }

    .login-content {
        max-width: 400px;
        margin: 100px auto 50px;
    }

    .auth-head-icon {
        position: relative;
        height: 60px;
        width: 60px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        background-color: #fff;
        color: #5c6bc0;
        box-shadow: 0 5px 20px #d6dee4;
        border-radius: 50%;
        transform: translateY(-50%);
        z-index: 2;
    }
</style>
<div class="ibox login-content" >
    <div class="text-center">
        <span class="auth-head-icon"><i class="la la-user"></i></span>
    </div>
    <form name="logform" class="ibox-body" id="login-form"  >
<h4 class="font-strong text-center mb-5" style="font-family:poppins"></h4>
        <h4 class="font-strong text-center mb-5" style="font-family:poppins">Reset Password</h4>
        <div class="form-group mb-4">
            <p style="font-family:poppins">Email Id</p> <input style="font-family:poppins" class="form-control form-control-line" type="email"  name="email" placeholder="Email Id" required>


        </div>
        <div class="form-group mb-4">
           <p style="font-family:poppins">Mobile Number</p> <input style="font-family:poppins" class="form-control form-control-line" type="text"   name="mobile_num" placeholder="Mobile Number" required>
		   
		   


        </div>
        <div class="text-center">	<span class="errors"></span></div>
        <div class="text-center mb-4">

            <button type="button"  class="btn btn-primary btn-rounded btn-block submitfn"  onclick="resetpass();" >Reset Password</button>
        </div>
    </form>
</div>
<!-- BEGIN PAGA BACKDROPS-->
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
var url = "<?php echo $homeDirMain; ?>";
                $(document).ready(function () {
                    var allcookies = document.cookie;
                    cookiearray = allcookies.split(';');
                    if (cookiearray.length > 0) {
                        // Now take key value pair out of this array
                        name = cookiearray[0].split('=')[0];
                        value = cookiearray[0].split('=')[1];
                        loadpage(value);
                    }
                });
                function loadpage(page)
                {
                    var delete_cookie = function (page) {
                        document.cookie = page + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                    };
                    delete_cookie('page');
                    document.cookie = "page=" + page;
                    $("#main").load("partials/" + page + ".php");
                }

                function resetpass() {
                    var str = $('#login-form').serialize();
					//alert(str);
                    $.ajax({
                        type: 'POST',
                        dataType: 'JSON',
                        url: 'forget_passaction.php',
                        data: str,
                        success: function (data) {
                          console.log(data);
						  //alert(data);
                            if (data == 1) {
								//var page="listhome.php";
								//alert('hi');
								//document.cookie = "page=" + page;
								//loadpage(page);
                               window.location.href = url+"/login.php";
                            } else {
                                alert('Invalid Mailid/Mobile Number');
                            }
                        }
                    });
                }
</script>