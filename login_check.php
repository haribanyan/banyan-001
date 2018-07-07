
<?php

//$con = mysqli_connect("localhost","root","","real");

include"partials/dbconfig.php";
$username=$_POST['username'];
$pass=$_POST['password'];
$password=md5($pass);
$sql="select * from user_master where `user_mailid`='$username' and `user_password`='$password'";
$run = mysqli_query($conn, $sql);
$count=mysqli_num_rows($run);
if($count==1){
$array=mysqli_fetch_array($run);
$admin_id=$array['user_id'];
setcookie('admin_id', $admin_id); // 86400 = 1 day

$admin_name=$array['user_fname'];
setcookie('admin_name', $admin_name); // 86400 = 1 day


$admin_username=$array['user_mailid'];

setcookie('admin_username', $admin_username); // 86400 = 1 day

echo "1";

}
else{
echo "2";
}

