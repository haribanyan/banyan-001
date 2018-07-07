<?php
include_once("dbconfig.php");
$per_page = 20;
if($_GET) {
	$page=$_GET['page'];
}
$status=$_GET['status'];
//$status=1;
$start = ($page-1)*$per_page;

if($status==""){
$sql = "select * from tbl_emp limit $start,$per_page";
$sqls="select * from tbl_emp ";
}
else
{
$sql = "select * from tbl_emp where status= $status limit $start,$per_page";
$sqls="select * from tbl_emp where status= $status";

}
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$results = mysqli_query($conn, $sqls);
$counts = mysqli_num_rows($results);
 $pages = ceil($counts/$per_page)
?>
<div class="gallery gallery-isotope" id="gallery">
                <?php
				$i = 1;
                while($user=mysqli_fetch_assoc($result))
                {
			   
				?>	
					<tr id="<?php echo $user['emp_id']; ?>">
                                        <td><input id="<?php echo $user['emp_id']; ?>" type="checkbox" onclick="emp();"  class="emp_checkbox"/></td>
                                        <td><a href="javascript:void(0);" onclick="viewuser('<?php echo $user['emp_id']; ?>');$('#header').hide();$('#show1').hide();"><?php echo $user['emp_first_name']; ?></td>
                                        <td><?php echo $user['emp_last_name']; ?></td>
                                        <td><?php echo $user['emp_phoneno']; ?></td>
                                        <td><?php echo $user['emp_email']; ?></td>
                                        <!--<td><?php //echo $user['emp_address']; ?></td>-->
                                        <td><?php echo $user['emp_designation']; ?></td>
                                        <td>
                                            <?php
                                            $userstat = $user['status'];
                                            if ($userstat > 0) {
                                                echo "Active";
                                            } else {
                                                echo "Inactive";
                                            }
                                            ?>
                                        </td>
                                    </tr>
				
            <?php			  
        }
		echo ($i % 3 == 0) ? '<br />' : '';
              $i++;	
              ?>	
			  </div>
<div id="pagination">
                              <ul class="pagination">
                                 <?php
                                    //Pagination Numbers
									//echo '<li><a style="cursor: pointer;" onclick="getval('.($page-1).')" id="'.($page-1).'" >Previous</a></li>'; 
                                    for($i=1; $i<=$pages; $i++)
                                    {
                                    if($page==$i){	
									
                                    echo '<li style="padding:20px;cursor: pointer;color:red" id="'.$i.'" onclick="getval('.$i.')">'.$i.'</li>'; 
									}
									else{
									echo '<li style="padding:20px;cursor: pointer" id="'.$i.'" onclick="getval('.$i.')">'.$i.'</li>';
									}
                                    }
									//echo '<li><a style="cursor: pointer;" onclick="getval('.($page+1).')" id="'.($page+1).'" >next</a></li>'; 
                                    ?>
                              </ul>
                           </div>




