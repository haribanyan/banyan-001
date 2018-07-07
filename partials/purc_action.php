
<?php
include "dbconfig.php";
if(isset($_POST['prod_name']) && !empty($_POST['prod_name'])){
	$prod_id=$_POST['prod_name'];
	$query="select price from tbl_item where item_id='$prod_id'";
	$res=mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_assoc($res)){
		$data=$row;
	}
	echo json_encode($data);
}
elseif(isset($_POST['action_type']) && !empty($_POST['action_type'])){
	if ($_POST['action_type'] == 'delete') {
		$id=$_POST['id'];
		$sql1="select * from tbl_purc_header join purc_detail on tbl_purc_header.purch_id= purc_detail.purc_id where purc_id='$id'";
		$res1=mysqli_query($conn,$sql1);
		while($row=mysqli_fetch_assoc($res1)){
			$comp_id=$row['comp_id'];
			$purc_qty=$row['purc_qty'];
			$sql_up = "UPDATE `tbl_item` SET `current_stock`=`current_stock`-'" . $purc_qty. "' WHERE `item_id` ='" . $comp_id . "'";
			$res3=mysqli_query($conn,$sql_up);
		}
		$sql2="delete from tbl_purc_header where purch_id='$id'";
		$sql3="delete from purc_detail where purc_dtl_id='$id'";
		$res2=mysqli_query($conn,$sql2);
		$res4=mysqli_query($conn,$sql3);
		if($res4){
			echo 'deleted';
		}
	}

else if($_POST['action_type'] == 'add'){
$vr_idk = $_POST['vendor'];

$bl_no = $_POST['bill'];

$bill_dte = $_POST['bill_date'];
$bl_dte=date("Y-m-d", strtotime($bill_dte));

$due_dte = $_POST['due_date'];
$du_dte =date("Y-m-d", strtotime($due_dte));

$su_tl = $_POST['sub_totals'];

$gst_tl = $_POST['gst_totals'];
if(isset($_POST['discount_total']) && !empty($_POST['discount_total'])){
	$dic_tl = $_POST['discount_total'];

}else{
	$dic_tl =0;
}
$grd_tl = $_POST['grand_totalss'];

$purc_id = $_POST['item'];

$purc_qty = $_POST['quant'];

$purc_prc = $_POST['amount'];

$purc_gst = $_POST['gst'];



 $sql = "INSERT INTO `tbl_purc_header`(`vendor_id`, `bill_no`, `bill_dt`, `due_dt`, `sub_total`, `gst_total`, `dic_total`, `grand_total`) VALUES ('$vr_idk','$bl_no','$bl_dte','$du_dte','$su_tl','$gst_tl','$dic_tl','$grd_tl')";

$run = mysqli_query($conn, $sql);

$lid = mysqli_insert_id($conn);

$i = 0;

foreach ($purc_id as $id) {

    $sql_pi = "INSERT INTO `purc_detail`(`comp_id`, `purc_id`, `purc_qty`, `purc_price`, `purc_gst`) VALUES ('$lid','$id','" . $purc_qty[$i] . "','" . $purc_prc[$i] . "','" . $purc_gst[$i] . "')";

    $run_pi = mysqli_query($conn, $sql_pi);

    $sql_up = "UPDATE `tbl_item` SET `current_stock`=`current_stock`+'" . $purc_qty[$i] . "' WHERE `item_id` ='" . $id . "'";
    $run_up = mysqli_query($conn, $sql_up);

}

if ($run) {

    echo"inserted";
  
 } 
  }
}
?>
 
