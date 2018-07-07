<!-- START PAGE CONTENT-->
<?php include"dbconfig.php"; ?>
<div class="page-content fade-in-up">
    <div class="col-md-12">

    </div>
    <div class="ibox none" id="addForm">
        <div class="ibox-head">
            <div class="ibox-title">Add Managers</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm1" method="post" novalidate="novalidate">
                  <div class="form-group row">
                        <label class="col-sm-2 col-form-label" style="font-family: Poppins">Division *</label>
                        <div class="col-sm-5" id="cust_select" style="font-family: Poppins">
                            <select class="select2 form-control border-primary" style="font-family:Poppins" name="division" id="division">
                                <?php
                                include '../config/DB.php';
                                $db = new DB();
                                $users = $db->getRows('tbl_division', array('order_by' => 'division_id DESC'));
                                ?>
                                <option  style="font-family: Poppins" value="">-Select-</option>
                                <?php foreach ($users as $user) { ?>     
                                    <option  style="font-family:Poppins" value="<?php echo $user['division_id']; ?>"><?php echo $user['division_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div> 
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">First Name *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="lname"  name="lname" placeholder="Last Name" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mobile *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="phone"  maxlength="10" id="phone" placeholder="Mobile" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email ID *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="email" placeholder="Email ID" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address *</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="address" placeholder="Address" style="font-family: Poppins"></textarea>
                    </div>
                </div>
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="city" id="city" placeholder="City"style="font-family: Poppins">
                    </div>
                </div>
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">State</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="state" id="state" placeholder="State" style="font-family: Poppins">
                    </div>
                </div>
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pincode</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="pincode" id="pincode" placeholder="Pincode" style="font-family: Poppins">
                    </div>
                </div>
                   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Date Of Joining *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="date" name="doj" id="doj" style="font-family: Poppins">
                    </div>
                </div>
 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gender *</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="gender" id="gender">
												<option value="">Select Gender</option>

						<option value="Male">Male</option>
						<option value="Female">Female</option></select>
                    </div>
                </div>
 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Labour type *</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="labourtype" id="labourtype">
																		<option value="">Select Labour</option>

						<option value="regular">regular</option>
						<option value="contract">contract</option>
						<option value="temporary">temporary</option>
						</select>
                    </div>
                </div>  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Designation *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="designation" id="designation" style="font-family: Poppins">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="loadpage('listemployees');">Back</a>
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('add');">Add Manager</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="ibox none" id="display">
        <div class="ibox-head">
            <div  class="ibox-title"><table><tr><td><h4 id="divisionname"></h4></td><td></td></tr></table></div>
            <div style="float:right;">
                <input type="hidden" name="emp_id" value="" id="dis-emp-id">
                <a href="javascript:void(0);" id="emp_id" class="btn btn-primary" onclick="editUser(document.getElementById('dis-emp-id').value);$('#display').hide();">Edit</a>
                <span id="active_btn">
                    <a href="javascript:void(0);" style="background-color:#2cc4cb;border-color:#2cc4cb" class="btn btn-primary" onclick="return confirm('Are you sure to update data?') ? userAction('updateactive', document.getElementById('dis-emp-id').value) : false;" style="max-width:50%;">Mark as Active</a>
                </span> 
                <span id="inactive_btn">
                    <a href="javascript:void(0);" style="background-color:#2cc4cb;border-color:#2cc4cb" class="btn btn-primary" onclick="return confirm('Are you sure to update data?') ? userAction('updateinactive', document.getElementById('dis-emp-id').value) : false;" style="max-width:50%">Mark as InActive</a>
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
                                <b><span><p id="emp_first_name"></p><p id="emp_last_name"></p></span></b>
<p id="emp_phoneno"></p>
<p id="emp_email"></p>
<table><tr><td>Designation</td><td id="emp_designation"></td></tr></table>
</div>
                        </div>
                        <br>
                        <h6 style="border-bottom:1px solid #eee;">Address</h6>
                        <p id="emp_address"> </p>
<p id="emp_city"> </p>
<table><tr><td id="emp_state"></td><td>-</td><td id="emp_pincode"> </td></tr></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox none" id="editForm">
        <div class="ibox-head">
            <div class="ibox-title">Edit Employees</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm2" method="post" novalidate="novalidate">
   <div class="form-group row">
                        <label class="col-sm-2 col-form-label" style="font-family: Poppins">Division *</label>
                        <div class="col-sm-5" id="cust_select" style="font-family: Poppins">
                            <select class="select2 form-control border-primary" style="font-family:Poppins" name="division" id="editdivision">
                                <?php
                               $res=mysqli_query($conn,"select * from tbl_division");
                                ?>
                                <option  style="font-family: Poppins" value="">-Select-</option>
                                <?php while($user=mysqli_fetch_array($res)) { ?>     
                                    <option  style="font-family:Poppins" value="<?php echo $user['division_id']; ?>"><?php echo $user['division_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div> 
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">First Name *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="fname" id="emp_first_nameEdit" style="font-family: Poppins">
                        <input class="form-control" type="hidden" name="id" id="emp_idEdit">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="lname" id="emp_last_nameEdit" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mobile *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="phone" maxlength="10" id="emp_phoneEdit" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email ID *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="email" id="emp_emailEdit" style="font-family: Poppins">
                    </div>
                </div>
                <!--<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="address" id="emp_addressEdit">
                    </div>
                </div>-->
 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address *</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="address" id="emp_addressEdit" style="font-family: Poppins"></textarea>
                    </div>
                </div>
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="city" id="emp_cityEdit" style="font-family: Poppins">
                    </div>
                </div>
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">State</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="state" id="emp_stateEdit" style="font-family: Poppins">
                    </div>
                </div>
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pincode</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="pincode" id="emp_pincodeEdit" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Date Of Joining *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="date" name="doj" id="edit_doj" style="font-family: Poppins">
                    </div>
                </div>
 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gender *</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="gender" id="edit_gender">
						
						<option value="Male">Male</option>
						<option value="Female">Female</option></select>
                    </div>
                </div>
 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Labour type *</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="labourtype" id="edit_labourtype">
						
						<option value="regular">regular</option>
						<option value="contract">contract</option>
						<option value="temporary">temporary</option>
						</select>
                    </div>
                </div>
				  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Designation *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="designation" id="edit_designation" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('edit');">Update Employee</a>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div id="tbl">
            <div class="ibox ibox-fullheight" id="header">
                <div class="ibox-head">
                    <div class="ibox-title">
                        <select style="font-family: Poppins" id="emp_status">
                            <option value="">All Employees</option>
                            <option value="1">Active Employees</option>
                            <Option value="0">Inactive Employees</option>
                        </select>
                        <span class="rows_selected" id="select_count"style="margin-left:10px">0 Selected</span>
                    </div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Employee.." title="Type in a name" style="font-family: Poppins;margin-left:-104px;height:27px">
                    <div style="float:right;">
                        <span><input  class="btn btn-primary" style="background-color:#2cc4cb;border-color:#2cc4cb" value="Mark as Active" name="active" id="active" type="button"></span> 
                        <span><input  class="btn btn-primary" style="background-color:#2cc4cb;border-color:#2cc4cb" value="Mark as Inactive" name="inactive" id="inactive" type="button"></span> 
                        <span><a href="javascript:void(0);"  class="btn btn-primary" onclick="$('#addForm').show();$('#tbl').hide();">+ NEW</a></span>                            
                    </div>                           
                </div>
                <div  id="show1">
 <?php
                              include_once("dbconfig.php");
                              $per_page = 5;
                              $query="select * from tbl_emp";
                              $result = mysqli_query($conn, $query);
                              $count = mysqli_num_rows($result);
                              $pages = ceil($count/$per_page)
                              ?>
							  
                    <table class="table table" id="emp_tbl">
                        <thead>
                            <tr>
                                <td><input id="select_all" type="checkbox" /></td>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mobile</th>
                                <th>Email Id</th>
                                <!--<th>Address</th>-->
                                <th>Designation</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="userData">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>
function call(pagenum,status){
//alert(pagenum);
   $("#userData").load("partials/manager_data.php?page=" + pagenum +"&status="+ status);


};
function getval(pageNum){
//alert(pageNum);
   //CSS Styles
   $("#pagination li").css({'border' : 'solid #dddddd 1px'}).css({'color' : '#0063DC'});
   $(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
   //Loading Data
   //var pageNum = this.id;
   
   var status = $('#emp_status').val();
   //alert(status);
call(pageNum,status);
   };

   $(document).ready(function() {
   //Hide Loading Image
   function Hide_Load() {
   $("#loading").fadeOut('slow');
   };
   //Default Starting Page Results
   $("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
   $("#userData").load("partials/manager_data.php?page=1&status=", Hide_Load());
   //Pagination Click
   
   });


</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("emp_tbl");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
 td2 = tr[i].getElementsByTagName("td")[3];
 td3 = tr[i].getElementsByTagName("td")[4];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > - 1 || td3.innerHTML.toUpperCase().indexOf(filter) > - 1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script type="text/javascript">
var url = "<?php echo $homeDir; ?>";
        $(document).ready(function ()
        {
            $('#phone').on('change', function ()
            {
                var phone = $(this).val();
                if (phone !== "") {
                    $.ajax({
                        type: 'POST',
                        url: url+'/managerAction.php',
                        data: 'action_type=phone&phone=' + phone,
                        success: function (response) {
                            //$('#userData').html(html);
//alert(response);
if(response=='phone') {
alert('Customer Phone Number Already Exit.');
$("#phone").val("");
}
                        }
                    });
                } 
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('#emp_status').on('change', function ()
            {

                var status = $(this).val();
page=1;
call(page,status);

                
                  
           });
        });
    </script>
    <script>
        function getUsers() {
            $.ajax({
                type: 'POST',
                url: url+'/managerAction.php',
                data: 'action_type=view&' + $("#userForm1").serialize(),
                success: function (html) {
                    $('#userData').html(html);
 $('#select_count').html('0 Selected');
                }
            });
        }
        function userAction(type,id) {
            var valid;
            valid = $("#userForm1").valid();
            if (valid) {

                id = (typeof id == "undefined") ? '' : id;
                var statusArr = {add: "added", edit: "updated", updateactive: "activated", updateinactive: "deactivated"};
                var userData = '';
                if (type == 'add') {

                    userData = $("#userForm1").serialize() + '&action_type=' + type;

                } else if (type == 'edit') {
                    userData = $("#userForm2").serialize() + '&action_type=' + type;
                } else {
                    userData = 'action_type=' + type + '&id=' + id;
//alert(userData);
                }
            }
            $.ajax({
                type: 'POST',
                url: url+'/managerAction.php',
                data: userData,
                success: function (msg) {
alert(msg);
                    console.log(msg);
                    if (msg == 'ok') {
                        alert('Manager has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        $('#userForm1')[0].reset();
                        //$('#addForm').hide();
                        loadpage('listmanagers');
                    } else if (msg == 'updated') {
                        alert('Manager has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        //$('#editForm').hide();
                        //$('#display').hide();
                        //$('#header').show();
                        //$('#show1').show();
                        loadpage('listmanagers');

                    } else if (msg == 'exist') {
                        alert('Manager has been already existed');
                        getUsers();
                        //$('#editForm').hide();
                        //$('#display').hide();
                        //$('#header').show();
                        //$('#show1').show();
                        loadpage('listmanagers');

                    } else if (msg == 'update') {
                        alert('Manager has been ' + statusArr[type] + ' successfully.');
viewuser();
                    } else {
                        alert('Some problem occurred, please try again.');
                    }
                }
            });
        }
        function editUser(id) {

            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: url+'/managerAction.php',
                data: 'action_type=data&id=' + id,
                success: function (data) {
                    $('#emp_idEdit').val(data.manager_id);
                    $('#editdivision').val(data.division_id);
                    $('#emp_first_nameEdit').val(data.emp_first_name);
                    $('#emp_last_nameEdit').val(data.emp_last_name);
                    $('#emp_emailEdit').val(data.emp_email);
                    $('#emp_phoneEdit').val(data.emp_phoneno);
                    $('#emp_addressEdit').val(data.emp_address);
                    $('#emp_salaryEdit').val(data.emp_salary);
$('#emp_cityEdit').val(data.emp_city);
$('#emp_stateEdit').val(data.emp_state);
$('#emp_pincodeEdit').val(data.emp_pincode);
                    $('#emp_salary_typeEdit').val(data.emp_salary_type);
                    $('#edit_doj').val(data.emp_doj);
                    $('#edit_gender').val(data.emp_gender);
                    $('#edit_labourtype').val(data.emp_type);
                    $('#edit_designation').val(data.emp_designation);
                    $('#editForm').show();
                }
            });
        }
        function viewuser(id) {
            $.ajax({
                type: 'POST',
                url: url+'/managerAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
                    console.log(data);
                    var data = JSON.parse(data);
                    $('#dis-emp-id').val(data.manager_id);
                    $('#divisionname').html(data.division_name);
                    $('#emp_first_name').html(data.emp_first_name);
                    $('#emp_last_name').html(data.emp_last_name);
$('#emp_email').html(data.emp_email);
                    $('#emp_address').html(data.emp_address);
$('#emp_phoneno').html(data.emp_phoneno);
                    $('#emp_city').html(data.emp_city);
$('#emp_designation').html(data.emp_designation);
$('#emp_state').html(data.emp_state);
$('#emp_pincode').html(data.emp_pincode);
var status=data.status;
			if(status==1){
			$('#inactive_btn').show();
			$('#active_btn').hide();
				}
			else{
			$('#active_btn').show();
			$('#inactive_btn').hide();
					}
                    /* alert(data.emp_id); */
                    $('#display').show();
$('#header').hide();
$('#show1').hide();
                    /*  $('#display').html($(html).find('#load-cont').html()); */

                }
            });
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
    <script>
        $(document).ready(function () {

            $('#inactive').click(function () {
                //alert('hi');
                var post_arr = [];
                $('#emp_tbl input[type=checkbox]').each(function () {
                    if (jQuery(this).is(":checked")) {
                        var id = this.id;
                        //alert(id);
                        post_arr.push(id);

                    }
                });

                if (post_arr.length > 0) {
                    // AJAX Request
                    $.ajax({
                        url: url+'/inactive_action_employe.php',
                        type: 'POST',
                        data: {emp_id: post_arr},
                        success: function (response) {
                            getUsers();
                            loadpage('listemployees');

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
                        url: url+'/active_action_employe.php',
                        type: 'POST',
                        data: {emp_id: post_arr},
                        success: function (response) {
                            getUsers();
                            loadpage('listemployees');

                        }
                    });
                }
            });

        });
    </script>
    <script>
        $("#userForm1").validate({

            rules: {
                fname: {

                    required: !0

                },
                  lname: {
                 required: !0
                 
                 },

                email: {

                    required: !0
                },

                phone: {
                    required: !0

                },

                address: {
                    required: !0

                },

                salary: {
                    required: !0

                },

                gender: {
                    required: !0

                },

                labourtype: {
                    required: !0

                },

                designation: {
                    required: !0

                },

                doj: {
                    required: !0

                },

            },
            messages: {
                fname: "Please enter employee first name",
                   
                 lname: "Please enter employee last name",
                email: "Please select email id",
                phone: "Please enter phone number",
                address: "Please enter address",
                gender: "Please enter gender",
                labourtype: "Please enter labour type",
                designation: "Please enter designation",
                doj: "Please enter date of joining",

            },
            errorClass: "help-block error",
            highlight: function (e) {
                $(e).closest(".form-group.row").addClass("has-error")
            },
            unhighlight: function (e) {
                $(e).closest(".form-group.row").removeClass("has-error")
            },
        });
    </script>
    <script>      $("#phone,#salary,#pincode").keydown(function (e) {
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
</div>

