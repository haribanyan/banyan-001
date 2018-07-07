<?php

include '../config/DB.php';
include 'dbconfig.php';
$db = new DB();
$tblName = 'tbl_emp';
if (isset($_POST['action_type']) && !empty($_POST['action_type'])) {
    if ($_POST['action_type'] == 'data') {
        $conditions['where'] = array('emp_id' => $_POST['id']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName, $conditions);
        echo json_encode($user);
    } elseif ($_POST['action_type'] == 'view') {
        $users = $db->getRows($tblName, array('order_by' => 'emp_id DESC'));
        if (!empty($users)) {
            $count = 0;
            foreach ($users as $user): $count++;
                $cid = $user['emp_id'];
                echo '<tr>';
                echo '<td><input id=' . $cid . ' type="checkbox" onclick="emp();" class="emp_checkbox"/></td>';
                echo '<td>';
                echo '<a href="javascript:void(0);" onclick="viewuser(' . $cid . ')">' . $user['emp_first_name'] . '</td>';
                echo '<td>' . $user['emp_last_name'] . '</td>';
echo '<td>' . $user['emp_phoneno'] . '</td>';
                echo '<td>' . $user['emp_email'] . '</td>';
                echo '<td>' . $user['emp_designation'] . '</td>';

                echo '<td>';
                $userstat = $user['status'];
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
    }  elseif ($_POST['action_type'] == 'attendance') {

        $date = $_POST['date'];
	  


        $tblName = 'tbl_emp_att';


        $conditions['where'] = array('att_date' => $date);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName, $conditions);
			
		if (!empty($user)) {
            $absent_list = $user['absent_list'];

            $tblName = 'tbl_emp';
            $conditions['where'] = array('order_by' => 'emp_id');
            $users = $db->getRows($tblName);

            if (!empty($users)) {
                $count = 0;
				
                foreach ($users as $user): $count++;
                    $uid = $user['emp_id'];
					
                   /*  $sql = mysqli_query($con, "select * from  tbl_emp_att where find_in_set('$uid',`absent_list`) and `att_date`='$date'"); */
				  $sql = mysqli_query($conn,"SELECT * FROM sakthi.tbl_emp_att where find_in_set('$uid',`absent_list`) and `att_date`='$date' order by 1 desc limit 1"); 
                  $count = mysqli_num_rows($sql);
  $sqls = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_emp_att where  `absent_list`='0' and `att_date`='$date' order by 1 desc limit 1")); 
  $counts=$sqls;
  
	  $disabled='';
					if ($count > 0) {
                        $checked = "Checked";
                        $att = "Absent";
                    } else {
                        $checked = "";

                        $att = "Present";
                    }
                    $id = $user['emp_id'];
                    if ($att == "Absent") {
                        echo '<tr style="color:#ff0000">';
                    } else {
                        echo '<tr >';
                    }
			if($counts>0){
				$disabled='disabled';
				$checked='';
				$att='';
			}
			
                    echo '<td>' . $user['emp_first_name'] . '</td>';
                    echo '<td><input onclick="emp();"  '.$disabled.' type="checkbox" ' . $checked . ' class="emp_checkboxs" data-item-id=' . $id . '></td>';
                    echo '<td>' . $att . '</td>';



                    echo '</tr>';



                endforeach;
            } else {
                echo '<tr><td colspan="5">No user(s) found......</td></tr>';
            }
        }
        }elseif ($_POST['action_type'] == 'holiday') {

        $date = $_POST['date'];
	  
  $sql = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_emp_att where  `absent_list`='0' and `att_date`='$date' order by 1 desc limit 1")); 
  $count=$sql;

     if ($count > 0) {
                       echo "1";
                    } 
        
    }elseif ($_POST['action_type'] == 'updateactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('emp_id' => $_POST['id']);
            $customer_status = array('status' => 1);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } elseif ($_POST['action_type'] == 'updateinactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('emp_id' => $_POST['id']);
            $customer_status = array('status' => 0);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } elseif ($_POST['action_type'] == 'add') {
        $userData = array(
            'emp_first_name' => $_POST['fname'],
            'emp_last_name' => $_POST['lname'],
            'emp_email' => $_POST['email'],
            'emp_phoneno' => $_POST['phone'],
            'emp_address' => $_POST['address'],
'emp_city' => $_POST['city'],
'emp_state' => $_POST['state'],
'emp_pincode' => $_POST['pincode'],
            'emp_doj' => $_POST['doj'],
            'emp_gender' => $_POST['gender'],
            'emp_type' => $_POST['labourtype'],
            'emp_designation' => $_POST['designation'],
        );
		
        $insert = $db->insert($tblName, $userData);
        echo $insert ? 'ok' : 'err';
    } elseif ($_POST['action_type'] == 'multy') {
        
        include_once("dbconfig.php");
$per_page = 5;
if($_POST) {
	$page=$_POST['page'];
}
$start = ($page-1)*$per_page;
$sql = "select * from tbl_emp where status='".$_POST['emp_status']."' limit $start,$per_page";
$result = mysqli_query($conn, $sql);
$i = 1;
                while($user=mysqli_fetch_assoc($result))
         {
           
                $cid = $user['emp_id'];
                echo '<tr>';
                echo '<td><input id=' . $cid . ' type="checkbox" onclick="emp();" class="emp_checkbox"/></td>';
                echo '<td>';
                echo '<a href="javascript:void(0);" onclick="viewuser(' . $cid . ')">' . $user['emp_first_name'] . '</td>';
                echo '<td>' . $user['emp_last_name'] . '</td>';
echo '<td>' . $user['emp_phoneno'] . '</td>';
                echo '<td>' . $user['emp_email'] . '</td>';
                echo '<td>' . $user['emp_designation'] . '</td>';

                echo '<td>';
                $userstat = $user['status'];
                if ($userstat > 0) {
                    echo"Active";
                } else {
                    echo"Inactive";
                }
                echo '</td>';
                echo '</tr>';
           
        } 
echo ($i % 3 == 0) ? '<br />' : '';
              $i++;	
    } elseif ($_POST['action_type'] == 'edit') {
        if (!empty($_POST['id'])) {
            $userData = array(
                'emp_first_name' => $_POST['fname'],
                'emp_last_name' => $_POST['lname'],
                'emp_email' => $_POST['email'],
                'emp_phoneno' => $_POST['phone'],
                'emp_address' => $_POST['address'],
'emp_city' => $_POST['city'],
'emp_state' => $_POST['state'],
'emp_pincode' => $_POST['pincode'],
                           'emp_doj' => $_POST['doj'],
            'emp_gender' => $_POST['gender'],
            'emp_type' => $_POST['labourtype'],
            'emp_designation' => $_POST['designation'],
            );
            $condition = array('emp_id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            echo $update ? 'updated' : 'err';
        }
    } 
elseif($_POST['action_type'] == 'phone') {
include"dbconfig.php";
$sql = "select * from `tbl_emp` where emp_phoneno = '".$_POST['phone']."'";
$res = mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($res);
if($rowcount>0) {
echo $res ? 'phone' : 'err'; 
}

}
elseif ($_POST['action_type'] == 'updateactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('emp_id' => $_POST['id']);
            $customer_status = array('status' => 1);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } elseif ($_POST['action_type'] == 'updateinactive') {
        if (!empty($_POST['id'])) {
            $conditions = array('emp_id' => $_POST['id']);
            $customer_status = array('status' => 0);
            $user = $db->update($tblName, $customer_status, $conditions);
            echo $user ? 'update' : 'err';
        }
    } elseif ($_POST['action_type'] == 'delete') {
        if (!empty($_POST['id'])) {
            $condition = array('emp_id' => $_POST['id']);
            $delete = $db->delete($tblName, $condition);
            echo $delete ? 'ok' : 'err';
        }
    } elseif ($_POST['action_type'] == 'singleview') {
        if (!empty($_POST['id'])) {
            $conditions['where'] = array('emp_id' => $_POST['id']);
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