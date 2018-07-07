
<div class="ibox-body" style="height:500px; overflow: auto;width:1000px ">
<?php
include "dbconfig.php";
 $sql='';
if(isset($_POST['bdate']) && !empty($_POST['bdate'])){
	$bdate=$_POST['bdate'];
	 $newdate1 = date("Y-m-d", strtotime($bdate));
     $sql="SELECT * FROM tbl_purc_header join tbl_supplier on tbl_purc_header.vendor_id= tbl_supplier.supplier_id where tbl_purc_header.bill_dt='$newdate1'";
	
}
elseif(isset($_POST['ddate']) && !empty($_POST['ddate'])){
	$ddate=$_POST['ddate'];
    $newdate2 = date("Y-m-d", strtotime($ddate));
	   $sql="SELECT * FROM tbl_purc_header join tbl_supplier on tbl_purc_header.vendor_id= tbl_supplier.supplier_id where tbl_purc_header.due_dt='$newdate2'";
}
else{
		   $sql="SELECT * FROM tbl_purc_header join tbl_supplier on tbl_purc_header.vendor_id= tbl_supplier.supplier_id ";

}
$res=mysqli_query($conn,$sql);
$tot=mysqli_num_rows($res);

?>

<table class="table">
<thead>
<?php
if($tot>0){
?> <th>Vendor Name</th>
    <th>Bill Number</th>
    <th>Bill Date</th>
    <th>Due Date</th>
     <th>Total Amount</th>
	</thead>
<?php

while ($rows = mysqli_fetch_assoc($res))
    {?>
<tr id="<?php echo $rows['purch_id']; ?>">
<td><?php echo $rows['supplier_cmpny_name']; ?></td>
<td><?php echo $rows['bill_no']; ?></td>
<td><?php echo date('d-m-y', strtotime($rows['bill_dt'])); ?></td>
<td><?php echo date('d-m-y', strtotime($rows['due_dt'])); ?></td>
<td><?php echo $rows['grand_total']; ?></td>
 <td><a href="javascript:void(0);" onclick="userAction('delete', '<?php echo $user['purch_id']; ?>')"><i class="far fa-trash-alt"></i>X</td>
                                    </tr>
    <?php
	}
}
else{
	 echo "<div style='text-align:center;font-size:18px'>".'Sorry,No Records Found'."</div>";
}	
 ?>
 </table>
 </div>
 
