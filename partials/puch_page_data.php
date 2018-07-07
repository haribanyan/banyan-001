<?php
include_once("dbconfig.php");
$per_page = 20;
if($_GET) {
	$page=$_GET['page'];
}
//$status=$_GET['status'];
//$status=1;
$start = ($page-1)*$per_page;

$sql = "SELECT * FROM tbl_purc_header join tbl_supplier on tbl_purc_header.vendor_id= tbl_supplier.supplier_id limit $start,$per_page";
$sqls="SELECT * FROM tbl_purc_header join tbl_supplier on tbl_purc_header.vendor_id= tbl_supplier.supplier_id ";

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
			   $bill_dt = $user['bill_dt'];

$due_dt = $user['due_dt'];
				?>	
					<tr id="<?php echo $user['purch_id']; ?>">
                                          
                                            <td style="widtrh:1px"><?php echo $user['supplier_cmpny_name']; ?></td>
                                            <td><?php echo $user['bill_no']; ?></td>
											
<td><?php echo date('d-m-y', strtotime($bill_dt)); ?></td>
<td><?php echo date('d-m-y', strtotime($due_dt)); ?></td>
<td><?php echo $user['grand_total']; ?></td>
											 <td><a href="javascript:void(0);" onclick="userAction('delete', '<?php echo $user['purch_id']; ?>')"><i class="far fa-trash-alt"></i>X</td>
                                            
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




