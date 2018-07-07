<?php
include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_product';
if (isset($_POST['prod_id']) && !empty($_POST['prod_id'])) {
    $array=$_POST['prod_id'];
   $index = array_search('select_all', $array);
    if($index !== false){
        unset($array[$index]);
    }
    $cid = implode(',',$array);
    $conditions = array('product_id' => $cid);
    $customer_status = array('status' => 0);
    $user = $db->update($tblName, $customer_status, $conditions);
}
?>
 