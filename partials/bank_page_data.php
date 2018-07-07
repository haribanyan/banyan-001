<?php
include_once("dbconfig.php");
$per_page = 20;
if($_GET) {
	$page=$_GET['page'];
}
//$status=$_GET['status'];
//$status=1;
$start = ($page-1)*$per_page;

$sql = "select tbl_bnk.bnk_accname,trns_type,trns_amnt,trns_frm,trns_date from tbl_trns join tbl_bnk on tbl_bnk.bnk_id=tbl_trns.trnsacc_name  limit $start,$per_page";
$sqls="select tbl_bnk.bnk_accname,trns_type,trns_amnt,trns_frm,trns_date from tbl_trns join tbl_bnk on tbl_bnk.bnk_id=tbl_trns.trnsacc_name ";

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
					<tr>
      <td style="width:1px"><?php echo $user['bnk_accname']?></td>
	  <td><?php echo $user['trns_type']?></td>
	  <td><?php echo $user['trns_frm'] ?></td>
	  <td><?php echo $user['trns_date'] ?></td>
	  <td><?php echo $user['trns_amnt']?></td>
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




