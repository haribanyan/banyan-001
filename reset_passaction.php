<?php

$con = mysqli_connect("localhost","root","","real");
include"partials/dbconfig.php";
$old_password=$_POST['old_password'];
$new_pass=$_POST['new_password'];
$email=$_REQUEST['email'];
$password=md5($old_password);
$new_password=md5($new_pass);
$sql="select * from user_master where `user_password`='$password'";
$run = mysqli_query($conn, $sql);
$count=mysqli_num_rows($run);
if($count==1){

 $sql1 ="update `user_master` set `user_password`='$new_password' where `user_password`='$password' ";
$run1 = mysqli_query($conn,$sql1);
/* $admin_id=$array['admin_id'];
setcookie('admin_id', $admin_id); // 86400 = 1 day

$admin_name=$array['admin_name'];
setcookie('admin_name', $admin_name); // 86400 = 1 day


$admin_username=$array['admin_username'];

setcookie('admin_username', $admin_username);  */// 86400 = 1 day

echo "1";

}
else{
echo "2";
}
