<!-- START PAGE CONTENT-->
<?php include"dbconfig.php"; ?>
<div class="page-content fade-in-up">
    <div class="col-md-12">

    </div>
    <div class="ibox none" id="addForm">
        <div class="ibox-head">
            <div class="ibox-title">Add Suppliers</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm1" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Company Name *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="cname" id="cname" placeholder="Company Name" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Contact Person Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="cpname"  id="cpname"  placeholder="Contact Person Name" style="font-family: Poppins">
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
                        <input class="form-control" type="text" name="email" id="email" placeholder="Email ID" style="font-family: Poppins">
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
                    <label class="col-sm-2 col-form-label">GST *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="GST" id="gst" style="font-family: Poppins">
                    </div>
                </div>

<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pan *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="pan" id="pan" style="font-family: Poppins">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="loadpage('listsuppliers');">Back</a>
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('add');">Add Suppliers</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="ibox none" id="display">
        <div class="ibox-head">
            <div  class="ibox-title"><table><tr><td><h4 id="emp_first_name"></h4></td><td><h4 id="emp_last_name"></h4></td></tr></table></div>
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
<p id="emp_contact"></p>
<p id="emp_phoneno"></p>
<p id="emp_email"></p>
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
            <div class="ibox-title">Edit Suppliers</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm2" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Company Name *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="cname" id="supplier_cmpny_name" style="font-family: Poppins">
                        <input class="form-control" type="hidden" name="id" id="supplier_id">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Contact Person Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="cpname" id="supplier_contact_person" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mobile *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="phone" maxlength="10" id="supplier_phone" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email ID *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="email" id="supplier_email" style="font-family: Poppins">
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
                        <textarea class="form-control" name="address" id="supplier_address" style="font-family: Poppins"></textarea>
                    </div>
                </div>
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="city" id="supplier_city" style="font-family: Poppins">
                    </div>
                </div>
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">State</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="state" id="supplier_state" style="font-family: Poppins">
                    </div>
                </div>
<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pincode</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="pincode" id="supplier_pincode" style="font-family: Poppins">
                    </div>
                </div>
   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">GST *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="GST" id="supplier_gst" style="font-family: Poppins">
                    </div>
                </div>

<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pan *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="pan" id="supplier_pan" style="font-family: Poppins">
                    </div>
                </div>


               <div class="form-group row">
                    <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('edit');">Update Suppliers</a>
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
                            <option value="">All Suppliers</option>
                            <option value="1">Active Suppliers</option>
                            <Option value="0">Inactive Suppliers</option>
                        </select>
                        <span class="rows_selected" id="select_count"style="margin-left:10px">0 Selected</span>
                    </div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Suppliers.." title="Type in a name" style="font-family: Poppins;margin-left:-104px;height:27px">
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
							  
                    <table class="table table" id="supp_tbl">
                        <thead>
                            <tr>
                                <td><input id="select_all" type="checkbox" /></td>
                                <th>Company Name</th>
                                <th>Contact Person Name</th>
                                <th>Mobile</th>
                                <th>Email Id</th>
                                <!--<th>Address</th>-->
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
   $("#userData").load("partials/supplier_page_data.php?page=" + pagenum +"&status="+ status);


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
   $("#userData").load("partials/supplier_page_data.php?page=1&status=", Hide_Load());
   //Pagination Click
   
   });


