<!-- START PAGE CONTENT-->

<?php include"dbconfig.php"; ?>
<div class="page-content fade-in-up">
   
    <div class="ibox none" id="addForm">
        <div class="ibox-head">
            <div class="ibox-title">Add Company Details</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" action="partials/companyinfoAction.php" id="userForm1" method="post" enctype="multipart/form-data" novalidate="novalidate">
                <div class="ibox-body control-group" >
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Company Name*</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="cname" name="cname" style="font-family: Poppins" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Managing Director Name</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="mname"id="cperson" style="font-family: Poppins"  placeholder="Contact Person">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Landline 1</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="lan1" style="font-family: Poppins"  placeholder="Landline Number1">
                        </div>
                    </div>
                       
					   <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Landline 2</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="lan2" style="font-family: Poppins"  placeholder="Landline Number2">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile 1</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="mob1" name="mob1" style="font-family: Poppins" placeholder="Mobile 1" maxlength="10">

                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile 2</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="mob2" name="mob2" style="font-family: Poppins" placeholder="Mobile 2" maxlength="10">

                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-8" style="height:auto">
                       <textarea rows="2" cols="30" style="width:440px;border-color: rgba(0, 0, 0, .1);font-family: Poppins" name="desc" placeholder="Description" ></textarea>
                        </div>
                    </div>
					 <div class="form-group row">
                        <label class="col-sm-2 col-form-label">GST</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"  style="font-family: Poppins" name="gst" placeholder="GST">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-8" style="height:auto">
                       <textarea rows="2" cols="30" style="width:440px;border-color: rgba(0, 0, 0, .1);font-family: Poppins" name="addr" placeholder="    Address" ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">City*</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"  style="font-family: Poppins" name="city" placeholder="City">
                        </div>
                    </div>
					

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">State*</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="state" name="state" style="font-family: Poppins" placeholder="State">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pincode</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" id="pincode" name="pincode" style="font-family: Poppins" placeholder="Pincode">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Upload Image</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="file" id="file" name="file" style="font-family: Poppins" placeholder="Upload Logo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').hide();$('#tbl').show()">Back</a>
                            <div class="form-group row" style="margin-top:-40px;margin-left:-80px">
                                <div class="col-sm-10 ml-sm-auto" >
                                    <input class="btn btn-primary mr-2" value="Submit" type="submit">
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
            <div id="vendor_name" class="ibox-title"><h4><p id="comp_name">  </p></h4></div>
            <div style="float:right;">
                <input type="hidden" name="vendor-id" value="" id="comp_id">
                <a href="javascript:void(0);" class="btn btn-primary" onclick="editUser(document.getElementById('comp_id').value);$('#display').hide()">Edit</a>
               </div>
        </div>
        <div class="ibox-head" style="border:0px">
            <div class="ibox-title"><p style="border-bottom:3px solid #007bff;margin-bottom:-23px">Contact Details</p></div>
        </div>
        <div class="ibox-body">
            <div class="rickshaw_graph" id="rickshaw_scatterplot">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <span><p id="mdir_name"></p></span><br>
								 <span><p id="lan1"> </p></span><br>
								 <span><p id="lan2"> </p></span>
								 <span><p id="mob1"> </p></span>
								 <span><p id="mob2"> </p></span>
								</div>
                        </div>
                        <br>
                        <h6 style="border-bottom:1px solid #eee;">Address:</h6>
						  <span><p id="disaddr"> </p></span>
                          <span><p id="discity"> </p></span>
						  <span><p id="disstate"> </p></span>
						  <span><p id="dispincode"> </p></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox none" id="editForm">
        <div class="ibox-head">
            <div class="ibox-title">Edit Company Details</div>
        </div>
        <div class="ibox-body" >
            <form class="form-horizontal" action="partials/companyinfoupdateAction.php" id="userForm2" method="post" novalidate="novalidate">
                <div class="ibox-body control-group" >
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Company Name</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"  name="comp_id" style="font-family: Poppins" id ="Editcomp_id">
                            <input class="form-control" type="text"  name="cname" style="font-family: Poppins" id ="Editcname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Managing Director Name</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"  name="mname" style="font-family: Poppins"  id ="Editmname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Landline 1</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="lan1" style="font-family: Poppins"  id ="Editlan1">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Landline 2</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="lan2" style="font-family: Poppins"  id ="Editlan2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile1</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"  name="mob1" style="font-family: Poppins"  maxlength="10" id ="Editmob1">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile2</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"  name="mob2" style="font-family: Poppins"  maxlength="10" id = "Editmob2">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-8" style="height:auto">
                          <textarea rows="2" cols="30" style="width:440px;border-color: rgba(0, 0, 0, .1);font-family: Poppins" name="addr" id="Editaddr" ></textarea>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-8" style="height:auto">
                          <textarea rows="2" cols="30" style="width:440px;border-color: rgba(0, 0, 0, .1);font-family: Poppins" name="desc" id="Editdesc" ></textarea>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">GST</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"  style="font-family: Poppins" name="gst" placeholder="City">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">City*</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text"  style="font-family: Poppins" name="city" id ="Editcity">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">State*</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="state" style="font-family: Poppins" placeholder="State" id = "Editstate">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pincode</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="pincode" style="font-family: Poppins"  id ="Editpincode">
                        </div>
                    </div>
                    <div class="form-group row">
                        <input class="btn btn-primary mr-2" value="Update" type="submit">
                        </div>
                </div>
            </form>

        </div>
    </div>
    <div class="col-md-12">
        <div id="tbl">
            <div class="ibox ibox-fullheight" >
                <div id="header">
                    <div class="ibox-head">
                        <div class="ibox-title">
                            
                        </div>
                        <div style="float:right">
                            
                            <span><a href="javascript:void(0);" class="btn btn-primary" onclick="$('#addForm').show();$('#header').hide();$('#show1').hide();$('#tbl').hide()">+ NEW</a></span></div>                            
                    </div>  </div> 

                <table class="table table" id="emp_tbl">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Managing Director Name</th>
                            <th>Mobile</th>
							<th>City</th>
                            <th>State</th>
                            <th>Logo</th>
                        </tr>
                    </thead>
                    <tbody id="userData">
                        <?php
                        include '../config/DB.php';
                        $db = new DB();
                        $users = $db->getRows('comp_info', array('order_by' => 'comp_id DESC'));
                        if (!empty($users)): $count = 0;
                            foreach ($users as $user): $count++;
                                ?>
                                <tr id="<?php echo $user['comp_id']; ?>">
                                    <td><a href="javascript:void(0);" onclick="viewuser('<?php echo $user['comp_id']; ?>');$('#header').hide();$('#show1').hide()"><?php echo $user['comp_name']; ?></td>
                                    <td><?php echo $user['mdir_name']; ?></td>
                                    <td><?php echo $user['mob2']; ?></td>
									 
                                    <td><?php echo $user['city']; ?></td>
                                    <td><?php echo $user['state']; ?></td>
									<?php $image="images/".$user['logo_path']?>
									
                                    <td><img src="<?php echo $image;?>" alt="" height="60" width="70"></td>
									<td><?php echo $user['gst']; ?></td>
                                </tr>
                                <?php
                            endforeach;
                        else:
                            ?>
                            <tr><td colspan="5">No user(s) found......</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	
   
    <script>
	var url = "<?php echo $homeDir; ?>";
        function userAction(type,id) {
            
                id = (typeof id == "undefined") ? '' : id;
                var statusArr = {add: "added", edit: "updated", updateactive: "activated", updateinactive: "Deactivated"};
                var userData = '';
                if (type == 'add') {
if ($("#userForm1").valid()) {
                    userData = $("#userForm1").serialize() + '&action_type=' + type;
 }
                } else if (type == 'edit') {
                    userData = $("#userForm2").serialize() + '&action_type=' + type;

                } else {
                    userData = 'action_type=' + type + '&id=' + id;
					 
                }
          //alert(userData);
            $.ajax({
                type: 'POST',
                url: url+'/compinfoAction.php',
                data: userData,
                success: function (response) {
					//alert(response);
                    if (msg == 'ok') {
                        alert('Vendor has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        $('#userForm1')[0].reset();
                        //$('#addForm').hide();
                        loadpage('listvendors');
                    } else if (msg == 'updated') {
                        alert('Vendor has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        loadpage('listvendors');
                    } else if (msg == 'update') {
                        alert('Vendor has been ' + statusArr[type] + ' successfully.');
						viewuser(id);
                    } else {
                        alert('Some problem occurred,... please try again.');
                    }
                }
            });
        }
        function editUser(id) {
			//alert(id);
            $.ajax({
                type: 'POST',
                
                url: url+'/compinfoAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
					//alert(data);
					 var data = JSON.parse(data);
                    $('#Editcomp_id').val(data.comp_id);
                    $('#Editcname').val(data.comp_name);
                    $('#Editmname').val(data.mdir_name);
					$('#Editlan1').val(data.lan1);
					$('#Editlan2').val(data.lan2);
					$('#Editmob1').val(data.mob1);
					$('#Editmob2').val(data.mob2);
					$('#Editaddr').val(data.addr);
					$('#Editdesc').val(data.descr);
					$('#Editcity').val(data.city);
					$('#Editstate').val(data.state);
					$('#Editpincode').val(data.pincode);
				    $('#editForm').show();
                }
            });
        }
        function viewuser(id) {
			//alert(id);
            $.ajax({
                type: 'POST',
                url: url+'/compinfoAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
					//alert(data);
					console.log(data);
                    var data = JSON.parse(data);
                    $('#comp_id').val(data.comp_id);
                    $('#comp_name').html(data.comp_name);
                    $('#mdir_name').html(data.mdir_name);
					$('#lan1').html(data.lan1);
					$('#lan2').html(data.lan2);
					$('#mob1').html(data.mob1);
					$('#mob2').html(data.mob2);
					$('#disaddr').html(data.addr);
					$('#discity').html(data.city);
					$('#disstate').html(data.state);
					$('#dispincode').html(data.pincode);
					$('#tbl').hide();
                    $('#display').show();
                }
            });
        }
		
    </script>

    <script src="assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script>      $("#author_num").keydown(function (e) {
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
                    });</script>	
    <script>
        $("#userForm1").validate({
            rules: {
                cname: {required: !0
                },
				mname: {required: !0
                },
                city: {
                    required: !0
                },
                state: {
                    required: !0
                },
				gst: {
                    required: !0
                },
            },
            messages: {
                name: "Please enter your Company Name",
                city: "Please enter your city",
				                gst: "Please enter your gst",
                state: "Please enter your state"

            }, errorClass: "help-block error",
            highlight: function (e) {
                $(e).closest(".form-group.row").addClass("has-error")
            },
            unhighlight: function (e) {
                $(e).closest(".form-group.row").removeClass("has-error")
            },
        });
    </script>
    

</div>


<!-- END PAGE CONTENT-->

