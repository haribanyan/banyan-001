<?php

include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_cust';include 'msg_functionality.php';

if (isset($_POST['action_type']) && !empty($_POST['action_type'])) {
    if ($_POST['action_type'] == 'data') {
        $conditions['where'] = array('cust_id' => $_POST['id']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName, $conditions);
        echo json_encode($user);
    } elseif ($_POST['action_type'] == 'view') {
        $users = $db->getRows($tblName, array('order_by' => 'cust_first_name'));
        if (!empty($users)) {
            $count = 0;
            foreach ($users as $user): $count++;
                $cid = $user['cust_id'];
                echo '<tr>';
                echo '<td><input id=' . $cid . '  onclick="emp();" type="checkbox" class="emp_checkbox"/></td>';
                echo '<td>';
                echo '<a href="javascript:void(0);" onclick="viewuser('. $cid .')">'. $user['cust_first_name'] . '</td>';
                echo '<td>' . $user['cust_last_name'] . '</td>';
                echo '<td>' . $user['cust_phone_no'] . '</td>';
                echo '<td>' . $user['cust_city'] . '</td>';
                echo '<td>' . $user['cust_state'] . '</td>';
                echo '<td>';
                $userstat = $user['cust_status'];
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
        $conditions['where'] = array('cust_status' => $_POST['customer_status']);
        $users = $db->getRows($tblName, $conditions);
        if (!empty($users)) {
            $count = 0;
            foreach ($users as $user): $count++;
                echo '<tr>';
                $cid = $user['cust_id'];
                echo '<td><input id=' . $cid . ' onclick="emp();" type="checkbox" class="emp_checkbox"/></td>';
                echo '<td>';
                echo '<a href="javascript:void(0);" onclick="viewuser('. $cid .')">'. $user['cust_first_name'] . '</td>';
                echo '<td>' . $user['cust_last_name'] . '</td>';
                echo '<td>' . $user['cust_phone_no'] . '</td>';
                echo '<td>' . $user['cust_city'] . '</td>';
                echo '<td>' . $user['cust_state'] . '</td>';
                echo '<td>';
                $userstat = $user['cust_status'];
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
    } 

elseif($_POST['action_type'] == 'phone') {
include"dbconfig.php";
$sql = "select * from `tbl_cust` where cust_phone_no = '".$_POST['phone']."'";
$res = mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($res);
if($rowcount>0) {
echo $res ? 'phone' : 'err'; 
}

}
elseif ($_POST['action_type'] == 'add') {
        $userData = array(
            'cust_salutation' => $_POST['salutation'],
            'cust_first_name' => $_POST['fname'],
            'cust_last_name' => $_POST['lname'],
            'cust_email_id' => $_POST['email'],
            'cust_phone_no' => $_POST['phone'],
            'cust_addr' => $_POST['address'],
            'cust_city' => $_POST['city'],
            'cust_state' => $_POST['state'],
            'cust_pincode' => $_POST['pincode']
        );
        $insert = $db->insert($tblName, $userData);
        echo $insert ? 'ok' : 'err';
    } 
	elseif ($_POST['action_type'] == 'edit') {
        if (!empty($_POST['id'])) {
            $userData = array(
                'cust_salutation' => $_POST['salutation'],
                'cust_first_name' => $_POST['fname'],
                'cust_last_name' => $_POST['lname'],
                'cust_email_id' => $_POST['email'],
                'cust_phone_no' => $_POST['phone'],
                'cust_addr' => $_POST['address'],
                'cust_city' => $_POST['city'],
                'cust_state' => $_POST['state'],
                'cust_pincode' => $_POST['pincode']
            );
            $condition = array('cust_id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            echo $update ? 'updated' : 'err';
        }
    }
	elseif ($_POST['action_type'] == 'delete') {
        if (!empty($_POST['id'])) {
            $condition = array('cust_id' => $_POST['id']);
            $delete = $db->delete($tblName, $condition);
            echo $delete ? 'ok' : 'err';
        }
    } elseif ($_POST['action_type'] == 'updateactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('cust_id' => $_POST['id']);
            $customer_status = array('cust_status' => 1);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } elseif ($_POST['action_type'] == 'updateinactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('cust_id' => $_POST['id']);
            $customer_status = array('cust_status' => 0);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } elseif ($_POST['action_type'] == 'singleview') {
        if (!empty($_POST['id'])) {
            $conditions['where'] = array('cust_id' => $_POST['id']);
            $conditions['return_type'] = 'singleview';
            $user = $db->getRows($tblName, $conditions);
            echo json_encode($user);
?>
            <?php

        }
    }
    exit;
}
            ?>