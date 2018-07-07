<?php

     $customer_status = $_POST['customer_status'];

?><div class="">
			<div id="tbl">
			 <table class="table table-responsive">
                <thead>
                    <tr>
                        <td><input id="select_all" type="checkbox" /></td>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
						<th>Email Id</th>
						<th>City</th>
						<th>State</th>
						  </tr>
                </thead>
<?php
                    include '../config/DB.php';
                    $db = new DB();
					//$conn = mysqli_connect('localhost','root','','svt_erp');
                     //users = $db->getRows('tbl_customer', array('where' => 'customer_status=0'));
					 $conditions['where'] = array('customer_status' => $customer_status);
       $tblName="tbl_customer";
        $users = $db->getRows($tblName, $conditions);
		//print_r($users);
					
                    if (!empty($users)): $count = 0;
                    foreach ($users as $user): $count++;
                    ?>
                <tbody id="userData">
                   
                    <tr id="<?php echo $user['customer_id']; ?>">
                        <td><input data-item-id="<?php echo $user['customer_id']; ?>" type="checkbox" class="emp_checkbox"/></td>
						
                        <td><a href="javascript:void(0);" onclick="viewuser('<?php echo $user['customer_id']; ?>')"><?php echo $user['customer_first_name'];?></td>
                        <td><?php echo $user['customer_last_name']; ?></td>
                        <td><?php echo $user['customer_phone_no']; ?></td>
						<td><?php echo $user['customer_emailid']; ?></td>
						<td><?php echo $user['customer_addressline1']; ?></td>
						<td><?php echo $user['customer_city']; ?></td>
						<td><?php echo $user['customer_state']; ?></td>
						<td><?php echo $user['customer_pincode']; ?></td>
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
			</div>

       