<?php
include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_division';
if (isset($_POST['division_id']) && !empty($_POST['division_id'])) {
    $array=$_POST['division_id'];
   $index = array_search('select_all', $array);
    if($index !== false){
        unset($array[$index]);
    }
    $cid = implode(',',$array);
    $conditions = array('division_id' => $cid);
    $customer_status = array('status' => 1);
    $user = $db->update($tblName, $customer_status, $conditions);
}
?>
 