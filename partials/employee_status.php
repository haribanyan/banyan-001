<?php

     $emp_status = $_POST['emp_status'];

?>
			 <table class="table table-responsive">
                <thead>
                    <tr>
                          <td><input id="select_all" type="checkbox" /></td>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
						<th>Email- Id</th>
						<th>Address</th>
						<th>Salary</th>
						<th>Salary Type</th>
                    </tr>
                </thead>
<?php
                    include '../config/DB.php';
                    $db = new DB();
					
					 $conditions['where'] = array('status' => $emp_status);
       $tblName="tbl_emp";
        $users = $db->getRows($tblName, $conditions);
		//print_r($users);
					
                    if (!empty($users)): $count = 0;
                    foreach ($users as $user): $count++;
                    ?>
                <tbody id="userData">
                   
                     <tr id="<?php echo $user['emp_id']; ?>">
                        <td><input data-item-id="<?php echo $user['emp_id']; ?>" type="checkbox" class="emp_checkbox"/></td>
						
                        <td><a href="javascript:void(0);" onclick="viewuser('<?php echo $user['emp_id']; ?>')"><?php echo $user['emp_first_name'];?></td>
                        <td><?php echo $user['emp_last_name']; ?></td>
                        <td><?php echo $user['emp_phoneno']; ?></td>
						<td><?php echo $user['emp_email']; ?></td>
						<td><?php echo $user['emp_address']; ?></td>
						<td><?php echo $user['emp_salary']; ?></td>
						<td><?php echo $user['emp_salary_type']; ?></td>
					
                    </tr>
                    <?php
                    endforeach;
                    else:
                    ?>
                    <tr><td colspan="5">No user(s) found......</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
			<div id="tbl-active"></div>
			

       