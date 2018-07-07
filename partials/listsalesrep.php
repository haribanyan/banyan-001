<!-- START PAGE CONTENT-->
<?php include"dbconfig.php"; ?>
<style>
.frmSearch {margin: 2px 0px;padding:10px;border-radius:4px;}
#country-list{list-style:none;margin-top:px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<div class="page-content fade-in-up">
    <div class="col-md-12">
    </div>
    <div class="ibox none" id="addForm">
        <div class="ibox-head">
            <div class="ibox-title">Add Sales Representative</div>
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
                                            <input class="form-control" id="mob" type="text" style="font-family: Poppins" name="mob" placeholder="Mobile" maxlength="10">
										</div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alternative Mobile Number</label>
                                        <div class="col-sm-6">
                                            
                                            <input id="altmob" class="form-control" type="text" style="font-family: Poppins" name="altmob" placeholder="Mobile" maxlength="10">
										
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
					
					<select style="width:100%;" class="select2 form-control border-primary" name="seldist" id="seldist" >
     <?php include '../config/DB.php';$db    = new DB();$users = $db->getRows('dist', array('order_by' => 'created_on '));?>
                                  <option value="">-Select-</option>
                             <?php foreach ($users as $user) {?>     
                                  <option value="<?php echo $user['dist_id'];?>"><?php echo $user['dist_name'];?></option>
                                  <?php }?>
                                </select>
                    </div>
                </div>
				
				<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">District Coordinator Name</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" disabled type="text" name="co-name" style="font-family: Poppins" id="dist-co-name" placeholder="District Coordinator Name">
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
                                            <input class="form-control" type="text" name="pincode" id="pin" style="font-family: Poppins" placeholder="Pincode" maxlength="6">
									    </div>
                                    </div>
									
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Salary *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="sal"id="sal" style="font-family: Poppins" placeholder="Salary">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Aadhar Number *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="aanum"type="text" name="aanum" maxlength="12" style="font-family: Poppins">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pan Card Number *</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="pannum" type="text" name="pannum" maxlength="10" style="font-family: Poppins">
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
                     <h5>Add Bank Details *</h5>
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
                                 <input  type="text" name="bname[]" id="bname0" style="font-family:poppins" class="required form-control">
                              </td>
							  <td>
                                 <input  type="text" name="brname[]" id="brname0" style="font-family:poppins" class="required form-control">
                              </td>
							  <td style="width:200px">
                                 <select  class="select4 form-control border-primary" name="actype[]" style="font-family:poppins" id="actype0">
								 <option value="">--Select--</option>
								 <option value="saving">Savings</option>
								 <option value="current">Current</option>
	                                  </select>
                              </td>
							  <td>
                                 <input  type="text" name="acnum[]" id="acnum0" style="font-family:poppins" maxlength="16" class="required form-control">
                              </td>
							  <td>
                                 <input  type="text" name="acname[]" id="acname0" style="font-family:poppins" class="required form-control">
                              </td>
                              
                              <td>
                                 <input  type="text" name="ifsc[]" id="ifsc0" style="font-family:poppins" class="required form-control">
                              </td>
                              <td class="actions" style="border-color: white;">
                                 <a href="javascript:void(0);" id="addScnt" style="font-family:poppins" style="margin-top:20px">
                                 <i class="ti-plus"></i>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="clear"></div> 
                  <div class="col-md-6 pull-right">
                     <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput2">&nbsp;</label>
                        <div class="col-md-8 pull-right">
                           <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').hide();$('#show1').show();$('#header').show()">Back</a>
                          <button style="margin-top:3px" class="btn btn-primary">Add Sales Representative</button>                               
                        </div>
                     </div>
            
            </div>
            </div> 
                    				
                </div>
            </form>
        </div>
    </div>
    <div class="ibox none" id="display">
        <div class="ibox-head">
            <div id="customer-id" class="ibox-title"><h4 id="sales-rep-fname"></h4></div>
            <div style="float:right;">
                <input type="hidden" name="sales-rep-id" value="" id="sales-rep-id"> <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#display').hide();$('#tbl').show();">Back</a>
                <a href="javascript:void(0);" id="sales-rep-id" class="btn btn-primary"style="margin-right:10px"  onclick="editUser(document.getElementById('sales-rep-id').value)">Edit</a>
                 <span id="res_btn">
                    <a href="javascript:void(0);" class="btn btn-primary" style="background-color:#2cc4cb;border-color:#2cc4cb;margin-right:10px" onclick="return confirm('Are you sure to update data?') ? userAction('updateinactive', document.getElementById('sales-rep-id').value) : false;">Resign</a>
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
                      <table >
       <tbody>
       <tr><td><h5 style="font-family: Poppins;font-size:15px;">District</h5></td><td> : </td><td id="sales-rep-det" style="font-family: Poppins;font-size:16px;"></td></tr>
       <tr><td><h5 style="font-family: Poppins;font-size:15px">Coordinator</h5></td><td> : </td><td id="sales-rep-al-cor" style="font-family: Poppins;font-size:16px"></td></tr>
       <tr><td><h5 style="font-family: Poppins;font-size:15px">Email</h5><td> : </td></td><td id="sales-rep-email" style="font-family: Poppins;font-size:16px"></td></tr>
	    <tr><td><h5 style="font-family: Poppins;font-size:15px">Mobile</h5><td> : </td></td><td id="sales-rep-mob" style="font-family: Poppins;font-size:16px"></td></tr>
		  <tr><td><h5 style="font-family: Poppins;font-size:15px">Aadhar Number</h5><td> : </td></td><td id="rep-anum" style="font-family: Poppins;font-size:16px"></td></tr>
		    <tr><td><h5 style="font-family: Poppins;font-size:15px">Pan Number</h5><td> : </td></td><td id="rep-pan" style="font-family: Poppins;font-size:16px"></td></tr>
			    <tr><td><h5 style="font-family: Poppins;font-size:15px">Date of Joining</h5><td> : </td></td><td id="rep-jdate" style="font-family: Poppins;font-size:16px"></td></tr>
				  <tr><td><h5 style="font-family: Poppins;font-size:15px">Salary</h5><td> : </td></td><td id="sales-rep-sal" style="font-family: Poppins;font-size:16px"></td></tr>
       </tbody>
       </table>
					
						 <h6 style="border-bottom:1px solid #eee;">Contact Address</h6><br>
						<span id="sales-rep-addr"></span><br>
						<span id="sales-rep-city"></span><br>
						<span id="sales-rep-state"></span><br>
						<span id="sales-rep-pincode"></span><br>
						<span id="sales-rep-al-dis"></span><br>
						
						</div><div class="col-md-6"><div id="profile" style="margin-left:300px"></div></div>
						&nbsp;&nbsp;&nbsp;&nbsp;<h5 style="border-bottom:1px solid #eee;">Bank Details</h5>
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
            <div class="ibox-title">Edit Sales Representative</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm2" method="post" novalidate="novalidate">
                <div class="ibox-body control-group" >
                    <input type="hidden" value="" name="id" id="Editid">
                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Name</label>
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
                                        <label class="col-sm-2 col-form-label">Mobile</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" style="font-family: Poppins" id="Editmob" name="mob" placeholder="Mobile" maxlength="10" >
										</div>
                                    </div>
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alternative Mobile</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" style="font-family: Poppins" id="Editmob2" name="altmob" placeholder="Mobile" maxlength="10" >
										</div>
                                    </div>
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="email" style="font-family: Poppins" id="Editemail" name="email" placeholder="Email ID">
										</div>
                                    </div>
									
									<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Select District</label>
                    <div class="col-sm-6">
					
					<select style="width:100%;" class="select2 form-control border-primary" name="seldist" id="Editseldist" >
     <?php $users = $db->getRows('dist', array('order_by' => 'created_on '));?>
                                  <option value="">-Select-</option>
                             <?php foreach ($users as $user) {?>     
                                  <option value="<?php echo $user['dist_id'];?>"><?php echo $user['dist_name'];?></option>
                                  <?php }?>
                                </select>
                    </div>
                </div>
				
				<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">District Coordinator Name</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" disabled type="text" name="co-name" style="font-family: Poppins" id="Editco-name" placeholder="District Coordinator Name">
									    </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-6">
                                            <!--<input class="form-control" type="textarea" style="font-family: Poppins" id="eadd" name="add" placeholder="Address">-->
											<textarea rows="2" cols="35" style="width:560px;border-color: rgba(0, 0, 0, .1);font-family: Poppins" id="Editaddr" name="addr" placeholder="    Address" ></textarea>
										</div>
                                    </div>
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">City</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" style="font-family: Poppins" id="Editcity" name="city" placeholder="City">
										</div>
                                    </div>
									 <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">State</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" id="Editstate" name="state" style="font-family: Poppins" placeholder="State">
										</div>
                                    </div>
									 
									  <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pincode</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" id="Editpincode" name="pincode" style="font-family: Poppins" placeholder="Pincode" maxlength="6">
									    </div>
                                    </div>
									
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Salary</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" id="Editsal" name="sal" style="font-family: Poppins" placeholder="Salary">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Aadhar Number</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="Editaanum"type="text" maxlength="12" name="aanum" style="font-family: Poppins">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pan Card Number</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="Editpannum" type="text" maxlength="10" name="pannum" style="font-family: Poppins">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of Joining</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="Editjdate" type="date" name="jdate" style="font-family: Poppins">
									    </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date of Resigning</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="rdate" type="date" name="rdate" style="font-family: Poppins">
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
                         <a href="javascript:void(0);" class="btn btn-warning" onclick="viewuser( document.getElementById('Editid').value);$('#editForm').hide();">Back</a>	
                       <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('edit');">Update Sales Representative</a> 
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
                            <select style="font-family: Poppins" id="sales_rep_status">
                                <option value="1">Active Representatives</option>
                                <option value="0">Resinged Representatives</option>
                            </select>
                           <span><input type="text" id="myInput" style="margin-left:15px;font-family:Poppins; width:300px " onkeyup="myFunction()" placeholder="Names, Districts, Mobile.." title="Type in a name"></span>
                        </div>
                        <div style="float:right ">
                            <span><a href="javascript:void(0);" class="btn btn-primary" onclick="$('#addForm').show();$('#tbl').hide();">+ NEW</a></span></div>                
                    </div>
                           <table class="table table" id="emp_tbl">
                            <thead>
                                <tr>
                                    
                                    <th>First Name</th>
									<th>District Name</th>
                                    <th>District Coordinator</th>
									<th>Email</th>
									<th>Mobile</th>
									
									<th>Status</th>
									
                                </tr>
                            </thead>
                              <tbody id="userData">
                    <?php
                   include "dbconfig.php";
				   $sql="select sales_rep_id,sales_rep_fname,sales_rep_al_cor,sales_rep_email,sales_rep_mob,dist.dist_name,sales_rep_status from sales_rep join dist on sales_rep.sales_rep_al_dist=dist.dist_id where sales_rep_status=1";
				   $users=mysqli_query($conn,$sql);
                    if (!empty($users)): $count = 0;
                    foreach ($users as $user): $count++;
                    ?>
                    <tr id="<?php echo $user['sales_rep_id']; ?>">
                      <td><a href="javascript:void(0);" onclick="viewuser('<?php echo $user['sales_rep_id']; ?>');$('#tbl').hide()"><?php echo $user['sales_rep_fname'];?></td>
                        <td><?php echo $user['dist_name']; ?></td>
                        <td><?php echo $user['sales_rep_al_cor']; ?></td>
						<td><?php echo $user['sales_rep_email']; ?></td>
						<td><?php echo $user['sales_rep_mob']; ?></td>
						
						<td>  <?php
						$userstat = $user['sales_rep_status'];
                                if ($userstat > 0) {
                                    echo"Active";
                                  } else {
                                 echo"Inactive";
                                 }  ?>  </td>
                    </tr>
                    <?php
                    endforeach;
                    else:
                    ?>
                    <tr><td colspan="5">No salesrep(s) found......</td></tr>
                    <?php endif; ?>
                </tbody>
                        </table>
                      </div>
        </div>
    </div>
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
        url: url+'salesrepAction.php',
        type: 'POST',
        data: formData,
        success: function (data) {
			if(data.includes('inserted')){
				alert('Sales Representative has been added successfully');
				loadpage('listsalesrep');
			}
        },
        cache: false,
        contentType: false,
        processData: false
    });

	});
 
