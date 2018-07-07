<!-- START PAGE CONTENT--><?php include"dbconfig.php"; ?>
<style>
.frmSearch {margin: 2px 0px;padding:10px;border-radius:4px;}
#country-list{list-style:none;margin-top:px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<div class="page-content fade-in-up">
   
    <div class="ibox none" id="addForm">
        <div class="ibox-head">
            <div class="ibox-title">Add Godown Keeper</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm1" method="post" novalidate="novalidate">
                <div class="ibox-body control-group" >
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">First Name *</label>
                         <div class="col-sm-6">
                                            <input class="form-control" type="text" name="fname" style="font-family: Poppins"  placeholder="First Name">
										</div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="lname" style="font-family: Poppins" placeholder="Last name">
																
                                        </div>
                                    </div>
									                                   							
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mobile *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="alphn"type="text" style="font-family: Poppins" name="mob" placeholder="Mobile" maxlength="10">
										</div>
                                    </div>
									
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alternate Mobile</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="pone"type="text" style="font-family: Poppins" name="mob2" placeholder="Alternate Mobile" maxlength="10">
										</div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="email" style="font-family: Poppins" name="email" placeholder="Email ID">
										</div>
                                    </div>
									 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Select District *</label>
                    <div class="col-sm-6">
					
					<select style="width:100%; font-family:poppins" onchange="checkDist(this.value);" class=" form-control border-primary" name="seldist" id="seldist" >
     <?php include '../config/DB.php'; $db    = new DB();$conditions['where'] = array('dist_status' =>1);
        $users = $db->getRows('dist', $conditions);?>
                                  <option value="">-Select-</option>
                             <?php foreach ($users as $user) {?>     
                                  <option value="<?php echo $user['dist_id'];?>"><?php echo $user['dist_name'];?></option>
                                  <?php }?>
                                </select>
                    </div>
                </div>
				<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address *</label>
                                        <div class="col-sm-6">
                                            <!--<input class="form-control" type="textarea" style="font-family: Poppins" name="add" placeholder="Address">-->
											<textarea rows="2" cols="35" style="width:560px;border-color: rgba(0, 0, 0, .1);font-family: Poppins" name="addr" placeholder="    Address" ></textarea>
										</div>
                                    </div>
									
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">City *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" style="font-family: Poppins" name="city" placeholder="City">
										</div>
                                    </div>
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">State *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="state" style="font-family: Poppins" placeholder="State">
										</div>
                                    </div>
									  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pincode *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="pincode" id="pincode" style="font-family: Poppins" placeholder="Pincode" maxlength="6">
									    </div>
                                    </div>
									
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Salary *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id= "sal"type="text" name="sal" style="font-family: Poppins" placeholder="Salary">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Aadhar Number</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="aanum"id="aanum" maxlength="12" style="font-family: Poppins">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pan Card Number</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="pannum" maxlength="10" style="font-family: Poppins">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of Joining</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="date" name="jdate" style="font-family: Poppins">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Upload Photo</label>
                                        <div class="col-sm-6">
                                            <input id="fileUpload" name="file" type="file"/> 
                                            </div>
											
											<div class="col-sm-6">
											<div style="margin-left:0px" id="image-holder"></div></div>
											<div class="col-sm-6"></div>
                                    </div>
									<div class="col-md-5">
                  <div class="form-group">
                     <h5>Add Bank Details</h5>
                  </div>
               </div>
			    <div id="show_details" name="show_details" -style="display:none;">
                  <div class="form-group mb-4 row">
                     <table class="table table-bordered">
                        <thead class="thead-default">
                           <tr>
                              <th>Bank name</th>
                              <th>Branch name</th>
							  <th>Account Type</th>
							  <th>Account Number</th>
							  <th>Account Name</th>
							  <th>IFSC</th>
                           </tr>
                        </thead>
                        <tbody id="scents">
                           <tr scope="row">
						   <td>
                                 <input  type="text" name="bname[]" id="bname0"  class="required form-control">
                              </td>
							  <td>
                                 <input  type="text" name="brname[]" id="brname0"  class="required form-control">
                              </td>
							  <td style="width:200px">
                                 <select  class="select4 form-control border-primary" name="actype[]" id="actype0">
								 <option value="">--Select--</option>
								 <option value="saving">Savings</option>
								 <option value="current">Current</option>
	                                  </select>
                              </td>
							  <td>
                                 <input  type="text" name="acnum[]" maxlength="16" id="acnum0"  class="required form-control">
                              </td>
							  <td>
                                 <input  type="text" name="acname[]" id="acname0"  class="required form-control">
                              </td>
                              
                              <td>
                                 <input  type="text" name="ifsc[]" id="ifsc0"  class="required form-control">
                              </td>
                              <td class="actions" style="border-color: white;">
                                 <a href="javascript:void(0);" id="addScnt" style="margin-top:20px">
                                 <i class="ti-plus"></i>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="clear"></div>
                  
            </div> <div class="col-md-6 pull-right">
                     <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput2">&nbsp;</label>
                        <div class="col-md-8 pull-right">
                              <a href="javascript:void(0);"class="btn btn-warning" onclick="$('#addForm').hide();$('#show1').show();$('#tbl').show();">Back</a>
							   <button  class="btn btn-primary"style="margin-right:20px" >Add Godown Keeper</button>
                                                       
                        </div>
                     </div>
            
            </div>
                    			
                </div>
            </form>
        </div>
    </div>
    <div class="ibox none" id="display">
        <div class="ibox-head">
            <div id="customer-id" class="ibox-title"><h4><b><span><p id="sales-rep-name">  </p></span></b></h4></div>
            <div style="float:right;">
                <input type="hidden" name="keeper-id" value="" id="keeper-id">
				 <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#display').hide();$('#tbl').show();">Back</a>
                <a href="javascript:void(0);" id="keeper-id" class="btn btn-primary"style="margin-right:10px"  onclick="editUser(document.getElementById('keeper-id').value)">Edit</a>
               <span id="res_btn">
                    <a href="javascript:void(0);" class="btn btn-primary" style="background-color:#2cc4cb;border-color:#2cc4cb;margin-right:10px" onclick="return confirm('Are you sure to update data?') ? userAction('updateinactive', document.getElementById('keeper-id').value) : false;">Resign</a>
                </span> 
                <span id="join_btn">
                   <input type="button" value="Resign" class="btn btn-primary" disabled>
                </span>
            </div>
        </div>
        <div class="ibox-head" style="border:0px">
            <div class="ibox-title"><p style="border-bottom:3px solid #007bff;margin-bottom:-23px">Overview</p></div>
        </div>
        <div class="ibox-body">
            <div class="rickshaw_graph" id="rickshaw_scatterplot">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-12">
                                </div>
                        </div>
                        		<table >
       <tbody>   <tr><td><h5 style="font-family: Poppins;font-size:15px;">Mobile Number</h5></td><td> : </td><td id="sales-rep-mob" style="font-family: Poppins;font-size:16px;"></td></tr>
       <tr><td><h5 style="font-family: Poppins;font-size:15px;">Alternate Mobile</h5></td><td> : </td><td id="sales-rep-alter" style="font-family: Poppins;font-size:16px;"></td></tr>
    
       <tr><td><h5 style="font-family: Poppins;font-size:15px">Aadhar</h5><td> : </td></td><td id="sales-rep-aadhar" style="font-family: Poppins;font-size:16px"></td></tr>
	   
		  <tr><td><h5 style="font-family: Poppins;font-size:15px">Resign Date</h5><td> : </td></td><td id="rep-rdate" style="font-family: Poppins;font-size:16px"></td></tr>   <tr><td><h5 style="font-family: Poppins;font-size:15px">DOJ</h5></td><td> : </td><td id="sales-rep-doj" style="font-family: Poppins;font-size:16px"></td></tr> <tr><td><h5 style="font-family: Poppins;font-size:15px">PAN Number</h5><td> : </td></td><td id="sales-rep-pan" style="font-family: Poppins;font-size:16px"></td></tr>
       </tbody>
       </table>
					
					
					<h5 style="border-bottom:1px solid #eee;">Address</h5>
					<table><tr><td id="sales-rep-Address"> </td></tr></table>
					<table><tr><td id="sales-rep-det"> </td></tr></table>
					<table><tr><td id="sales-rep-state"> </td></tr></table>
					<table><tr><td id="sales-rep-pincode"> </td></tr></table>
					

					  
                    </div>
					<table class="table table-bordered">
						<thead>
						<th>Bank Name</th>
						<th>Branch Name</th>
						<th>Account Type</th>
						<th>Account Number</th>
						<th>Account Name</th>
						<th>IFSC</th>
						</thead>
						<tbody id="dis-bank-det">
						<tbody>
                       </table>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox none" id="editForm">
        <div class="ibox-head">
            <div class="ibox-title">Edit Godown Keeper</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm2" method="post" novalidate="novalidate">
                <div class="ibox-body control-group" >
                    <input type="hidden" value="" name="id" id="Editid">
                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Name *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" id="Editfname" name="fname" style="font-family: Poppins"  placeholder="First Name">
										</div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" id="Editlname" name="lname" style="font-family: Poppins" placeholder="Last name">
																
                                        </div>
                                    </div>
									                                   							
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mobile *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="number" style="font-family: Poppins" id="Editmob" name="mob" placeholder="Mobile" maxlength="10" >
										</div>
                                    </div>
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alternate Mobile *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" style="font-family: Poppins" id="Editalmob" name="mob2" placeholder=" Alternate Mobile" maxlength="10" >
										</div>
                                    </div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">DOJ</label>
										<div class="col-sm-6">
										   <input class="form-control" id="Editdoj" type="text" style="font-family: Poppins" name="jdate" placeholder="DOJ">
										</div>
									</div>
									
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="email" style="font-family: Poppins" id="Editemail" name="email" placeholder="Email ID">
										</div>
                                    </div>
									
									<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Select District</label>
                    <div class="col-sm-6">
					
					<select style="width:100%;" class="select2 form-control border-primary" name="seldist" onchange="checkDist(this.value);" id="Editseldist" >
     <?php $users = $db->getRows('dist', array('order_by' => 'created_on '));?>
                                  <option value="">-Select-</option>
                             <?php foreach ($users as $user) {?>     
                                  <option value="<?php echo $user['dist_id'];?>"><?php echo $user['dist_name'];?></option>
                                  <?php }?>
                                </select>
                    </div>
                </div>
					<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Aadhar Number *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="aanum" type="text" style="font-family: Poppins" id="Editaanum" placeholder="Aadhar" maxlength="12">
										</div>
                                    </div>
									
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pan Card Number *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" style="font-family: Poppins" name="pannum" id="Editpan" placeholder="PAN" maxlength="10">
										</div>
                                    </div>
									
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address *</label>
                                        <div class="col-sm-6">
                                            <!--<input class="form-control" type="textarea" style="font-family: Poppins" id="eadd" name="add" placeholder="Address">-->
											<textarea rows="2" cols="35" style="width:560px;border-color: rgba(0, 0, 0, .1);font-family: Poppins" id="Editaddr" name="addr" placeholder="    Address" ></textarea>
										</div>
                                    </div>
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">City *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" style="font-family: Poppins" id="Editcity" name="city" placeholder="City">
										</div>
                                    </div>
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">State *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" id="Editstate" name="state" style="font-family: Poppins" placeholder="State">
										</div>
                                    </div>
									 
									  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pincode *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" id="Editpincode" name="pincode" style="font-family: Poppins" placeholder="Pincode" maxlength="6">
									    </div>
                                    </div>
									
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Salary *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" id="Editsal" name="sal" style="font-family: Poppins" placeholder="Salary">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of Resigning</label>
                                        <div class="col-sm-6">
                                            <input id="Editrdate" class="form-control" type="date" name="rdate" style="font-family: Poppins">
									    </div>
                                    </div>
														<div class="col-md-8">
                  <div class="form-group">
                     <h5><b>Add Bank Details</b></h5>
                  </div>
               </div>
			   <div id="show_details" name="show_details" -style="display:none;">
                  <div class="form-group mb-4 row">
                     <table class="table table-bordered">
                        <thead  class="thead-default">
                           <tr>
                              <th>Bank Name</th>
                              <th>Branch</th>
							  <th>Account Type</th>
                              <th>Account Number</th>
							  <th>Account Name</th>
                              <th>IFSC</th>
                           </tr>
                        </thead>
                        <tbody id="view_table">
                           
                        </tbody>
                     </table>
                  </div>
                  <div class="clear"></div>
                  <table class="table table-bordered" cellpadding="0" cellspacing="0" border="1" >
                     <tbody id="mytable">
                     </tbody>
                  </table>
                  
            </div>  <div class="col-md-6 pull-right">
                     <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput2">&nbsp;</label>
                        <div class="col-md-8 pull-right">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="viewuser( document.getElementById('Editid').value);$('#editForm').hide();" >Back</a>
                            <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('edit');">Update Godown Keeper</a>                               
                        </div>
                     </div>
            
            </div>
                    				
                </div>
            </form>
        </div>
    </div>
	
    <div class="col-md-12">
        <div id="tbl">
            <div class="ibox ibox-fullheight">
               
                    <div class="ibox-head">
                        <div class="ibox-title">
                            <select style="font-family: Poppins" id="keeper_status">
                                <option value="1">Active GodownKeepers</option>
                               <option value="0">Resigned GodownKeepers</option>
                            </select>
                            <span><input type="text" id="myInput" style="margin-left:15px;font-family:Poppins; width:300px " onkeyup="myFunction()" placeholder="Name, District, Mobile.." title="Type in a name"></span>
                        </div>
                        <div style="float:right ">
                          <span><a href="javascript:void(0);" class="btn btn-primary" onclick="$('#addForm').show();$('#tbl').hide();">+ NEW</a></span></div>                
                    </div>
                           <table class="table table" id="emp_tbl">
                            <thead>
                                <tr>
                                  
                                    <th>First Name</th>
									<th>District</th>
                                    <th>Email</th>
									<th>Mobile</th>
									<th>City</th>
									<th>Status</th>
									
									
                                </tr>
                            </thead>
                              <tbody id="userData">
                    <?php
                   include "dbconfig.php";
				   $sql="select keeper_id,keeper_fname,keeper_email,keeper_mob,keeper_city,
