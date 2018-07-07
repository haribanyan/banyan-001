<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="col-md-12">
    </div>
    <div class="ibox none" id="addForm">
        <div class="ibox-head">
            <div class="ibox-title">Add Subsidary</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm1" method="post" novalidate="novalidate">
                <div class="ibox-body control-group" >
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Subsidary ID</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="subs_id" type="hidden" name="subs_id" style="font-family: Poppins"  placeholder="
Subsidary ID">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Order Id</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="order_ids" type="hidden" name="order_id" style="font-family: Poppins" placeholder="Sales Id" maxlength="10">

                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sales Amount </label>
                        <div class="col-sm-6">
                            <input class="form-control" id="author_num" type="text" name="sales_amount" style="font-family: Poppins" placeholder="Subsidary Amount" maxlength="10">

                        </div>
                    </div>
					
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Subsidary Status </label>
                        <div class="col-sm-6">
                             <select class="form-control " name="status" style="font-family: Poppins;height:40px" placeholder="Subsidary"  requireds>
                                <option value="">Status</option>
                                <option value="">Paid by Check Or Cash</option>
                                <option value="">Date Applied</option>
                                <option value="">Date Approved</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Check Number</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" style="font-family: Poppins" name="Check Number" placeholder="Check Number">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                         
							
                            <div class="form-group row" style="margin-top:-37px;margin-left:-80px">
                                <div class="col-sm-10 ml-sm-auto" >
                                    <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('add');";>Submit</a>
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
            <div id="customer-id" class="ibox-title"><b>Sales Id -<span><p id="order_ids"style="margin-left:80px;margin-top:-23px">  </p></span></b></div>
            <div style="float:right;">
                <input type="hidden" name="customer-id" value="" id="dis-subs-id">
                <a href="javascript:void(0);" id="customer_id" class="btn btn-primary"style="margin-right:10px"  onclick="editUser(document.getElementById('dis-subs-id').value);$('#display').hide();$('#editForm').show()">Edit</a>
               
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
                            <div class="col-sm-12">		    <b><span><p id="customer-name">  </p></span></b><br><body>
<table class="tle"   style="font-family: poppins;border-collapse: collapse;width: 200%;" >
  <tr>
    <th  style="border: 1px solid #dddddd;text-align: left;padding: 8px;" >Order Id</th>
    <th  style="border: 1px solid #dddddd;text-align: left;padding: 8px;" >Order Date</th>
    <th  style="border: 1px solid #dddddd;text-align: left;padding: 8px;" >Sales Amount</th>
	<th  style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><b>Subsidary Amount</b></th>
        
  </tr><tr  style="background-color: #dddddd">
        <td  style="border: 1px solid #dddddd;text-align: left;padding: 8px;"id="orderids"></td>
        <td  style="border: 1px solid #dddddd;text-align: left;padding: 8px;" id="order_ids">	</td>
        <td  style="border: 1px solid #dddddd;text-align: left;padding: 8px;"id="sales_ids"></td>
        <td  style="border: 1px solid #dddddd;text-align: left;padding: 8px;"id="subamnt"></td>
       
        
        </tr><style>



</style>
 

</table  ><br><br>
<b style="fontsize:20px">Payment Table</b><br><br>
<table class="tle"  style="font-family: poppins;border-collapse: collapse;width: 200%;" >
  <tr>
    <th  style="border: 1px solid #dddddd;text-align: left;padding: 8px;" >Payment Type </th>
    <th  style="border: 1px solid #dddddd;text-align: left;padding: 8px;" >Check No</th>
    <th  style="border: 1px solid #dddddd;text-align: left;padding: 8px;" >Payment Date</th>
	
  </tr><tr  style="background-color: #dddddd">
        
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;" id="patype"></td>
        <td  style="border: 1px solid #dddddd;text-align: left;padding: 8px;"id="cash"></td>
        <td  style="border: 1px solid #dddddd;text-align: left;padding: 8px;"id="paydate"> </td>
        
        </tr>
 

</table>
</body>
                            


