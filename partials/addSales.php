<?php include"dbconfig.php"; ?>
<style type="text/css">
    #mytable { 
        -float:left;
        height:auto;
        width:auto;
        margin:0 auto;
    }
    #mytable .remove { width:35px; text-align:center;  }
    #mytable .remove input { background:url(img/trash.gif) no-repeat;  width:75px;  }
    #mytable .rproduct {   font-family: Arial,Helvetica,sans-serif;    font-size: 12px;   font-weight: 600;    padding: 0px;   width: 220px;   }
    #mytable .model {width:135px; text-align:center;   }
    #mytable .rtax{width:40px; text-align:center;  }
    #mytable .rrate{width:75px; text-align:center; }
    #mytable .rqty{width:75px; text-align:center;  }
    #mytable td { border:1px solid;}
    .hide_col { display:none; }
    .hide_col1 { display:none; color:#FFFFFF; font-size:1px; }
    .total{ width:200px; text-align:center;}
</style>
<div class="ibox none" id="display">
        <div class="ibox-head">
            <div class="ibox-title"><h4><b><span><p id="ord-no">  </p></span></b></h4></div>
            <div style="float:right;">
                
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
                        
					<table><tr><td ><b>Customer Name: </b></td><td id="fname"> </td></tr></table>
					<table><tr><td ><b>Order Date </b></td><td id="odate"> </td></tr></table>
					  <table><tr><td ><b>Sub Total: </b></td><td id="stotal"> </td></tr></table>
					  <table><tr><td ><b>GST: </b></td><td id="gst"> </td></tr></table>
					  <table><tr><td ><b>Grant Total: </b></td><td id="gtotal"> </td></tr></table><br>
				
                    </div>
					<table class="table table-bordered">
						<thead>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Discount Price</th>
						<th>total_price</th>
						<th>Subsidary Amount</th>
						<th>CGST Price</th>
						<th>SGST Price</th>
						
						</thead>
						<tbody id="dis-bank-det">
						<tbody>
                       </table>
                </div>
            </div>
        </div>
    </div>
<div class="page-content fade-in-up">
    <div class="none" id="addForm">
        <form id="userForm1" method="POST" >
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Order ID *</label>
                    <div class="col-sm-5" id="cust_select">
                        <select style="width:100%;font-family: Poppins" class="select2 form-control border-primary" name="orderid" id="orderid" onchange="getdetails()">
                            <?php
                            include '../config/DB.php';
                            $db = new DB();
							include "dbconfig.php";

                            $users = $db->getRows('tbl_sls_order', array('order_by' => 'id DESC'));
    $query = "select sls_ord_id from tbl_sls_order where sales_act='1' ";
    $res = mysqli_query($conn, $query);     
	?>
                            <option value="">-Select-</option>
                            <?php while ($user=mysqli_fetch_array($res)) { 
							?>     
                                <option value="<?php echo $user['sls_ord_id']; ?>"><?php echo $user['sls_ord_id']; ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Customer *</label>
                    <div class="col-sm-5" id="cust_select">
					
                        <select style="width:100%;font-family: Poppins" class="select2 form-control border-primary" name="customer" id="customer" onchange="getcustomer()">
                            <?php
                            $users = $db->getRows('tbl_cust', array('order_by' => 'cust_id DESC'));
                            ?>
                            <option value="">-Select-</option>
                            <?php foreach ($users as $user) { ?>     
                                <option value="<?php echo $user['cust_id']; ?>"><?php echo $user['cust_first_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                </div>
				 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Select Bank</label>
                    <div class="col-sm-5" id="cust_select">
                        <select style="width:100%;font-family: Poppins" class="select2 form-control border-primary" name="bankid" id="bankid" onchange="getdetails()">
                            <?php
                            $users = $db->getRows('tbl_bnk', array('order_by' => 'bnk_id'));
                            ?>
                            <option value="">-Select-</option>
                            <?php foreach ($users as $user) { ?>     
                                <option value="<?php echo $user['bnk_id']; ?>"><?php echo $user['bnk_alname']; ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sales Date</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="date" name="sales_date" id="sales_date" style="font-family: Poppins"  placeholder="Sales Date" value="<?php echo date('Y-m-d'); ?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sales Person</label>
                    <div class="col-sm-5">
                        <input class="form-control" disabled  type="text" name="sales_person" id="sales_person" style="font-family: Poppins"  placeholder="Sales Person">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sales Id</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="sales_id" style="font-family: Poppins" value="SVT_<?php

					
						$rows=mysqli_query($conn,"select order_no from  tbl_sales_header order by sales_id desc");
					$counts=mysqli_num_rows($rows);
						
                        $q=mysqli_fetch_array($rows);
						
$qs=$q['order_no'];
$qs= substr($qs, 4);
$qst=1;
$qst.=$qs;
if($counts>0){
                      $m=$qst+1;
					  echo  substr ($m, 1);
}else{
	echo "0001"; 
} ?>"" placeholder="Sales Id" readonly="readonly">
                    </div>
                </div>
				
                <div id="show_details" name="show_details" >
                    <div class="form-group mb-4 row">
                        <table class="table table-bordered"id="mytable" style="display:none">
                            <thead class="thead-default">
                                <tr>
                                    <th>Product Details</th>
                                    <th>Quantity</th>
                                    <th>Subsidary</th>
                                    <th>Rate</th>
									<th>Amount</th>
                                    <th>CGST(%)</th>
									<th>CGST Amount</th>
									<th>SGST(%)</th>
                                    <th>SGST Amount</th>
									<th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody id="scents">
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="1" >
                        <tbody id="mytable">
                        </tbody>
                    </table>
                    <div class="col-md-6 pull-right" id="calctable" style="display:none">
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="userinput2"><strong style="font-size:15px;font-family: Poppins">Sub Total</strong> </label>
                            <div class="col-md-8">
                                <input type="hidden" class="form-control" id="sub_totals" name="sub_totals"  value="" placeholder="Sub Total">
                                <span style="float:left; font-size:15px;margin-left:200px;">RS.</span>
                                <div style="float:left;font-size:15px;" id="sub_total" >0</div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="userinput2"><strong style="font-size:15px;font-family: Poppins">GST</strong> </label>
                            <div class="col-md-8">
                                <input type="text" style="width:150px;font-family:poppins;margin-left:-50px;visibility:  hidden;" onfocusout="showSubTotal()" class="form-control" id="gsttt" name="gsttt" placeholder="GST">
                                <span style="float:left;margin-left:200px;margin-top:-40px; font-size:15px;">RS.</span>
                                <div style="float:left;font-family:poppins;font-size:15px;margin-left:220px;margin-top:-40px" id="discount_totals">0</div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="userinput2"><strong style="font-size:15px;font-family: Poppins">Discount%</strong> </label>
                            <div class="col-md-8">
                                <input type="text" style="width:150px;margin-left:-50px"  class="form-control" value=""  id="distotals" name="distotals" placeholder="Discount" onchange="calculate()">
                                <input type="hidden" style="width:150px;margin-left:-50px"  class="form-control" value=""  id="disctotals" name="disctotals" placeholder="Discount" onchange="calculate()">

                                <span style="float:left;margin-left:200px; font-size:15px;margin-top:-40px">RS.</span>
                                <div style="float:left;font-size:15px;margin-left:220px;margin-top:-40px" id="distotal">0</div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row" >
                            <label class="col-md-4 label-control" for="userinput2"><strong style="font-size:15px;font-family: Poppins">Total</strong> </label>
                            <div class="col-md-8">
                                <input type="hidden" style="width:150px;margin-left:-50px"  class="form-control" value=""  id="grand_totalss" name="grand_totalss" placeholder="Grand Total">
                                <span style="float:left;margin-left:200px; font-size:15px;">RS.</span>
                                <div style="float:left;font-size:15px;" id="grand_total">0</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 label-control" for="userinput2">&nbsp;</label>
                            <div class="form-group row pull-right">
                                <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('add');">Submit</a>    
                            </div>
                        </div>
                        </form>
                    </div>
                </div>	
            </div>
        </form>
    </div>
</div>

<div class="ibox none" id="display">
            <!--<div class="ibox-head">
                <div id="prod_name" class="ibox-title"><h4></h4></div>
                <div style="float:right;">
				<input type="hidden" name="sal_id" value="" id="dis-sal-id">
                    <a href="javascript:void(0);" id="prod_id" class="btn btn-primary" onclick="editUser(document.getElementById('dis-sal-id').value);$('#display').hide();" >Edit</a>
                    <span>
                        <a href="javascript:void(0);" class="btn btn-info file-input mr-2" onclick="return confirm('Are you sure to update data?') ? userAction('updateactive', document.getElementById('dis-sal-id').value) : false;" style="max-width:50%">Mark as Active</a>
                    </span> 
                    <span>
                        <a href="javascript:void(0);" class="btn btn-info file-input mr-2" onclick="return confirm('Are you sure to update data?') ? userAction('updateinactive', document.getElementById('dis-sal-id').value) : false;" style="max-width:50%;">Mark as InActive</a>
                    </span>
                </div>
            </div>-->
            <div class="ibox-head" style="border:0px">
                <div class="ibox-title"><p style="border-bottom:3px solid #007bff;margin-bottom:-23px">Overview</p></div>
            </div>
            <div class="ibox-body">
                <div class="rickshaw_graph" id="rickshaw_scatterplot">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <b><span><p id="cust-name">  </p></span></b><br></div>
                            </div>
                            <br>
                            <h6 style="border-bottom:1px solid #eee;">Invoice Number</h6>
                            <span><p id="inv-num"> </p></span>
							  <h6 style="border-bottom:1px solid #eee;">Sales date</h6>
							<span><p id="sal-date"> </p></span>
							  <h6 style="border-bottom:1px solid #eee;">Discount Total</h6>
							<span><p id="dis-total"> </p></span>
							  <h6 style="border-bottom:1px solid #eee;">Grand Total</h6>
							<span><p id="gran-tot"> </p></span>
							  				
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
<div class="col-md-12">
    <div id="tbl">
        <div class="ibox ibox-fullheight">
            <div id="header">
                <div class="ibox-head">
                    <div class="ibox-title">
                    </div>
                    <div style="float:right ">
                        <span><a href="javascript:void(0);" class="btn btn-primary" onclick="$('#addForm').show();$('#tbl').hide()">+ NEW</a></span></div>                
                </div>
                <div class="ibox-head">
                    <div class="row" style="padding:10px">
                        <label class="col-sm-4 col-form-label">Serach by Customer & Invoice No</label>
                        <label class="col-sm-4 col-form-label">Invoice Date</label>
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-4">
                            <input type="text" onkeyup="myFunction()" placeholder="Search for Customer.." style="font-family: Poppins;" class=" form-control" id="myInput">
                        </div>

                        <div class="col-sm-4">

                            <input type="date" style="font-family: Poppins;" class="form-control" id="bill-date" onchange="getBdate(this.value)">

                        </div>
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" class="btn btn-warning"  onclick="remFilter();">Clear Filter</a>
                        </div>
                    </div>

                </div>
            </div>
            <div id="show"></div>
            <div id="show1">
                <div class="">
                    <table class="table table" id="emp_tbl">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Invoice Number</th>
                                <th>Sales Date</th>
                                <th>Discount Total</th>
                                <th>Grant Total</th>
								</tr>
                        </thead>
                        <tbody id="userData"></tbody>
                    </table>
                    <div id="tbl-active"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function call(pagenum) {
        $("#userData").load("partials/sls_page_data.php?page=" + pagenum + "&status=" + status);
    }
    ;
    function getval(pageNum) {
        $("#pagination li").css({'border': 'solid #dddddd 1px'}).css({'color': '#0063DC'});
        $(this).css({'color': '#FF0084'}).css({'border': 'none'});
        call(pageNum);
    }
    ;

    $(document).ready(function () {
        function Hide_Load() {
            $("#loading").fadeOut('slow');
        }
        ;
        $("#pagination li:first").css({'color': '#FF0084'}).css({'border': 'none'});
        $("#userData").load("partials/sls_page_data.php?page=1", Hide_Load());

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
            td = tr[i].getElementsByTagName("td")[0];
            td1 = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
var url = "<?php echo $homeDir; ?>";
    function getBdate(val) {

        $.ajax({
            type: 'POST',
            url: url+'/salsTable.php',
            data: 'bdate=' + val,
            success: function (data) {
				//alert(response);
                $('#emp_tbl').hide();
                $('#tbl-active').html(data);
            }
        });
    }
    function remFilter() {
        loadpage('addSales');
    }
    function getDdate(val) {

        $.ajax({
            type: 'POST',
            url: url+'/salsTable.php',
            data: 'ddate=' + val,
            success: function (data) {
                $('#emp_tbl').hide();
                $('#dis-tbl').html(data);
            }
        });
    }
</script>
<script>
    function userAction(type) {
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
            var result = confirm("Want to delete?");
            if (result) {
                userData = 'action_type=' + type + '&id=' + id;
            }
        }
		console.log(userData);
        $.ajax({
            type: 'POST',
            url: url+'/sls_action.php',
            data: userData,
            success: function (response) {
				
				console.log(response);
                if (response.includes('deleted')) {
                    alert('Sales data has been ' + statusArr[type] + ' successfully.');
                    loadpage('addSales');
                } else if (response.includes('inserted')) {
                    alert('Sales data has been added successfully.');
                    loadpage('addSales');
                }
            }

        })
    }
    function loadpage(page)
    {
        $("#main").load("partials/" + page + ".php");
    }
	function viewuser(id) {
		alert(id);
            $.ajax({
                type: 'POST',
               
                url: url+'/sls_action.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
					var data=JSON.parse(data);
					alert(data);
                    $('#').val(data[0].);
                    $('#').html(data[0].);
					$('#').html(data[0].);
					$('#').html(data[0].);
                    $('#').html(data[0].);
					$('#').html(data[0].);
					$('#').html(data[0].);
					$('#').html(data[0].);
					$('#').html(data[0].);
					$('#').html(data[0].);
					$('#').html(data[0].);
					$('#').html(data[0].);
				
					for (i = 0; i < data.length; i++) {
				    console.log(i);
                    $('#dis-bank-det').append("<tr><td class='bank_name'>"+ data[i].bank_name +" </td><td class='branch_name'>"+ data[i].branch_name +" </td><td class='acc_type'>"+ data[i].acc_type +" </td><td class='acc_no'>"+ data[i].acc_no +" </td><td class='acc_name'>"+ data[i].acc_name +" </td><td class='ifsc'>"+ data[i].ifsc +" </td></tr>");
                    
					}
                    $('#tbl').hide();
                    $('#display').show();
                }
            });
        }
</script>
<script>
    $(document).ready(function () {
        $('#addScnt').click(function () {
            var rowCount = $('#scents tr').length;
            var s = '<?php $users = $db->getRows('tbl_prod', array('order_by' => 'prod_id DESC')); ?>  <option value="">-Select-</option><?php foreach ($users as $user) { ?><option value="<?php echo $user['prod_id']; ?>"><?php echo $user['prod_name']; ?></option><?php } ?></select>';
            $('<tr id=' + rowCount + '><td><select style="width:100%;" onchange="check(' + rowCount + ')" class=" required form-control "  name="item[]" id="item' + rowCount + '" >' + s + '</select></td><td><input class="form-control"type="text"name="quant[]" id="quant' + rowCount + '"></td><td><input class="form-control"type="text"name="quant[]" id="quant' + rowCount + '"></td><td><input  type="text" name="rate[]" id="rate' + rowCount + '"  required class="form-control"></td><td><input class="form-control"type="text"name="cgst[]" onfocusout="showSubTotal()"  id="cgst' + rowCount + '"></td><td><input class="form-control"type="text"name="sgst[]" id="sgst' + rowCount + '"></td><td><input class="form-control"type="text"name="amount[]" id="amount' + rowCount + '"></td></tr>').appendTo('#scents');
            $("#idt").val(rowCount);
        });
    });
    function remove(i)
    {
        $("#" + i).remove();
    }
</script>
<script>
    $("#invoice,#qty,#gst_totals,#discount_total,#rate0,#gst0,#quant0,#amount0").keydown(function (e) {
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
    function test() {
        var rows = $("#idt").val();
        for (var i = 0; i <= rows; i++) {
            var quantity = $("#quant" + i).val();
        }
    }

    function showSubTotal()
    {
        var total = 0.00;
        var gsty = 0.00;
        var main = 0.00;
        var rows = $("#idt").val();
        for (var i = 0; i <= rows; i++) {
            var quantity = $("#quant" + i).val();
            var rate = $("#rate" + i).val();
            if (quantity == "") {
                alert("Please Enter Qty");
                var gst = $("#gst" + i).val('');
                return false;
            }
            var rate = $("#rate" + i).val();
            if (rate == "") {
                alert("Please Enter rate");
                var gst = $("#gst" + i).val('');
                return false;
            }
            var gst = $("#gst" + i).val();
            var discount = $("#discount_total").val();
            var totals = +quantity * +rate;
            var totaly = +quantity * +rate;
            //sub total
            total = +totals + +total;
            if (gst > 0) {
                var gsts = (+totaly * +gst) / 100;

            } else {
                gsts = 0;
            }

            var gstmain = $("#gst_totals").val();
            gsty = +gsty - +gsts;
            var amount = +totals - +gsts;
            main = +main + +amount;
            $("#amount" + i).val(amount);
        }
        $("#sub_total").html(total);
        $("#sub_totals").val(total);
        $("#gst_total").html(gsty);
        $("#gst_totals").val(gsty);
        if (discount > 0) {
            var discounty = (+total * +discount) / 100;

        } else {
            discounty = 0;
        }
        if (discounty > 0) {
            main = +main + +discounty;
        }
        $("#discount_totals").html(discounty);
        $("#discount_total").val(discounty);
        $("#grand_total").html(main);
        $("#grand_totalss").val(main);
    }
    function check(j) {
        var rows = $("#idt").val();
        for (var i = 0; i <= rows; i++) {
            var items = $("#item" + i).val();
            var check_item = $("#item" + j).val();
            if (i != j) {
                if (items == check_item) {
                    alert("already exists");
                    $("#item" + j).val('');
                    return false;
                }
            }
        }
    }

    function getComboA(selectObject) {
        var idk = selectObject.value;
    }
    
	function getcustomer(){
		var customer = $("#customer").val();
		$.ajax({
            type: 'POST',
            url: url+'/getorders.php',
			  data: 'id=' + customer,
            success: function (data) {
				 $("#orderid").html('');
				 console.log(data);
			
				 $("#orderid").html(data);
			}
		});
	}
    function getdetails() {
        var orderid = $("#orderid").val();
		
        $('#calctable').show();
        $.ajax({
            type: 'POST',
            url: url+'/getorder.php',
            data: 'id=' + orderid,
            success: function (data) {
				
				$('#mytable').show();
                $('#calctable').show();
                console.log(data);
                console.log(orderid);
                var data = JSON.parse(data);
                $('#customer').val(data.cust_id);
                $('#scents').html('');
                $('#sales_person').val(data.sls_person);
                $('#sub_total').html(data.sub_total);
                $('#discount_totals').html(data.gsts);
                $('#gsttt').val(data.gsts);
              
                $('#grand_total').html(data.grand_total);
                $('#grand_totalss').val(data.grand_total);
                var response = data.product_detail;

                var responses = response.length;
                for (i = 0; i < responses; i++) {
                    rowCount = i;
                    var name = response[i].prod_name;
                    var prod_id = response[i].prod_id;
					//alert(response[i].cgamt);					
                    //console.log(response);
                    var qty = response[i].prod_qty;
					var price = response[i].prod_price;
                    var cgst = response[i].prod_cgst;
					var sgst = response[i].prod_sgst;
                    var total_amt = response[i].total_amt;
					 var cgamt = response[i].cgamt;
					  var sgamt = response[i].sgamt;
					  var grantamt=response[i].granttot;
                    var subsidy = response[i].prod_subsidy;
                    $('<tr id=' + rowCount + '><td><input type="hidden" name="prod_id[]" value="'+prod_id+'"><input class="form-control"type="text"name="item[]" id="item' + rowCount + '" value= "' + name + '"></td><td><input class="form-control"type="text"name="quant[]" id="quant' + rowCount + '" value="' + qty + '"></td><td><input class="form-control"type="text"name="subsidary[]" id="subsidary' + rowCount + '" value="' + subsidy + '"></td><td><input class="form-control"type="text"name="price[]" id="price' + rowCount + '" value="' + price + '"></td><td><input class="form-control"type="text"name="amount[]" id="amount' + rowCount + '" value="' + total_amt + '"></td><td><input class="form-control"type="text"name="cgst[]"  value="' + cgst + '"  id="cgst' + rowCount + '"></td><td><input class="form-control"type="text"name="cgamount[]" id="cgamount' + rowCount + '" value="' +cgamt + '"></td><td><input class="form-control"type="text"name="sgst[]"  value="' + sgst + '"  id="sgst' + rowCount + '"></td><td><input class="form-control"type="text"name="sgamount[]" id="sgamount' + rowCount + '" value="' +sgamt + '"></td><td><input class="form-control"type="text"name="grantamt[]" id="grantamt' + rowCount + '" value="' +grantamt + '"></td></tr>').appendTo('#scents');

                }

            }
        });
    }
    function calculate() {
        var grandtotal = $('#grand_totalss').val();
        var distotal = $('#distotals').val();
        var total = (+grandtotal * +distotal) / 100;
        var final_total = +grandtotal - +total;
        $('#grand_total').html(final_total);
        $('#distotal').html(total);
        $('#disctotals').val(total);
 $('#discount_total').val(total);


    }
	
	function viewuser(id) {
		
        $.ajax({
            type: 'POST',
            url: url+'/sls_action.php',
            data: 'action_type=singleview&id=' + id,
            success: function (data) {
                
               	var data=JSON.parse(data);
					
                    $('#ord-no').html(data[0].order_no);
                    $('#fname').html(data[0].cust_first_name);
					$('#odate').html(data[0].order_date);
					$('#stotal').html(data[0].sub_total);
                    $('#gst').html(data[0].gst_per);
					$('#gtotal').html(data[0].grant_total);
					$('#adjust').html(data[0].adjustment);
					$('#bank-name').html(data[0].bnk_alname);
					
					for (i = 0; i < data.length; i++) {
				    console.log(i);
                    $('#dis-bank-det').append("<tr><td class='prod_name'>"+ data[i].prod_name +" </td><td class='qty'>"+ data[i].qty +" </td><td class='unit_price'>"+ data[i].unit_price +" </td><td class='disc_price'>"+ data[i].disc_price +" </td><td class='total_price'>"+ data[i].total_price +" </td><td class='subs_amt'>"+ data[i].subs_amt +" </td><td class='cgst_price'>"+ data[i].cgst_price +" </td><td class='sgst_price'>"+ data[i].sgst_price +" </td></tr>");
                    
					}
                    $('#tbl').hide();
                    
				$('#display').show();

            }
        });

    }
</script>