keeper_status,dist.dist_name from gkeeper join dist on gkeeper.keeper_al_dist=dist.dist_id where keeper_status=1";
				   $users=mysqli_query($conn,$sql);
                   if (!empty($users)): $count = 0;
                    foreach ($users as $user): $count++;
                    ?>
                    <tr id="<?php echo $user['keeper_id']; ?>">
                       <td><a href="javascript:void(0);" onclick="viewuser('<?php echo $user['keeper_id']; ?>');$('#tbl').hide()"><?php echo $user['keeper_fname'];?></td>
					   <td><?php echo $user['dist_name']; ?></td>
                        <td><?php echo $user['keeper_email']; ?></td>
						<td><?php echo $user['keeper_mob']; ?></td>
						<td><?php echo $user['keeper_city']; ?></td>
						<td>  <?php
						$userstat = $user['keeper_status'];
                                if ($userstat > 0) {
                                    echo"Active";
                                  } else {
                                 echo"resign";
                                 }  ?>  </td>
                    </tr>
                    <?php
                    endforeach;
                    else:
                    ?>
                    <tr><td colspan="5">No Godown Keepers found......</td></tr>
                    <?php endif; ?>
                </tbody>
                        </table>
                      </div>
        </div>
    </div>
	<script>
$(document).ready(function() {
        $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
					"width":150,
					"height":150,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
      });
