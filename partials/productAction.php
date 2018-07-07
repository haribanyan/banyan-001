<?php

include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_product';
if (isset($_POST['action_type']) && !empty($_POST['action_type'])) {
    if ($_POST['action_type'] == 'data') {
        $conditions['where'] = array('product_id' => $_POST['id']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName, $conditions);
        echo json_encode($user);
    } 

elseif ($_POST['action_type'] == 'updateactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('product_id' => $_POST['id']);
            $customer_status = array('status' => 1);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } 
elseif ($_POST['action_type'] == 'updateinactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('product_id' => $_POST['id']);
            $customer_status = array('status' => 0);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } 
elseif ($_POST['action_type'] == 'delete') {
        if (!empty($_POST['id'])) {
            $condition = array('product_id' => $_POST['id']);
            $delete = $db->delete($tblName, $condition);
            echo $delete ? 'ok' : 'err';
        }
    } 
	elseif ($_POST['action_type'] == 'add') {
		$date=date("Y-m-d H:i:s");
        $userData = array(
            'product_name' => $_POST['pname'],
            'product_alias_name' => $_POST['aliasname'],
            'product_type' => $_POST['type'],
            'cost_type' => $_POST['costtype'],
            'product_created_on' => $date,
            'product_updated_on' =>$date,
            'status' => 1,
          
        );
        $insert = $db->insert($tblName, $userData);
        echo $insert ? 'ok' : 'err';
    } 
	elseif ($_POST['action_type'] == 'edit') {
		$date=date("Y-m-d H:i:s");
        if (!empty($_POST['id'])) {
           $userData = array(
            'product_name' => $_POST['pname'],
            'product_alias_name' => $_POST['aliasname'],
            'product_type' => $_POST['type'],
            'cost_type' => $_POST['costtype'],
            'product_updated_on' =>$date,
           
        );
            $condition = array('product_id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            echo $update ? 'updated' : 'err';
        }
    }
elseif ($_POST['action_type'] == 'singleview') {
        if (!empty($_POST['id'])) {
            $conditions['where'] = array('product_id' => $_POST['id']);
            $conditions['return_type'] = 'single';
            $user = $db->getRows($tblName, $conditions);
            echo json_encode($user);
            ?>

            <?php

        }
    } else {
        echo $error ? 'error' : 'err';
    }
    exit;
}
?>