</script>
<script>
/* $("#userForm1").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);    
 
   // $.post($(this).attr("action"), formData, function(data) {
   // });
}); */



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
	td1 = tr[i].getElementsByTagName("td")[1];
	td2 = tr[i].getElementsByTagName("td")[4];
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
	<script>
$('#seldist').change(function() {    
    var dist_name=$(this);
    
var dist_name=dist_name.val();
	
	$.ajax({
		type:'POST',
		url: url+'salesrepAction.php',
		data:'dist_name='+dist_name,
        success:function (data) {
		
			var data=JSON.parse(data);
			 $('#dist-co-name').val(data.dist_co_fname);
			 //$('#item_id').val(data.item_id);
			
		}
	});
});
</script>	
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('#sales_rep_status').on('change', function ()
            {
                var sales_rep_status = $(this).val();
                if (sales_rep_status !== "") {
                    $.ajax({
                        type: 'POST',
                        url: url+'salesrepAction.php',
                        data: 'action_type=multy&sales_rep_status=' + sales_rep_status,
                        success: function (html) {
                            $('#userData').html(html);
                        }
                    });
                } else {
                    getUsers();
                }
            });
        });
    </script>
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
    <script type="text/javascript">
        function getUsers() {
            $.ajax({
                type: 'POST',
                url: url+'salesrepAction.php',
                data: 'action_type=view&' + $("#userForm1").serialize(),
                success: function (html) {
                    $('#userData').html(html);
                }
            });
        }
        function userAction(type, id) {
			var myform = $('#userForm1');
			var disabled = myform.find(':input:disabled').removeAttr('disabled');
			var myform = $('#userForm2');
			var disabled = myform.find(':input:disabled').removeAttr('disabled');
            id = (typeof id == "undefined") ? '' : id;
            var statusArr = {add: "added", edit: "updated", updateactive: "activated", updateinactive: "Resigned"};
            var userData = '';
            if (type == 'add') {
             
                    userData = $("#userForm1").serialize() +'&disttext='+ $('#seldist option:selected').text()+ '&action_type=' + type;
              

            } else if (type == 'edit') {
				
                userData = $("#userForm2").serialize() + '&action_type=' + type;
				
            } else {
                userData = 'action_type=' + type + '&id=' + id;
            }
             
            $.ajax({
                type: 'POST',
                url: url+'salesrepAction.php',
                data: userData,
                success: function (msg) {
				
                    if (msg == 'ok') {
                        alert('sales representative has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        $('#userForm1')[0].reset();
                        $('#addForm').hide();
                    } else if (msg.includes('updated')) {
                        alert('Sales Representative  has been ' + statusArr[type] + ' successfully.');
                       getUsers();
					   viewuser2(id);
                    } else if (msg.includes('update')) {
                        alert('Sales Representative  has been Updated successfully.');
						loadpage('listsalesrep');
                    } 
                }
            });
        }
        function editUser(id) {
            $.ajax({
                type: 'POST',
                
                url: url+'salesrepAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
					var data=JSON.parse(data);
					
                    $('#display').hide();
                    $('#Editid').val(data[0].sales_rep_id);
                    $('#Editfname').val(data[0].sales_rep_fname);
                    $('#Editlname').val(data[0].sales_rep_lname);
                    $('#Editemail').val(data[0].sales_rep_email);
                    $('#Editmob').val(data[0].sales_rep_mob);
					$('#Editmob2').val(data[0].sls_rep_alter_no);
					$('#Editjdate').val(data[0].sls_rep_doj);
					$('#Editaanum').val(data[0].sls_rep_Aadhar);
					$('#Editpannum').val(data[0].sls_rep_pan);
                    $('#Editaddr').val(data[0].sales_rep_addr);
                    $('#Editseldist').val(data[0].sales_rep_al_dist);
                    $('#Editco-name').val(data[0].sales_rep_al_cor);
                    $('#Editcity').val(data[0].sales_rep_city);
					$('#Editstate').val(data[0].sales_rep_state);
					$('#Editpincode').val(data[0].sales_rep_pincode);
					$('#Editsal').val(data[0].sales_rep_salary);
					$('#rdate').val(data[0].res_date);
					var status=data[0].sales_rep_status;
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
					$('#Editmob2').attr("disabled", "disabled");
					$('#Editaddr').attr("disabled", "disabled");
                    $('#Editcity').attr("disabled", "disabled");
                    $('#Editstate').attr("disabled", "disabled");
                    $('#Editpincode').attr("disabled", "disabled");
                    $('#Editsal').attr("disabled", "disabled");
					$('#Editpannum').attr("disabled", "disabled");
					$('#Editaanum').attr("disabled", "disabled");
					$('#Editjdate').attr("disabled", "disabled");
					$('.Editbname').attr("disabled", "disabled");
					$('.Editbrname').attr("disabled", "disabled");
					$('.Editactype').attr("disabled", "disabled");
					$('.Editacnum').attr("disabled", "disabled");
					$('.Editacname').attr("disabled", "disabled");
					$('.Editifsc').attr("disabled", "disabled");
					
			}
                    $('#editForm').show();
                }
            });
        }
        function viewuser(id) {
            $.ajax({
                type: 'POST',
                url: url+'salesrepAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
					var data=JSON.parse(data);
                    $('#sales-rep-id').val(data[0].sales_rep_id);
                    $('#sales-rep-fname').html(data[0].sales_rep_fname);
					$('#sales-rep-lname').html(data[0].sales_rep_lname);
					$('#sales-rep-addr').html(data[0].sales_rep_addr);
                    $('#sales-rep-det').html(data[0].dist_name);
					$('#rep-jdate').html(data[0].sls_rep_doj);
					$('#rep-anum').html(data[0].sls_rep_Aadhar);
					$('#rep-pan').html(data[0].sls_rep_pan);
					$('#sales-rep-email').html(data[0].sales_rep_email);
					$('#sales-rep-mob').html(data[0].sales_rep_mob);
					$('#sales-rep-city').html(data[0].sales_rep_city);
					$('#sales-rep-state').html(data[0].sales_rep_state);
					$('#sales-rep-pincode').html(data[0].sales_rep_pincode);
					$('#sales-rep-al-cor').html(data[0].sales_rep_al_cor);
					$('#sales-rep-sal').html(data[0].sales_rep_salary);
					var status=data[0].sales_rep_status;
							var path=data[0].path;
				
					var src = url1+path;
        show_image(src, 150,120, "Profile");
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
               
                url: url+'salesrepAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
					var data=JSON.parse(data);
				    
                    $('#sales-rep-id').val(data[0].sales_rep_id);
                    $('#sales-rep-fname').html(data[0].sales_rep_fname);
					$('#sales-rep-lname').html(data[0].sales_rep_lname);
					$('#sales-rep-addr').html(data[0].sales_rep_addr);
                    $('#sales-rep-det').html(data[0].dist_name);
					$('#rep-jdate').html(data[0].sls_rep_doj);
					$('#rep-anum').html(data[0].sls_rep_Aadhar);
					$('#rep-pan').html(data[0].sls_rep_pan);
					$('#sales-rep-email').html(data[0].sales_rep_email);
					$('#sales-rep-mob').html(data[0].sales_rep_mob);
					$('#sales-rep-city').html(data[0].sales_rep_city);
					$('#sales-rep-state').html(data[0].sales_rep_state);
					$('#sales-rep-pincode').html(data[0].sales_rep_pincode);
					$('#sales-rep-al-cor').html(data[0].sales_rep_al_cor);
					$('#sales-rep-sal').html(data[0].sales_rep_salary);
					var status=data[0].sales_rep_status;
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
   $(document).ready(function () {
     
         $('#addScnt').click(function () {
             var rowCount = $('#scents tr').length;
   /*  alert(rowCount); */
    var s = '<option value="">-Select-</option><option value="saving">Savings</option><option value="current">Current</option></select>';
             $('<tr id=' + rowCount + '><td class="actions"><input  style="font-family:poppins" id="form-control-1"class="form-control"type="text"name="bname[]" id="item' + rowCount + '"></td><td class="actions"><input style="font-family:poppins" id="form-control-1"class="form-control"type="text"name="brname[]" id="brname"></td><td class="actions" style="width:200px;"><select style="width:100%;" class=" required form-control "  name="actype[]" id="actype" >' + s + '</select></td><td class="actions"><input style="font-family:poppins" id="form-control-1"class="form-control"type="text"name="acnum[]" id="acnum"></td><td><input style="font-family:poppins" id="form-control-1"class="form-control"type="text"name="acname[]" id="acname"></td><td><input style="font-family:poppins" id="form-control-1" class="form-control"type="text"name="ifsc[]" id="ifsc"></td><td class="actions" style="border-color:white"><a href="#" id="remScnt" onclick="remove(' + rowCount + ')"><i class="ti-close"></i></a></td></tr>').appendTo('#scents');
         });
     
     
     });
     function remove(i)
     {
      $("#" + i ).remove();
     }
</script>	
    <script>
	function emp(){
		 $("#select_count").html($("input.emp_checkbox:checked").length + " Selected");
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
    <script>
        $(document).ready(function () {

            $('#inactive').click(function () {

                var post_arr = [];
                $('#emp_tbl input[type=checkbox]').each(function () {
                    if (jQuery(this).is(":checked")) {
                        var id = this.id;
                        post_arr.push(id);

                    }
                });

                if (post_arr.length > 0) {
                    // AJAX Request
                    $.ajax({
                        url: url+'salesrepinactive_Action.php',
                        type: 'POST',
                        data: {sales_rep_id: post_arr},
                        success: function (response) {
							loadpage('listsalesrep');
                            //$('#tbl').load('http://www.intellyticshub.com/omv/omv_dev/partials/listsalesrep.php').fadeIn("slow");
                        }
                    });
                }
            });

        });
    </script>
    <script>
        $(document).ready(function () {

            $('#active').click(function () {

                var post_arr = [];
                $('#emp_tbl input[type=checkbox]').each(function () {
                    if (jQuery(this).is(":checked")) {
                        var id = this.id;
                        post_arr.push(id);

                    }
                });

                if (post_arr.length > 0) {
                    // AJAX Request
                    $.ajax({
                        url: url+'salesrepactive_Action.php',
                        type: 'POST',
                        data: {sales_rep_id: post_arr},
                        success: function (response) {
							loadpage('listsalesrep');
                           // $('#tbl').load('http://www.intellyticshub.com/omv/omv_dev/partials/listsalesrep.php').fadeIn("slow");
                        }
                    });
                }
            });

        });
    </script>
    <script src="assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $("#aanum,#Editaanum,#Editsal,#Editmob,#Editmob2,#acnum0,#acnum1,#acnum2,#acnum3,#pin,#mob,#altmob,#acnum,#sal,#Editpincode,#Editaanum").keydown(function (e) {
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
					aanum: {
                    required: !0
                    },
					pannum: {
                    required: !0
                    },
					pan: {
                    required: !0
                    },
			city: {
                    required: !0
                    },
			state: {
                    required: !0
                    },
			district: {
                    required: !0
                    },
			salary: {
                    required: !0
                    },
			distcor: {
                    required: !0
                    },


			
				 },
			 messages: {
     fname: "Please enter first name",
    mob:   "Please enter mobile number",
	aanum: "Please enter aadhar  number",
	pannum: "Please enter PAN number",
	city:   "Please enter city",
	state:   "Please enter state",
	district:   "Please enter district",
	salary:   "Please enter salary",
	distcor: "Please enter district coordinator name"

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
              
			lname: {
                    required: !0
                    },
			mob: {
                    required: !0
                    },
					aanum: {
                    required: !0
                    },
					pannum: {
                    required: !0
                    },
					pan: {
                    required: !0
                    },
			city: {
                    required: !0
                    },
			state: {
                    required: !0
                    },
			district: {
                    required: !0
                    },
			salary: {
                    required: !0
                    },
			distcor: {
                    required: !0
                    },


			
				 },
			 messages: {
     fname: "Please enter first name",
    lname: "Please enter your last name",
    mob:   "Please enter mobile number",
	aanum: "Please enter aadhar  number",
	pannum: "Please enter pannumber",
	city:   "Please enter city",
	state:   "Please enter state",
	district:   "Please enter district",
	salary:   "Please enter salary",
	distcor: "Please enter district coordinator name"

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
