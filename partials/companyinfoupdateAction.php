<?php 
            include "dbconfig.php";
			$comp_id = $_POST['comp_id'];
            $comp_name = $_POST['cname'];
            $mdir_name = $_POST['mname'];
			$lan1=$_POST['lan1'];
			$lan2 = $_POST['lan2'];
			$mob1=$_POST['mob1'];
			$mob2=$_POST['mob2'];
			$addr=$_POST['addr'];
			$city=$_POST['city'];
			$state =$_POST['state'];
			$pincode =$_POST['pincode'];
			$desc =$_POST['desc'];
			 
			 $sql="update  comp_info set comp_name='$comp_name' ,mdir_name='$mdir_name',lan1='$lan1',lan2='$lan2',mob1='$mob1',mob2='$mob2',addr='$addr',city='$city',state='$state',pincode='$pincode',descr='$desc' where comp_id='$comp_id'";
			
			$res=mysqli_query($conn,$sql);
			
			header('Location: ' . $_SERVER["HTTP_REFERER"] );
            exit;
			
?>