</div>
                        </div>
                        <br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox none" id="editForm">
        <div class="ibox-head">
            <div class="ibox-title">Edit Subsidary</div>
        </div>
        <div class="ibox-body">
          <form class="form-horizontal" id="userForm2" method="post" novalidate="novalidate">
                <div class="ibox-body control-group" >
                  
					<div class="form-group row">
                        
                        <div class="col-sm-6">
                            <input class="form-control" id="Editsubs" type="hidden" name="subs_id" style="font-family: Poppins" placeholder="Subsidary Amount">

                        </div>  </div>
						<div class="form-group row">
                       
                        <div class="col-sm-6">
                            <input class="form-control" id="orderids" type="hidden" name="order_id" style="font-family: Poppins" placeholder="Subsidary Amount">

                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Subsidary Amount </label>
                        <div class="col-sm-6">
                            <input class="form-control" id="subamt" type="text" name="sub_amt" style="font-family: Poppins" placeholder="Subsidary Amount">

                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Subsidary Status </label>
                        <div class="col-sm-6">
                             <select class="form-control" name="status" id="sasub" style="font-family:Poppins;height:40px" placeholder="status">
                                <option value="0">Not Applied</option>
                                <option value="1">Applied</option>
                                <option value="2">Approved</option>
                                <option value="3">Rejected</option>
								<option value="4">On Hold</option>
								<option value="5">Payment Done</option>
                            </select>

                        </div>
                    </div>
						<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Payment Type </label>
                        <div class="col-sm-6">
                             <select class="form-control" name="pay_type" id="paype" style="font-family: Poppins;height:40px" placeholder="status"  >
                                <option value="Cash">Cash</option>
                                <option value="Check">Check </option>
                            </select>

                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Check Number </label>
						      <div class="col-sm-6">
                       <input class="form-control" id="chenum" type="text" name="cheque_no" style="font-family: Poppins" placeholder="Check Number">
                    </div>
  </div>
	<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Payment Date</label>
						      <div class="col-sm-6">
                       <input class="form-control " id="padate1" type="date" name="pay_date" style="font-family: Poppins" placeholder="Check Number">
                    </div>
  </div>

                    
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                           <div class="form-group row">
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('edit')">Update</a>
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
			
                <div id="header">
                    <div class="ibox-head" >
                        <div class="ibox-title">
                           <!-- <select style="font-family: Poppins" id="customer_status">
                                <option value="">All Customers</option>
                                <option value="1">Active Customers</option>
                                <Option value="0">Inactive Customers</option>
                            </select>
                                <span class="rows_selected" style="margin-left:10px" id="select_count">0 Selected</span>-->
								<span><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Order Id,Customer Nmae.." title="Type in a name" style="font-family:poppins;width:300px"></span>
								
                        </div>
                      <div style="float:right !important">
				 
                    </div></div>
                <div id="show"></div>
                <div id="show1">
                    <div class="">
                        <table class="table table" id="emp_tbl" style="background-color:none;border:0px">
                            <thead  >
                                <tr >
                                   
									<th >Subsidary Id</th>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Subsidary Amount</th>
                                    <th>Subsidary Status</th>
                                </tr>
                                
                            </thead>
                            <tbody id="userData">
                               
                            </tbody>
                        </table>
                        <div id="tbl-active"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('#status').on('change', function ()
            {
                $('#show1').hide();
                var status = $(this).val();
                if (status)
                {
                    $.ajax({type: 'POST',
                        url: 'http://www.intellyticshub.com/svt_crm/dev/partials/subsidary_status.php',
                        data: 'status=' + status,
                        success: function (data)
                        {
                            $('#show').html(data);
                            $('#show').show();
                        }});
                } else
                {
                    $('#show').hide();
                    $('#show1').show();
                }
            })
        });
    </script>
    <script>
        function getUsers() {
            $.ajax({
                type: 'POST',
                url: 'http://www.intellyticshub.com/svt_crm/dev/partials/subaction.php',
                data: 'action_type=view&' + $("#userForm1").serialize(),
                success: function (html) {
                    $('#userData').html(html);
                }
            });
        }
        function userAction(type) {

            id = (typeof id == "undefined") ? '' : id;
            var statusArr = {add: "added", edit: "updated", delete: "deleted"};
            var userData = '';
            if (type == 'add') {
                if ($("#userForm1").valid()) {
                    userData = $("#userForm1").serialize() + '&action_type=' + type;
                }

            } else if (type == 'edit') {
                userData = $("#userForm2").serialize() + '&action_type=' + type;
                //alert(userData);
            } else {
                userData = 'action_type=' + type + '&id=' + id;
            }
//alert(userData);
            $.ajax({
                type: 'POST',
                url: 'http://www.intellyticshub.com/svt_crm/dev/partials/subaction.php',
                data: userData,
                success: function (msg) {
                    console.log(msg);
                    if (msg == 'ok') {
                        alert('Subsidary has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        $('#userForm1')[0].reset();
                         //$('#addForm').hide();
                    } else if (msg == 'updated') {
                        alert('User data has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        $('#userForm2')[0].reset();
						
                    } else if (msg == 'deleted') {
                        alert('Some problem occurred, please try again.');
                    }
                }
            });
        }
		
        function editUser(id) {
			 // alert(id); 
            $.ajax({
                type: 'POST',
              	
                url: 'http://www.intellyticshub.com/svt_crm/dev/partials/subaction.php',
                data: 'action_type=data&id=' + id,
                success: function (response) {
                  console.log(response);
				 
				  var data=$(JSON.parse(response));
				   //alert(response);
                $('#Editsubs').val(data[0].subs_id);
                 $('#subamt').val(data[0].sub_amt);
					 $('#chenum').val(data[0].cheque_no);
					 
					//$('#chenum').val('8383838');
					
					     var now = new Date(data[0].pay_date);
 
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;


   $('#padate1').val(today);
                    $('#paype').val(data[0].pay_type);
					
					
					       
$('#sasub').val(data[0].status);
 
					$('#editForm').show();
					
					
                }
            });
        }
        function viewuser(id) {
			
            $.ajax({
                type: 'POST',
                url: 'http://www.intellyticshub.com/svt_crm/dev/partials/subaction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (response) {
					//console.log(response);
					var data=$(JSON.parse(response));
					//alert(data);
                   $('#dis-subs-id').val(data[0].subs_id);
                    $('#customer-name').html(data[0].customer_name);
                    $('#orderids').html(data[0].oredr_id);
                    $('#sales_ids').html(data[0].sales_amount);
					 $('#subamnt').html(data[0].sub_amt);
					  $('#paydate').html(data[0].pay_date);
					   $('#patype').html(data[0].pay_type);
					   
						
if(data[0].cash_cheque==0){
$('#chequues').html(data[0].cheque_no);
$('#che').show();
$('#cas').hide();
}
else{
$('#cash').html(data[0].cash_amount);
$('#che').hide();
$('#cas').show();
}
      if(data[0].status==0){
$('#status_sub').html('Applied');
}  
     if(data[0].status==1){
$('#status_sub').html('Rejected');
}  
     if(data[0].status==2){
$('#status_sub').html('Hold');
}  
     if(data[0].status==3){
$('#status_sub').html('Delivered to customer');
}          

   $('#tbl').hide();
                    $('#display').show();
                }
            });
        }
    </script>	
    <script>
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
        $('#active').on('click', function (e) {
            var customers = [];
            $(".emp_checkbox:checked").each(function () {
                customers.push($(this).data('subs-id'));
            });
            if (customers.length <= 0) {
                alert("Please select records.");
            } else {
                WRN_PROFILE_DELETE = "Are you sure you want to update " + (customers.length > 1 ? "these" : "this") + " row?";
                var checked = confirm(WRN_PROFILE_DELETE);
                if (checked == true) {
                    var selected_values = customers.join(",");
                    $.ajax({
                        type: "POST",
                        url: "http://www.intellyticshub.com/svt_crm/dev/partials/activecust_Action.php",
                        cache: false,
                        data: 'subs_id=' + selected_values,
                        success: function (response) {
                            $('#tbl')[0].reset();
                            getUsers();
                        }
                    });
                }
            }
        });
    </script>
    <script>
        $('#inactive').on('click', function (e) {
            var customers = [];
            $(".emp_checkbox:checked").each(function () {
                customers.push($(this).data('subs-id'));
            });
            if (customers.length <= 0) {
                alert("Please select records.");
            } else {
                WRN_PROFILE_DELETE = "Are you sure you want to delete " + (customers.length > 1 ? "these" : "this") + " row?";
                var checked = confirm(WRN_PROFILE_DELETE);
                if (checked == true) {
                    var selected_values = customers.join(",");
                    $.ajax({
                        type: "POST",
                        url: "http://www.intellyticshub.com/svt_crm/dev/partials/inactivecust_Action.php",
                                                        cache: false,
                                                        data: 'subs_id=' + selected_values,
                                                        success: function (response) {
                                                            $('#tbl')[0].reset();
                                                            getUsers();
                                                        }
                                                    });
                                                }
                                            }
                                        });
                                    </script>
                                    <script src="assets/js/app.min.js"></script>
                                    <!-- PAGE LEVEL SCRIPTS-->
                                    <script>
                                        $("#author_num").keydown(function (e) {
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
                                    </script>	<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("emp_tbl");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
	td2 = tr[i].getElementsByTagName("td")[3];
    if (td) {
     if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1  ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script>
function call(pagenum){
//alert(pagenum);
   $("#userData").load("partials/subsipage.php?page=" + pagenum );


};
function getval(pageNum){
//alert(pageNum);
   //CSS Styles
   $("#pagination li").css({'border' : 'solid #dddddd 1px'}).css({'color' : '#0063DC'});
   $(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
   //Loading Data
   //var pageNum = this.id;
   
   //var status = $('#emp_status').val();
   //alert(status);
call(pageNum);
   };

   $(document).ready(function() {
   //Hide Loading Image
   function Hide_Load() {
   $("#loading").fadeOut('slow');
   };
   //Default Starting Page Results
   $("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
   $("#userData").load("partials/subsipage.php?page=1", Hide_Load());
   //Pagination Click
   
   });


</script>

                            </div>