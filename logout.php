<?php
unset($_COOKIE['admin_id']);
unset($_COOKIE['admin_name']);

unset($_COOKIE['admin_username']);
setcookie('admin_id', ''); 
 header("Location: login.php");

?>