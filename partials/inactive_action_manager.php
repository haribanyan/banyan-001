<?php
include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_manager';
if (isset($_POST['manager_id']) && !empty($_POST['emp_id'])) {
    $array=$_POST['manager_id'];
   $index = array_search('select_all', $array);
    if($index !== false){
        unset($array[$index]);
    }
    $cid = implode(',',$array);
    $conditions = array('manager_id' => $cid);
    $customer_status = array('status' => 0);
    $user = $db->update($tblName, $customer_status, $conditions);
}
?>
 