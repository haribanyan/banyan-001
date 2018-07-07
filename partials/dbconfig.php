<?php 
$dbHost='localhost';
$dbUsername='root';
$dbPassword='';
$dbName='real';

$homeDir = 'http://localhost/realestate/partials';
$homeDirMain = 'http://localhost/realestate/';

$conn=new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
if($conn->connect_error){
die("conection failed:".$conn->connect_error);

/*Home folder*/


}

?>