</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("supp_tbl");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
 td2 = tr[i].getElementsByTagName("td")[2];
 td3 = tr[i].getElementsByTagName("td")[3];
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
                        url: url+'/supplierAction.php',
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
                url: url+'/supplierAction.php',
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

                }
            }
            $.ajax({
                type: 'POST',
                url: url+'/supplierAction.php',
                data: userData,
                success: function (msg) {

                    console.log(msg);
                    if (msg == 'ok') {
                        alert('Suppliers has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                       $('#userForm1')[0].reset();
                        $('#addForm').hide();
                        loadpage('listsuppliers');
                    } else if (msg == 'updated') {
                        alert('Suppliers has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        //$('#editForm').hide();
                        //$('#display').hide();
                        //$('#header').show();
                        //$('#show1').show();
                        loadpage('listsuppliers');

                    } else if (msg == 'update') {
                        alert('Suppliers has been ' + statusArr[type] + ' successfully.');
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
                url: url+'/supplierAction.php',
                data: 'action_type=data&id=' + id,
                success: function (data) {
					console.log(data);
                    $('#supplier_id').val(data.supplier_id);
                    $('#supplier_cmpny_name').val(data.supplier_cmpny_name);
                    $('#supplier_contact_person').val(data.supplier_contact_person);
                    $('#supplier_email').val(data.supplier_email);
                    $('#supplier_phone').val(data.supplier_phone);
                    $('#supplier_address').val(data.supplier_address);
$('#supplier_city').val(data.supplier_city);
$('#supplier_state').val(data.supplier_state);
$('#supplier_pincode').val(data.supplier_pincode);
$('#supplier_pan').val(data.supplier_pan);
$('#supplier_gst').val(data.supplier_gst);
                    $('#editForm').show();
                }
            });
        }
        function viewuser(id) {
            $.ajax({
                type: 'POST',
                url: url+'/supplierAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
                    console.log(data);
                    var data = JSON.parse(data);
                    $('#dis-emp-id').val(data.supplier_id);
                    $('#emp_first_name').html(data.supplier_cmpny_name);
                    $('#emp_contact').html(data.supplier_contact_person);
$('#emp_email').html(data.supplier_email);
                    $('#emp_address').html(data.supplier_address);
$('#emp_phoneno').html(data.supplier_phone);
                    $('#emp_city').html(data.supplier_city);
$('#emp_salary').html(data.emp_salary);
$('#emp_state').html(data.supplier_state);
$('#emp_pincode').html(data.supplier_pincode);
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
	
var length=$("input.supplier_checkbox:checked").length;
	
$("#select_count").html($("input.supplier_checkbox:checked").length+" Selected");	

}
        $('#select_all').on('click', function (e) {
            if ($(this).is(':checked', true)) {
                $(".supplier_checkbox").prop('checked', true);
            } else {
                $(".supplier_checkbox").prop('checked', false);
            }
            // set all checked checkbox count
            $("#select_count").html($("input.supplier_checkbox:checked").length + " Selected");
        });
        // set particular checked checkbox count
        $(".supplier_checkbox").on('click', function (e) {
            $("#select_count").html($("input.supplier_checkbox:checked").length + " Selected");
        });
    </script>
    <script>
        $(document).ready(function () {

            $('#inactive').click(function () {
                //alert('hi');
                var post_arr = [];
                $('#supp_tbl input[type=checkbox]').each(function () {
                    if (jQuery(this).is(":checked")) {
                        var id = this.id;
                        //alert(id);
                        post_arr.push(id);

                    }
                });

                if (post_arr.length > 0) {
                    // AJAX Request
                    $.ajax({
                        url: url+'/inactive_action_supplier.php',
                        type: 'POST',
                        data: {emp_id: post_arr},
                        success: function (response) {
                            getUsers();
                            loadpage('listsuppliers');

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
                $('#supp_tbl input[type=checkbox]').each(function () {
                    if (jQuery(this).is(":checked")) {
                        var id = this.id;
                        post_arr.push(id);

                    }

                });

                if (post_arr.length > 0) {
                    // AJAX Request
                    $.ajax({
                        url: url+'/active_action_supplier.php',
                        type: 'POST',
                        data: {emp_id: post_arr},
                        success: function (response) {

                            getUsers();
                            loadpage('listsuppliers');

                        }
                    });
                }
            });

        });
    </script>
    <script>
        $("#userForm1").validate({

            rules: {
                cname: {

                    required: !0

                },
                

                cpname: {

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
   GST: {
                    required: !0

                },
   pan: {
                    required: !0

                },

                salary: {
                    required: !0

                },

                sal_type: {
                    required: !0

                },

            },
            messages: {
                cname: "Please enter 	Company name",
                /*   
                 lname: "Please enter employee last name",*/
                email: "Please select email id",
                phone: "Please enter phone number",
                address: "Please enter address", 
GST: "Please enter gst number",
                pan: "Please enter pan number",
             

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

