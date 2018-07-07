<?php 
            include "dbconfig.php";
            $comp_name = $_POST['cname'];
            $mdir_name = $_POST['mname'];
			$lan1=$_POST['lan1'];
			$lan2 = $_POST['lan2'];
			$mob1=$_POST['mob1'];
			$mob2=$_POST['mob2'];
			$city=$_POST['city'];
			$state =$_POST['state'];
			$pincode =$_POST['pincode'];
			$desc =$_POST['state'];
			$gst =$_POST['gst'];
			
			$file_name = $_FILES['file']['name'];
            $temp_file_name = $_FILES['file']['tmp_name'];
		    $folder="../partials/images/".$file_name;
			
			// make file name in lower case
			$new_file_name = strtolower($file_name);
			
			$upload_folder ="$folder";
		
			$filepaths = move_uploaded_file($temp_file_name,$folder);
			
			echo $sql="insert into comp_info(comp_name,mdir_name,lan1,lan2,mob1,mob2,city,state,pincode,descr,logo_path,gst) values('$comp_name','$mdir_name','$lan1','$lan2','$mob1','$mob2','$city','$state','$pincode','$desc','$upload_folder','$gst')";
			
			$res=mysqli_query($conn,$sql);
			
			header('Location: ' . $_SERVER["HTTP_REFERER"] );
           exit;
			
?>