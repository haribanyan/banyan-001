<?php

     $customer_status = $_POST['customer_status'];

?><div class="ibox-body">
			
			 <table class="table table-responsive">
                <thead>
                    <tr>
                        <td><input id="select_all" type="checkbox" /></td>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
						<th>Email- Id</th>
						<th>Address</th>
						<th>City</th>
						<th>State</th>
						<th>Pincode</th>
                    </tr>
                </thead>
<?php
                    include '../config/DB.php';
                    $db = new DB();
					//$conn = mysqli_connect('localhost','root','','svt_erp');
                     //users = $db->getRows('tbl_customer', array('where' => 'customer_status=0'));
					 $conditions['where'] = array('customer_status' => $customer_status);
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
                        <td><?php echo $user['item_description']; ?></td>
                        <td><?php echo $user['item_unit']; ?></td>
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
			

       