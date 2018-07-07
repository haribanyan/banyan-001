<?php

include '../config/DB.php';
$db = new DB();
$tblName = 'tbl_item';
if (isset($_POST['item_id']) && !empty($_POST['item_id'])) {
	     //$conditions = array('id' => $_POST['item_id']);
	    $conditions = array('item_id' => $_POST['item_id']);
		print_r($conditions);
		$item_status=array('item_status'=>1);
        $user = $db->update($tblName,$item_status,$conditions);
		print_r($user);
}
?>
 <table class="table table-responsive" id="load-content">
                <thead>
                    <tr>
                        <td><input id="select_all" type="checkbox" /></td>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>UNIT</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php
                    include '../config/DB.php';
                    $db = new DB();
                    $users = $db->getRows('tbl_item', array('where' => 'item_status=1'));
                    if (!empty($users)): $count = 0;
                    foreach ($users as $user): $count++;
                    ?>
                    <tr id="<?php echo $user['item_id']; ?>">
                        <td><input data-item-id="<?php echo $user['item_id']; ?>" type="checkbox" class="emp_checkbox"/></td>
                        <td><a href="javascript:void(0);" onclick="viewuser('<?php echo $user['item_id']; ?>')"><?php echo $user['item_name']; ?></a></td>
                        <td><?php echo $user['item_description']; ?></td>
                        <td><?php echo $user['item_unit']; ?></td>
                    </tr>
                    <?php
                    endforeach;
                    else:
                    ?>
                    <tr><td colspan="5">No user(s) found......</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>