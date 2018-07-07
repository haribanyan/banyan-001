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
$sql = "select * from tbl_item limit $start,$per_page";
$sqls="select * from tbl_item ";
}
else
{
$sql = "select * from tbl_item where item_status= $status limit $start,$per_page";
$sqls="select * from tbl_item where item_status= $status";

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
					<tr id="<?php echo $user['item_id']; ?>">
                                        <td style="width:1px"><input id="<?php echo $user['item_id']; ?>" type="checkbox" onclick="emp();"  class="emp_checkbox"/></td>
                                        <td><a href="javascript:void(0);" onclick="viewuser('<?php echo $user['item_id']; ?>');$('#header').hide();$('#show1').hide();"><?php echo $user['item_name']; ?></td>
                                        <td><?php echo $user['units']; ?> <?php echo $user['item_unit']; ?></td>
						<td><?php echo $user['price']; ?></td>
                                        <td>
                                            <?php
                                            $userstat = $user['item_status'];
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
                                    for($i=1; $i<=$pages; $i++)
                                    {
                                    if($page==$i){	
									
                                    echo '<li style="padding:20px;cursor: pointer;color:red" id="'.$i.'" onclick="getval('.$i.')">'.$i.'</li>'; 
									}
									else{
									echo '<li style="padding:20px;cursor: pointer" id="'.$i.'" onclick="getval('.$i.')">'.$i.'</li>';
									}
                                    }
                                    ?>
                              </ul>
                           </div>




