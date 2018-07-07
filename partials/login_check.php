
<?php


//$con = mysqli_connect("localhost","root","","real");

include"partials/dbconfig.php";
$username=$_POST['username'];
$pass=$_POST['password'];
$sql="select * from tbl_admin where `admin_username`='$username' and `admin_password`='$pass'";

$run = mysqli_query($conn, $sql);
$count=mysqli_num_rows($run);
if($count==1){
$array=mysqli_fetch_array($run);
$admin_id=$array['admin_id'];
setcookie('admin_id', $admin_id); // 86400 = 1 day

$admin_name=$array['admin_name'];
setcookie('admin_name', $admin_name); // 86400 = 1 day


$admin_username=$array['admin_username'];

setcookie('admin_username', $admin_username); // 86400 = 1 day

echo "1";

}
else{
echo "2";
}

