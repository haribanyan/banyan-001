<?php
include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_cust';
if (isset($_POST['customer_id']) && !empty($_POST['customer_id'])) {
    $array=$_POST['customer_id'];
   $index = array_search('select_all', $array);
    if($index !== false){
        unset($array[$index]);
    }
    $cid = implode(',',$array);
    $conditions = array('cust_id' => $cid);
    $customer_status = array('cust_status' => 1);
    $user = $db->update($tblName, $customer_status, $conditions);
}
?>
 