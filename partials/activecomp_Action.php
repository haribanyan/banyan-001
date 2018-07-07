<?php
include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_item';
if (isset($_POST['item_id']) && !empty($_POST['item_id'])) {
    $array=$_POST['item_id'];
   $index = array_search('select_all', $array);
    if($index !== false){
        unset($array[$index]);
    }
    $cid = implode(',',$array);
    $conditions = array('item_id' => $cid);
    $customer_status = array('item_status' => 1);
    $user = $db->update($tblName, $customer_status, $conditions);
}
?>
 