</script>
	<script>
	var url = "<?php echo $homeDir; ?>";	
	var url1 = "<?php echo $homeDirMain; ?>";	
$("#userForm1").submit(function(e) {
	var myform = $('#userForm1');
   var disabled = myform.find(':input:disabled').removeAttr('disabled');
    e.preventDefault();  
 if ($("#userForm1").valid()) {
    var formData = new FormData(this);
}
    $.ajax({
		 url: url+'gkeeperAction.php',
        type: 'POST',
        data: formData,
        success: function (data) {
			if(data.includes('inserted')){
				alert('Godown Keeper has been added successfully');
				loadpage('addgkeeper');
			}
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

</script>
<script>
$("#userForm1").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);    
 
    $.post($(this).attr("action"), formData, function(data) {
    });
});
</script>
<script>
   $(document).ready(function () {
     
         $('#addScnt').click(function () {
             var rowCount = $('#scents tr').length;
   /*  alert(rowCount); */
    var s = '<option value="">-Select-</option><option value="saving">Savings</option><option value="current">Current</option></select>';
             $('<tr id=' + rowCount + '><td class="actions"><input id="form-control-1"class="form-control"type="text"name="bname[]" id="item' + rowCount + '"></td><td class="actions"><input id="form-control-1"class="form-control"type="text"name="brname[]" id="brname"></td><td class="actions" style="width:200px;"><select style="width:100%;" class=" required form-control "  name="actype[]" id="actype" >' + s + '</select></td><td class="actions"><input id="form-control-1"class="form-control"type="text"name="acnum[]" id="acnum"></td><td><input id="form-control-1"class="form-control"type="text"name="acname[]" id="acname"></td><td><input id="form-control-1" class="form-control"type="text"name="ifsc[]" id="ifsc"></td><td class="actions" style="border-color:white"><a href="#" id="remScnt" onclick="remove(' + rowCount + ')"><i class="ti-close"></i></a></td></tr>').appendTo('#scents');
         });
     
     
     });
     function remove(i)
     {
      $("#" + i ).remove();
     }
</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("emp_tbl");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
	 
    td = tr[i].getElementsByTagName("td")[0];
	td2 = tr[i].getElementsByTagName("td")[1];
	td1 = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>	
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('#keeper_status').on('change', function ()
            {
                var keeper_status = $(this).val();
                if (keeper_status !== "") {
                    $.ajax({
                        type: 'POST',
						 url: url+'gkeeperAction.php',
                        data: 'action_type=multy&keeper_status=' + keeper_status,
                        success: function (html) {
                            $('#userData').html(html);
							$('#select_count').html('0 Selected');
                        }
                    });
                } else {
                    getUsers();
                }
            });
        });
    </script>
    <script type="text/javascript">
	function checkDist(val){
		
	$.ajax({
                type: 'POST',
				 url: url+'gkeeperAction.php',
                data: 'action_type=valid&val='+val,
                success: function (msg) {
					if(msg.includes('validation')){
						alert('Ditrict already allocated to another Godown Keeper');
						$('#seldist').val('');
					}
                }
            });
}
	
        function getUsers() {
            $.ajax({
                type: 'POST',
				 url: url+'gkeeperAction.php',
                data: 'action_type=view&' + $("#userForm1").serialize(),
                success: function (html) {
                    $('#userData').html(html);
					$('#select_count').html('0 Selected');
                }
            });
        }
        function userAction(type,id) {
			var myform = $('#userForm1');
			var disabled = myform.find(':input:disabled').removeAttr('disabled');
			var myform = $('#userForm2');
			var disabled = myform.find(':input:disabled').removeAttr('disabled');
            id = (typeof id == "undefined") ? '' : id;
            var statusArr = {add: "added", edit: "updated", updateactive: "activated", updateinactive: "Deactivated"};
            var userData = '';
            if (type == 'add') {
                if ($("#userForm1").valid()) {
                    userData = $("#userForm1").serialize() +'&disttext='+ $('#seldist option:selected').text()+ '&action_type=' + type;
                }

            } else if (type == 'edit') {
                if ($("#userForm2").valid()) {
                    userData = $("#userForm2").serialize() +'&disttext='+ $('#seldist option:selected').text()+ '&action_type=' + type;
                }
            } else {
                userData = 'action_type=' + type + '&id=' + id;
            } 
			
            $.ajax({
                type: 'POST',
				 url: url+'gkeeperAction.php',
                data: userData,
                success: function (msg) {
					
					console.log(msg);
                    if (msg.includes('updated')) {
                        alert('Godown Keeper  has been ' + statusArr[type] + ' successfully.');
                       loadpage('addgkeeper');
                    } else if (msg.includes('update')) {
                        alert('Godown Keeper has been ' + statusArr[type] + ' successfully.');
                        viewuser2(id);
                    } else if (msg == 'delete') {
                        alert('Sales Representative has been ' + statusArr[type] + ' successfully.');
						loadpage('addgkeeper');
                    } else if (msg == 'err') {
                        alert('Some problem occurred, please try again.');
                    }
                }
            });
        }
        function editUser(id) {
            $.ajax({
                type: 'POST',
				 url: url+'gkeeperAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
					var data=JSON.parse(data);
					
                    $('#display').hide();
                    $('#Editid').val(data[0].keeper_id);
                    $('#Editfname').val(data[0].keeper_fname);
                    $('#Editlname').val(data[0].keeper_lname);
                    $('#Editemail').val(data[0].keeper_email);
                    $('#Editmob').val(data[0].keeper_mob);
					$('#Editalmob').val(data[0].mob2);
					$('#Editseldist').val(data[0].keeper_al_dist);
					$('#Editdoj').val(data[0].keeper_doj);
					$('#Editaanum').val(data[0].keeper_Aadhar);
					$('#Editpan').val(data[0].keeper_pan);
                    $('#Editaddr').val(data[0].keeper_addr);
                    $('#Editco-name').val(data[0].keeper_al_cor);
                    $('#Editcity').val(data[0].keeper_city);
					$('#Editstate').val(data[0].keeper_state);
					$('#Editpincode').val(data[0].keeper_pincode);
					$('#Editsal').val(data[0].keeper_salary);
					$('#Editrdate').val(data[0].res_date);
					var status=data[0].keeper_status;
                    $('#editForm').show();
				for (i = 0; i < data.length; i++) {
				    console.log(i);
                    $('#view_table').append("<tr><td><input style='font-family:poppins' type='hidden' name='bank_id[]' value="+data[i].bank_id+"><input style='font-family:poppins' type='text' class='form-control'  name='bname[]' value="+data[i].bank_name+"></td><td><input style='font-family:poppins' type='text' class='form-control'  name='brname[]' value="+data[i].branch_name+"></td><td><input style='font-family:poppins' type='text' class='form-control'  name='actype[]' value="+data[i].acc_type+"></td><td><input style='font-family:poppins' type='text' class='form-control'  name='acnum[]' value="+data[i].acc_no+"></td><td><input style='font-family:poppins' type='text' class='form-control'  name='acname[]' value="+data[i].acc_name+"></td><td><input style='font-family:poppins' type='text' class='form-control'  name='ifsc[]' value="+data[i].ifsc+"></td></tr>");
                    }
		  if(status==0){
				
                    $('#Editfname').attr("disabled", "disabled");
                    $('#Editlname').attr("disabled", "disabled");
					$('#Editseldist').attr("disabled", "disabled");
					$('#Editseldist').attr("disabled", "disabled");
                    $('#Editemail').attr("disabled", "disabled");
                    $('#Editmob').attr("disabled", "disabled");
					$('#Editalmob').attr("disabled", "disabled");
					$('#Editaddr').attr("disabled", "disabled");
                    $('#Editcity').attr("disabled", "disabled");
                    $('#Editstate').attr("disabled", "disabled");
                    $('#Editpincode').attr("disabled", "disabled");
					$('#Editdoj').attr("disabled", "disabled");
                    $('#Editsal').attr("disabled", "disabled");
					$('#Editpan').attr("disabled", "disabled");
					$('#Editaanum').attr("disabled", "disabled");
					$('#Editjdate').attr("disabled", "disabled");
					$('.Editbname').attr("disabled", "disabled");
					$('.Editbrname').attr("disabled", "disabled");
					$('.Editactype').attr("disabled", "disabled");
					$('.Editacnum').attr("disabled", "disabled");
					$('.Editacname').attr("disabled", "disabled");
					$('.Editifsc').attr("disabled", "disabled");
					
			}
                }
            });
        }
        function viewuser(id) {
			
	
            $.ajax({
                type: 'POST',
				 url: url+'gkeeperAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
					var data=JSON.parse(data);
					$('#keeper-id').val(data[0].keeper_id);
                    $('#sales-rep-name').html(data[0].keeper_fname);
					$('#sales-rep-Address').html(data[0].keeper_addr);					
                    $('#sales-rep-det').html(data[0].dist_name);
					 $('#sales-rep-al_cor').html(data[0].keeper_al_cor);
					  $('#sales-rep-email').html(data[0].keeper_email);
					   $('#sales-rep-mob').html(data[0].keeper_mob);
					  $('#sales-rep-state').html(data[0].keeper_state);
						  $('#sales-rep-pincode').html(data[0].keeper_pincode);
						  $('#sales-rep-alter').html(data[0].mob2);
						  $('#sales-rep-doj').html(data[0].keeper_doj);
						  $('#sales-rep-aadhar').html(data[0].keeper_Aadhar);
						  $('#sales-rep-pan').html(data[0].keeper_pan);
						  $('#rep-rdate').html(data[0].res_date);
						var path2=data[0].path;
					var src = url1+path2;
        show_image(src, 150,120, "Profile");
		 var status=data[0].keeper_status;
			  if(status==1){
				        $('#res_btn').show();
						$('#join_btn').hide();
			  }
			  else{
				           $('#join_btn').show();
						$('#res_btn').hide();
			  }
			  for (i = 0; i < data.length; i++) {
				    console.log(i);
                    $('#dis-bank-det').append("<tr><td class='bank_name'>"+ data[i].bank_name +" </td><td class='branch_name'>"+ data[i].branch_name +" </td><td class='acc_type'>"+ data[i].acc_type +" </td><td class='acc_no'>"+ data[i].acc_no +" </td><td class='acc_name'>"+ data[i].acc_name +" </td><td class='ifsc'>"+ data[i].ifsc +" </td></tr>");
                    
					}
                    $('#tbl').hide();
                    $('#display').show();
                }
            });
        }
		  function viewuser2(id) {
			
	
            $.ajax({
                type: 'POST',
				 url: url+'gkeeperAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
					var data=JSON.parse(data);
					$('#keeper-id').val(data[0].keeper_id);
                    $('#sales-rep-name').html(data[0].keeper_fname);
					$('#sales-rep-Address').html(data[0].keeper_addr);					
                    $('#sales-rep-det').html(data[0].dist_name);
					 $('#sales-rep-al_cor').html(data[0].keeper_al_cor);
					  $('#sales-rep-email').html(data[0].keeper_email);
					   $('#sales-rep-mob').html(data[0].keeper_mob);
					  $('#sales-rep-state').html(data[0].keeper_state);
						  $('#sales-rep-pincode').html(data[0].keeper_pincode);
						  $('#sales-rep-alter').html(data[0].mob2);
						  $('#sales-rep-doj').html(data[0].keeper_doj);
						  $('#sales-rep-aadhar').html(data[0].keeper_Aadhar);
						  $('#sales-rep-pan').html(data[0].keeper_pan);
						  $('#rep-rdate').html(data[0].res_date);
						
		 var status=data[0].keeper_status;
			  if(status==1){
				        $('#res_btn').show();
						$('#join_btn').hide();
			  }
			  else{
				           $('#join_btn').show();
						$('#res_btn').hide();
			  }
			
                    $('#tbl').hide();
                    $('#display').show();
                }
            });
        }
		function show_image(src, width, height, alt) {
        var img = document.createElement("img");
        img.src = src;
        img.width = width;
        img.height = height;
        img.alt = alt;
        $('#profile').html(img);
    }
		function loadpage(page)
        {
            $("#main").load("partials/" + page + ".php");
        }
    </script>	
    <script>
		function emp(){
	
var length=$("input.emp_checkbox:checked").length;
	
$("#select_count").html($("input.emp_checkbox:checked").length+" Selected");	

}
        $('#select_all').on('click', function (e) {
            if ($(this).is(':checked', true)) {
                $(".emp_checkbox").prop('checked', true);
            } else {
                $(".emp_checkbox").prop('checked', false);
            }
            // set all checked checkbox count
            $("#select_count").html($("input.emp_checkbox:checked").length + " Selected");
        });
        // set particular checked checkbox count
        $(".emp_checkbox").on('click', function (e) {
            $("#select_count").html($("input.emp_checkbox:checked").length + " Selected");
        });
    </script>
    <script src="assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $("#Editaanum,#Editpan,#pincode,#sal,#Editalmob,#alphn,#sal,#aanum,#pannum,#Editaanum").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
    </script>	
   <script>
        $("#userForm1").validate({
            rules: {
              fname: {
                    required: !0
                  },
              
			mob: {
                    required: !0
                    },
			email: {
                    required: !0
                    },
					addr: {
                    required: !0
                    },
			city: {
                    required: !0
                    },
			state: {
                    required: !0
                    },
			pincode: {
                    required: !0
                    },
			sal: {
                    required: !0
                    },
			aanum: {
                    required: !0
                    },
					pannum: {
                    required: !0
                    },
              jdate: {
                    required: !0
                    },
seldist: {
                    required: !0
                    },
			
				 },
			 messages: {
				 fname: "Please enter first name",
   
    mob:   "Please enter mobile number",
	 email: "Please enter email",
	  addr: "Please enter Address",
	city:   "Please enter city",
	state:  "Please enter state",
	pincode: "Please enter pincode",
	sal:   "Please enter salary",
	aanum: "Please enter aadhar number",
	pannum: "Please enter PAN number",
jdate: "Please enter Date of Joining",
seldist:"Please enter Select District"

    }, errorClass: "help-block error",
            highlight: function(e) {
                $(e).closest(".form-group.row").addClass("has-error")
            },
            unhighlight: function(e) {
                $(e).closest(".form-group.row").removeClass("has-error")
            },
        });
		 $("#userForm2").validate({
            rules: {
              fname: {
                    required: !0
                  },
              
			mob: {
                    required: !0
                    },
			email: {
                    required: !0
                    },
					addr: {
                    required: !0
                    },
			city: {
                    required: !0
                    },
			state: {
                    required: !0
                    },
			pincode: {
                    required: !0
                    },
			sal: {
                    required: !0
                    },
			aanum: {
                    required: !0
                    },
					pannum: {
                    required: !0
                    },
              jdate: {
                    required: !0
                    },
seldist: {
                    required: !0
                    },
			
				 },
			 messages: {
				 fname: "Please enter first name",
   
    mob:   "Please enter mobile number",
	 email: "Please enter email",
	  addr: "Please enter Address",
	city:   "Please enter city",
	state:  "Please enter state",
	pincode: "Please enter pincode",
	sal:   "Please enter salary",
	aanum: "Please enter aadhar number",
	pannum: "Please enter PAN number",
jdate: "Please enter Date of Joining",
seldist:"Please enter Select District"

    }, errorClass: "help-block error",
            highlight: function(e) {
                $(e).closest(".form-group.row").addClass("has-error")
            },
            unhighlight: function(e) {
                $(e).closest(".form-group.row").removeClass("has-error")
            },
        });
    </script>
</div>
<!-- END PAGE CONTENT-->
