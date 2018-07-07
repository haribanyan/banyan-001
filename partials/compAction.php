<?php

include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_item';
if (isset($_POST['action_type']) && !empty($_POST['action_type'])) {

    if ($_POST['action_type'] == 'data') {
        $conditions['where'] = array('item_id' => $_POST['id']);

        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName, $conditions);
        echo json_encode($user);
    } elseif ($_POST['action_type'] == 'view') {
        $users = $db->getRows($tblName, array('order_by' => 'item_id DESC'));
        if (!empty($users)) {
            $count = 0;
            foreach ($users as $user): $count++;
                echo '<tr>';
                $cid = $user['item_id'];
                echo '<td><input  id=' . $cid . ' onclick="emp();" type="checkbox" class="emp_checkbox"/></td>';
                echo '<td>';
                echo '<a href="javascript:void(0);" onclick="viewuser(' . $cid . ')">' . $user['item_name'] . '</td>';
                echo '<td>' . $user['units'] . " " . $user['item_unit'] . '</td>';
                echo '<td>' . $user['price'] . '</td>';
                echo '<td>';
                $userstat = $user['item_status'];
                if ($userstat > 0) {
                    echo"Active";
                } else {
                    echo"Inactive";
                }
                echo '</td>';
                echo '</tr>';
            endforeach;
        } else {
            echo '<tr><td colspan="5">No user(s) found......</td></tr>';
        }
    } elseif ($_POST['action_type'] == 'multy') {
        $conditions['where'] = array('item_status' => $_POST['item_status']);
        $users = $db->getRows($tblName, $conditions);
        if (!empty($users)) {
            $count = 0;
            foreach ($users as $user): $count++;
                echo '<tr>';
                $cid = $user['item_id'];
                echo '<td><input id=' . $cid . ' onclick="emp();" type="checkbox" class="emp_checkbox"/></td>';
                echo '<td>';
                echo '<a href="javascript:void(0);" onclick="viewuser(' . $cid . ')">' . $user['item_name'] . '</td>';
                echo '<td>' . $user['units'] . " " . $user['item_unit'] . '</td>';
                echo '<td>' . $user['price'] . '</td>';
                echo '<td>';
                $userstat = $user['item_status'];
                if ($userstat > 0) {
                    echo"Active";
                } else {
                    echo"Inactive";
                }
                echo '</td>';
                echo '</tr>';
            endforeach;
        } else {
            echo '<tr><td colspan="5">No user(s) found......</td></tr>';
        }
    } elseif ($_POST['action_type'] == 'add') {
        $userData = array(
            'item_name' => $_POST['iname'],
            'item_description' => $_POST['itemdesc'],
           
            'item_unit' => $_POST['unit'],
            'current_stock' => $_POST['itemqun'],
            'price' => $_POST['price']
        );
        $insert = $db->insert($tblName, $userData);
        echo $insert ? 'ok' : 'err';
    } elseif ($_POST['action_type'] == 'edit') {
        if (!empty($_POST['id'])) {
            $userData = array(
                'item_name' => $_POST['iname'],
                'item_description' => $_POST['itemdesc'],
               
                'item_unit' => $_POST['unit'],
                'current_stock' => $_POST['itemqun'],
                'price' => $_POST['price']
            );
            $condition = array('item_id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            echo $update ? 'updated' : 'err';
        }
    } elseif ($_POST['action_type'] == 'updateactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('item_id' => $_POST['id']);
            $customer_status = array('item_status' => 1);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } elseif ($_POST['action_type'] == 'updateinactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('item_id' => $_POST['id']);
            $customer_status = array('item_status' => 0);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } elseif ($_POST['action_type'] == 'singleview') {
        if (!empty($_POST['id'])) {
            $conditions['where'] = array('item_id' => $_POST['id']);
            $conditions['return_type'] = 'single';
            $user = $db->getRows($tblName, $conditions);
            echo json_encode($user);
            ?>

            <?php

        } }
		
		elseif ($_POST['action_type'] == 'valid') {
        if (!empty($_POST['val'])) {
			 $iname=$_POST['val'];
            include "dbconfig.php";
 $query="select item_name from tbl_item where item_name='$iname'";
   $res=mysqli_query($conn,$query);
   $rowcount=mysqli_num_rows($res);
   if($rowcount>0){
    echo "valid";
   }
        }
    }
		
     else {
        echo $error ? 'error' : 'err';
    }
    exit;
}
?>