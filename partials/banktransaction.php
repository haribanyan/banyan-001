<!-- START PAGE CONTENT-->

<?php include"dbconfig.php"; ?>
<style type="text/css">
    .none{display: none;}
</style>
<div class="page-content fade-in-up">
    <div class="col-md-12">
    </div>
    <div class="ibox none" id="addForm">
        <div class="ibox-head">
            <div class="ibox-title">Add transaction details</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm1" method="post" novalidate="novalidate">
                <div class="ibox-body control-group" >
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Account name</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="trnsacc_name">
                                <?php
                                include '../config/DB.php';
                                $db = new DB();
                                $users = $db->getRows('tbl_bnk', array('order_by' => 'bnk_id DESC'));
                                ?>
                                <option value="">-Select-</option>
                                <?php foreach ($users as $user) { ?>     
                                    <option value="<?php echo $user['bnk_id']; ?>"><?php echo $user['bnk_alname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Transaction Type</label>
						 <div class="col-sm-6">
						 <label class="radio radio-grey radio-primary radio-inline">
                          <input name="trns_type" value="Credit" type="radio">
                          <span style="margin-top:px" class="input-span"></span>Credit</label>
                          <label class="radio radio-grey radio-primary radio-inline">
                          <input name="trns_type" value="Debit" type="radio">
                          <span style="margin-top:px" class="input-span"></span>Debit</label>
						  <label class="radio radio-grey radio-primary radio-inline">
                          <input name="trns_type" value="Others" type="radio">
                          <span style="margin-top:px" class="input-span"></span>Others</label>
                       </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Transaction</label>
                        <div class="col-sm-6" style="height:auto">
                            <input class="form-control" type="text" name="trns_frm" style="font-family: Poppins"  placeholder="Transaction">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Transaction Date</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="date" style="font-family: Poppins" name="trns_date" placeholder="Transaction Date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Amount</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="number" name="trns_amnt" style="font-family: Poppins" placeholder="Amount">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').hide();$('#tbl').show()">Back</a>
                            <div class="form-group row" style="margin-top:-37px;margin-left:-80px">
                                <div class="col-sm-10 ml-sm-auto" >
                                    <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('add');">Submit</a>
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
            <div id="customer-id" class="ibox-title"><h4></h4></div>
            <div style="float:right;">
                <input type="hidden" name="customer-id" value="" id="dis-customer-id">
                <a href="javascript:void(0);" id="customer_id" class="btn btn-primary"style="margin-right:10px"  onclick="editUser(document.getElementById('dis-customer-id').value)">Edit</a>
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
                                <b><span><p id="customer-name">  </p></span></b><br></div>
                        </div>
                        <br>
                        <h6 style="border-bottom:1px solid #eee;">Address</h6>
                        <span><p id="customer-address"> </p></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ibox none" id="editForm">
        <div class="ibox-head">
            <div class="ibox-title">Edit bank details</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm2" method="post" novalidate="novalidate">
                <div class="ibox-body control-group" >
                    <input type="hidden" value="" name="id" id="idEdit">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Account name</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="trnsacc_name" style="font-family: Poppins" id="nameEdit"  placeholder="Account name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Transaction Type</label>
                        <input type="radio" name="trns_type" style="margin-left:10px;margin-top:5px" id="" value="Credit">Credit
                        <input type="radio" name="trns_type" style="margin-left:10px;margin-top:5px" value="Debit">Debit
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">From</label>
                        <div class="col-sm-6" style="height:auto">
                            <input class="form-control" type="text" name="trns_frm" style="font-family: Poppins" id="fromEdit"  placeholder="From">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Transaction Date</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="date" style="font-family: Poppins" name="trns_date" id="dateEdit" placeholder="Transaction Date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Amount</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="trns_amnt" style="font-family: Poppins" id="amountEdit"placeholder="Amount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').hide();$('#tbl').show();">Back</a>
                            <div class="form-group row" style="margin-top:-37px;margin-left:-80px">
                                <div class="col-sm-10 ml-sm-auto" >
                                    <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('edit');">Submit</a>
                                </div>
                            </div>
                        </div> 
                    </div>				
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div id="tbl">
            <div class="ibox ibox-fullheight" >
                <div class="ibox-head" id="trns">
                        <div class="ibox-title">
                            <span style="font-family: Poppins">Bank Transactions</span>
                        </div>
                        <div style="float:right ">
                            <span><a href="javascript:void(0);" class="btn btn-primary" onclick="$('#addForm').show();$('#tbl').hide();">+ NEW</a></span>
                        </div>                
                    </div>
					 <div class="ibox-head">
					 <div class="row" style="padding:10px">
					<label class="col-sm-4 col-form-label">Transaction Date</label>
					<label class="col-sm-4 col-form-label">Alias Name</label>
					<label class="col-sm-4 col-form-label">Transaction Type</label>
					<div class="col-sm-4">
					 <input type="date" style="font-family: Poppins;" class=" form-control" id="fil-date">
					</div>
					
					<div class="col-sm-4">
							<select class="form-control" style="font-family: Poppins;width:250px;" id="fil-alname">
                                 <?php
                               $users = $db->getRows('tbl_bnk', array('order_by' => 'bnk_id DESC'));
                                ?>
                                <option value="">-Select-</option>
                                <?php foreach ($users as $user) { ?>     
                                    <option value="<?php echo $user['bnk_id']; ?>"><?php echo $user['bnk_alname']; ?></option>
                                <?php } ?>
                            </select></div>
							<div class="col-sm-4">
							<select class="form-control" style="font-family: Poppins;width:250px" id="fil-ttype">
                            <option value="">-Select-</option>
                               <option value="Credit">Credit</option>
                               <option value="Debit">Debit</option>
							   <option value="Others">Others</option>							   
                            </select></div>
				           
					 </div>
					
					 </div>
					  
                <div id="dis-tbl">
				 <table class="table table" id="emp_tbl">
                    <thead>
                        <tr>
                             <th>Account name</th>
							 <th>Transaction Type</th>
							<th>Transaction</th>
							<th>Transaction Date</th>
							<th>Amount</th>
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
function call(pagenum){
//alert(pagenum);
   $("#userData").load("partials/bank_page_data.php?page=" + pagenum +"&status="+ status);


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
   $("#userData").load("partials/bank_page_data.php?page=1", Hide_Load());
   //Pagination Click
   
   });


</script>
	<script>
	$(document).ready(function ()
        {
			$('#fil-alname,#fil-date,#fil-ttype').on('change', function ()
            {
				var al_name=$('#fil-alname').val();
				var date=$('#fil-date').val();
				var ttype=$('#fil-ttype').val();
				$.ajax({
                type: 'POST',
                url: 'http://localhost/crm/sverp/partials/transactionTable.php',
                data: 'al_name='+al_name+"&ttype="+ttype+"&date="+date,
                success: function (data) {
					$('#dis-tbl').html(data);
				}
				 });
		})
		});
	</script>
	
    <script type="text/javascript">
	var url = "<?php echo $homeDir; ?>";
        function getUsers() {
            $.ajax({
                type: 'POST',
                url: url+'/trnaction.php',
                data: 'action_type=view&' + $("#userForm1").serialize(),
                success: function (html) {
                    $('#userData').html(html);
                }
            });
        }
        function userAction(type, id) {
            id = (typeof id == "undefined") ? '' : id;
            var statusArr = {add: "added", edit: "updated", updateactive: "activated", updateinactive: "Deactivated"};
            var userData = '';
            if (type == 'add') {
                userData = $("#userForm1").serialize() + '&action_type=' + type;

            } else if (type == 'edit') {
                userData = $("#userForm2").serialize() + '&action_type=' + type;
            } else {
                userData = 'action_type=' + type + '&id=' + id;
            }
			
            $.ajax({
                type: 'POST',
                url: url+'/trnaction.php',
                data: userData,
                success: function (msg) {
					alert(msg);
					
                    if (msg == 'ok') {
                        alert('Bank data has been ' + statusArr[type] + ' successfully.');
                        $('#userForm1')[0].reset();
                        $('#addForm').hide();
                        loadpage('banktrasaction');
                    } else if (msg == 'updated') {
                        alert('Transaction data has been ' + statusArr[type] + ' successfully.');
                        $('#userForm2')[0].reset();
                        $('#editForm').hide();
                         loadpage('banktrasaction');
                    } else if (msg == 'update') {
                        alert('Transaction data has been ' + statusArr[type] + ' successfully.');
                    } else if (msg == 'err') {
                        alert('Some problem occurred, please try again.');
                    }
                }
            });
        }
        function editUser(id) {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: url+'/trnaction.php',
                data: 'action_type=data&id=' + id,
                success: function (data) {
                    $('#display').hide();
                    $('#idEdit').val(data.trns_id);
                    $('#nameEdit').val(data.trnsacc_name);
                    $('#fromEdit').val(data.trns_frm);
                    $('#dateEdit').val(data.trns_date);
                    $('#amountEdit').val(data.trns_amnt);
                    $('#editForm').show();
                }
            });
        }
        function viewuser(id) {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: url+'/trnaction.php',
                data: 'action_type=data&id=' + id,
                success: function (data) {
                    console.log(data);
                    $('#display').show();
                    $('#dis-customer-id').val(data.trns_id);
                    $('#customer-name').html(data.trnsacc_name);
                    $('#customer-address').html(data.trns_type);
                    $('#tbl').hide();
                }
            });
        }
		function loadpage(page)
        {
            $("#main").load("partials/" + page + ".php");
        }
    </script>	
    <script src="assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $("#userForm1").validate({
            rules: {
                bank_name: {
                    required: !0
                },
                bank_type: {
                    required: !0
                },
                bank_branch: {
                    required: !0
                },
                bank_ifsc: {
                    required: !0
                },
                bank_acnme: {
                    required: !0
                },
                bank_alias: {
                    required: !0
                },
                bank_accno: {
                    required: !0
                },
            },
            messages: {
                bank_name: "Please enter your bank_name",
                bank_type: "Please enter your bank_type",
                bank_branch: "Please enter your bank_branch",
                bank_ifsc: "Please enter your bank_ifsc",
                bank_acnme: "Please enter your bank_acnme",
                bank_alias: "Please enter your bank_alias",
                bank_accno: "Please enter your bank_accno",
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
