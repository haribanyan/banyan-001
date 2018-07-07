<?php

include '../config/DB.php';
$db = new DB();
$tblName = 'comp_info';
if (isset($_POST['action_type']) && !empty($_POST['action_type'])) {
   if ($_POST['action_type'] == 'delete') {
        if (!empty($_POST['id'])) {
            $condition = array('vendor_id' => $_POST['id']);
            $delete = $db->delete($tblName, $condition);
            echo $delete ? 'ok' : 'err';
        }
    } 
	elseif ($_POST['action_type'] == 'singleview') {
        if (!empty($_POST['id'])) {
            $conditions['where'] = array('comp_id' => $_POST['id']);
            $conditions['return_type'] = 'single';
            $user = $db->getRows($tblName, $conditions);
           echo json_encode($user);
            ?>
            
<?php
        }
    }
    exit;
}
?>