<?php
include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_emp';
if (isset($_POST['emp_id']) && !empty($_POST['emp_id'])) {
    $array=$_POST['emp_id'];
   $index = array_search('select_all', $array);
    if($index !== false){
        unset($array[$index]);
    }
    $cid = implode(',',$array);
    $conditions = array('emp_id' => $cid);
    $customer_status = array('status' => 1);
    $user = $db->update($tblName, $customer_status, $conditions);
}
?>
 