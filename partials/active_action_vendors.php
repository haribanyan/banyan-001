<?php
include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_vendor';
if (isset($_POST['vendor_id']) && !empty($_POST['vendor_id'])) {
    $array=$_POST['vendor_id'];
   $index = array_search('select_all', $array);
    if($index !== false){
        unset($array[$index]);
    }
    $cid = implode(',',$array);
    $conditions = array('vendor_id' => $cid);
    $customer_status = array('vendor_status' => 1);
    $user = $db->update($tblName, $customer_status, $conditions);
}
?>
 