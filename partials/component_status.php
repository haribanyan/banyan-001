<?php

     $item_status = $_POST['item_status'];

?><div class="">
			
			 <table class="table table-responsive">
                <thead>
                    <tr>
                        <td><input id="select_all" type="checkbox" /></td>
                        <th>Name</th>
                        <th>Unit</th>
						<th>Price</th>
                    </tr>
                </thead>
<?php
                    include '../config/DB.php';
                    $db = new DB();
					//$conn = mysqli_connect('localhost','root','','svt_erp');
                     //users = $db->getRows('tbl_customer', array('where' => 'customer_status=0'));
					 $conditions['where'] = array('item_status' => $item_status);
       $tblName="tbl_item";
        $users = $db->getRows($tblName, $conditions);
		//print_r($users);
					
                    if (!empty($users)): $count = 0;
                    foreach ($users as $user): $count++;
                    ?>
                <tbody id="userData">
                    <tr id="<?php echo $user['item_id']; ?>">
                        <td><input data-item-id="<?php echo $user['item_id']; ?>" type="checkbox" class="emp_checkbox"/></td>
                        <td><a href="javascript:void(0);" onclick="viewuser('<?php echo $user['item_id']; ?>')"><?php echo $user['item_name']; ?></a></td>
                        <td><?php echo $user['units']; ?> <?php echo $user['item_unit']; ?> </td>
						<td><?php echo $user['price']; ?></td>
                    </tr>
                    <?php
                    endforeach;
                    else:
                    ?>
                    <tr><td colspan="5">No user(s) found......</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
			</div>
			

       