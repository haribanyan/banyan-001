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
    .hide_col { display:none; }
    .hide_col1 { display:none; color:#FFFFFF; font-size:1px; }
    .total{ width:200px; text-align:center;}
</style>
<div class="page-content fade-in-up">
    <div class="none" id="addForm">
        <form id="userForm1" method="POST" >
            <div class="col-md-12">
                <div class="ibox-body control-group" >
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" style="font-family: Poppins">Customer *</label>
                        <div class="col-sm-5" id="cust_select" style="font-family: Poppins">
                            <select class="select2 form-control border-primary" style="font-family:Poppins" name="customer" id="customer">
                                <?php
                                include '../config/DB.php';
                                $db = new DB();
                                $users = $db->getRows('tbl_cust', array('order_by' => 'cust_id DESC'));
                                ?>
                                <option  style="font-family: Poppins" value="">-Select-</option>
                                <?php foreach ($users as $user) { ?>     
                                    <option  style="font-family:Poppins" value="<?php echo $user['cust_id']; ?>"><?php echo $user['cust_first_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="font-family:Poppins">Order Date</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="date" name="order_date" style="font-family:Poppins" data-date-format="DD/MM/YYYY" value="<?php echo date("Y-m-d"); ?>"  placeholder="Order Date">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="font-family: Poppins">Due Date</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="date" name="due_date" style="font-family:Poppins" data-date-format="DD/MM/YYYY" value="<?php echo date("Y-m-d"); ?>"  placeholder="Due Date">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="font-family:Poppins">Sales Person</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="sales_person" style="font-family:Poppins"  placeholder="Sales Person">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Order Id</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="order_id" style="font-family:Poppins" value="<?php
                        $today = date("Ymd");
                        $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
                        echo $unique = $today . $rand;
                        ?>" placeholder="Sales Id">
                    </div>
                </div>
				<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Order Status</label>
                        <div class="col-sm-5">
                            <select class="form-control " name="ord_status" style="font-family:Poppins" required>
								<option value="">Select Order Status</option>
                                <option value="Yet to Start">Yet to Start</option>
                                <option value="Inprogress">In Progress</option>
                                <option value="Sold">Sold</option>
                            </select>
                        </div>
                        
                    </div>
                <div id="show_details" name="show_details" >
                    <div class="form-group mb-4 row" style="font-family:Poppins">
                        <table class="table table-bordered"id="mytable" style="font-family:Poppins">
                            <thead class="thead-default">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Specifications</th>
                                    <th>Price</th>
                                    <th>Product Quantity</th>
                                    <th>Subsidiary Amount</th>
                                    <th>CGST(%)</th>
									<th>SGST(%)</th>
                                </tr>
                            </thead>
                            <tbody id="scents">
                                <tr>
                                    <td scope="row">
                                        <input  type="text" name="pname[]" id="pname0" class="required form-control"></td>
                                    <td>                       
                                        <textarea  type="text" name="pdesc[]" id="pdesc0" class="required form-control"></textarea></td>
                                    <td>
                                        <textarea  type="text" name="pspec[]" id="pspec0" class="required form-control"></textarea></td>
                                    <td>
                                        <input  type="text" name="price[]" id="price0" class="required form-control"></td>
                                    <td>
                                        <input  type="text" name="pqty[]" id="pqty0" class="required form-control"></td>
                                    <td>
                                        <input type="text" name="samnt[]" id="samnt0" class="text0 required form-control"></td>
                                    <td>
                                        <input type="text" name="pcgst[]" id="pcgst0" maxlength="3" class="required form-control">
                                        <input  type="hidden" name="ids" id="idt" value="0" class="required form-control"></td>
									 <td>
                                        <input type="text" name="sgst[]" id="sgst0" maxlength="3" class="required form-control">
                                        <input  type="hidden" name="idss" id="idts" value="0" class="required form-control"></td>
                                    <td class="actions">
                                        <a href="#"  id="addScnt"><i class="ti-plus"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                    <div class="form-group row pull-right">
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('add');">Submit</a>    
                    </div>
                </div>	
            </div>
        </form>
    </div>
</div>
<div class="page-content fade-in-up">
    <div class="none" id="editForm">
        <form id="userForm2" method="POST" >
            <div class="col-md-12">
                <div class="ibox-body control-group" >
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" style="font-family:Poppins">Customer *</label>
                        <div class="col-sm-5" id="cust_select">
                            <select class="select2 form-control border-primary" name="customer" id="customerEd" style="font-family:Poppins">
                                <?php
                                $users = $db->getRows('tbl_cust', array('order_by' => 'cust_id DESC'));
                                ?>
                                <option  style="font-family: Poppins" value="">-Select-</option>
                                <?php foreach ($users as $user) { ?>     
                                    <option  style="font-family: Poppins" value="<?php echo $user['cust_id']; ?>"><?php echo $user['cust_first_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" style="font-family:Poppins">Order Date</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="date" name="order_date" style="font-family:Poppins" data-date-format="DD/MM/YYYY" id="orddtEd" placeholder="Order Date">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Due Date</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="date" name="due_date" style="font-family:Poppins" data-date-format="DD/MM/YYYY" id="duedtEd" placeholder="Due Date">
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sales Person</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="sales_person" style="font-family:Poppins" id="salesper"  placeholder="Sales Person">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Order Id</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="order_id" style="font-family:Poppins" id="ordidEd" placeholder="Sales Id">
                    </div>
                </div>
				<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Order Status</label>
                        <div class="col-sm-5">
                            <select class="form-control " name="ord_status" id="ordstaEd" style="font-family:Poppins" required>
								<option value="">Select Order Status</option>
                                <option value="Yet to Start">Yet to Start</option>
                                <option value="Inprogress">In Progress</option>
                                <option value="Sold">Sold</option>
                            </select>
                        </div>
                        
                    </div>
                <div id="show_details" name="show_details" >
                    <div class="form-group mb-4 row">
                        <table class="table table-bordered"id="mytable" style="font-family:Poppins">
                            <thead class="thead-default">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Specifications</th>
                                    <th>Price</th>
                                    <th>Product Quantity</th>
                                    <th>Subsidiary Amount</th>
                                    <th>CGST(%)</th>
									<th>SGST(%)</th>
                                </tr>
                            </thead>
                            <tbody id="scentsy">
                            </tbody>
                        </table>
                    </div>
                    <div class="clear"></div>
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="1" >
                        <tbody id="mytable">
                        </tbody>
                    </table>
                    <div class="form-group row pull-right">
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('edit');">Update</a>    
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
                <div class="ibox-head">
                    <div class="ibox-title">
                    </div>
                    <div style="float:right ">
                        <span><a href="javascript:void(0);" class="btn btn-primary" onclick="$('#addForm').show();$('#tbl').hide()">+ NEW</a></span></div>                
                </div>
                <div class="ibox-head">
                    <div class="row" style="padding:10px">
                        <label class="col-sm-3 col-form-label">Serach by Customer & Order No</label>
                        <label class="col-sm-3 col-form-label">Order Date</label>
                        <label class="col-sm-3 col-form-label">Due Date</label>
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-3">
                            <input type="text" onkeyup="myFunction()" placeholder="Search for Customers.." style="font-family:Poppins;" class=" form-control" id="myInput">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" style="font-family:Poppins;" class="form-control" id="bill-date" onchange="getBdate(this.value)">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" style="font-family:Poppins;" class=" form-control" id="fil-date2" onchange="getDdate(this.value)">
                        </div>
                        <div class="col-sm-3">
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
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Due Date</th>
                                <th>Sales Person</th>
								<th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody id="userData">
                        </tbody>
                    </table>
                    <div id="dis-tbl"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function call(pagenum) {
        $("#userData").load("partials/ord_page_data.php?page=" + pagenum + "&status=" + status);
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
        $("#userData").load("partials/ord_page_data.php?page=1", Hide_Load());

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
            url: url+'/ordrTable.php',
            data: 'bdate=' + val,
            success: function (data) {
				
                $('#emp_tbl').hide();
                $('#dis-tbl').html(data);
            }
        });
    }
    function remFilter() {
        loadpage('addOrder');
    }
    function getDdate(val) {

        $.ajax({
            type: 'POST',
            url: url+'/ordrTable.php',
            data: 'ddate=' + val,
            success: function (data) {
				
                $('#emp_tbl').hide();
                $('#dis-tbl').html(data);
            }
        });
    }
</script>
<script>
    function userAction(type, id) {
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
        $.ajax({
            type: 'POST',
            url: url+'/ord_action.php',
            data: userData,
            success: function (response) {
				
                if (response.includes('deleted')) {
                    alert('Order data has been ' + statusArr[type] + ' successfully.');
                    loadpage('addOrder');
                } else if (response.includes('inserted')) {
                    alert('Order data has been' + statusArr[type] + ' successfully.');
                    loadpage('addOrder');
                }
            }

        })
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
            $('<tr id=' + rowCount + '><td><input class="form-control"type="text" name="pname[]" id="pname' + rowCount + '"></td><td><textarea class="form-control" name="pdesc[]" id="pdesc' + rowCount + '"></textarea></td><td><textarea name="pspec[]" id="pspec' + rowCount + '"  required class="form-control"></textarea></td><td><input class="form-control"type="text"name="price[]" id="price' + rowCount + '"></td><td><input class="form-control"type="text"name="pqty[]" id="pqty' + rowCount + '"></td><td><input type="text" name="samnt[]" id="samnt0" class="text0 required form-control" ' + rowCount + '></td><td><input class="form-control"type="text"name="pcgst[]" id="pcgst0' + rowCount + '"></td><td><input class="form-control"type="text"name="sgst[]" id="sgst0' + rowCount + '"></td><td class="actions"><a href="#" id="remScnt" onclick="remove(' + rowCount + ')"><i class="ti-close"></i></a></td></tr>').appendTo('#scents');
            $("#idt").val(rowCount);
        });
    });
    function remove(i)
    {
        $("#" + i).remove();
    }
    function getdetails(id) {
        $.ajax({
            type: 'POST',
            url: url+'/getoo.php',
            data: 'id=' + id,
            success: function (data) {
                $('#tbl').hide();
                $('#editForm').show();
                $('#mytable').show();
                var data = JSON.parse(data);
                $('#customerEd').val(data.cust_id);
                $('#scents').html('');
                
				 var now = new Date(data.ord_date);
				    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;


   $('#orddtEd').val(today);
                
				     
				 var now = new Date(data.due_date);
				    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;


   $('#duedtEd').val(today);
                $('#salesper').val(data.sls_person);
                
                $('#ordidEd').val(data.sls_ord_id);
                var response = data.product_detail;
                var responses = response.length;
                for (i = 0; i < responses; i++) {
                    rowCount = i;
                    var name = response[i].prod_name;
                    var desc = response[i].prod_desc;
                    var spec = response[i].prod_spec;
                    var qty = response[i].prod_qty;
                    var price = response[i].prod_price;
                    var subsidy = response[i].prod_subsidy;
                    var cgst = response[i].prod_cgst;
					var sgst = response[i].prod_sgst;
                    if (i == 0) {
                        $('<tr id=' + rowCount + '><td><input class="form-control"type="text"name="item[]" id="item' + rowCount + '" value= "' + name + '"></td><td><textarea class="form-control" name="pdesc[]" id="pdesc' + rowCount + '">' + desc + '</textarea></td><td><textarea name="pspec[]" id="pspec' + rowCount + '"  required class="form-control">' + spec + '</textarea></td><td><input class="form-control"type="text"name="quant[]" id="quant' + rowCount + '" value="' + qty + '"></td><td><input class="form-control"type="text"name="quant[]" id="quant' + rowCount + '" value="' + price + '"></td><td><input type="text" name="samnt[]" id="samnt0" class="text0 required form-control" ' + rowCount + ' value="' + subsidy + '"></td><td><input class="form-control"type="text" name="pcgst[]"  value="' + cgst + '"  id="pcgst0' + rowCount + '"></td><td><input class="form-control"type="text"name="sgst[]"  value="' + sgst + '"  id="sgst0' + rowCount + '"></td><td> <a href="#"  id="addScnts" onclick="add(' + rowCount + ')"><i class="ti-plus"></i></a></td></tr>').appendTo('#scentsy');
                    } else {
                        $('<tr id=' + rowCount + '><td><input class="form-control"type="text"name="item[]" id="item' + rowCount + '" value= "' + name + '"></td><td><textarea class="form-control" name="pdesc[]" id="pdesc' + rowCount + '">' + desc + '</textarea></td><td><textarea name="pspec[]" id="pspec' + rowCount + ' required class="form-control">' + spec + '</textarea></td><td><input class="form-control"type="text"name="quant[]" id="quant' + rowCount + '" value="' + qty + '"></td><td><input class="form-control"type="text"name="quant[]" id="quant' + rowCount + '" value="' + price + '"></td><td><input type="text" name="samnt[]" id="samnt0" class="text0 required form-control" ' + rowCount + ' value="' + subsidy + '"></td><td><input class="form-control"type="text" name="pcgst[]"  value="' + cgst + '"  id="pcgst0' + rowCount + '"></td><td><input class="form-control"type="text"name="sgst[]"  value="' + sgst + '"  id="sgst0' + rowCount + '"></td><td class="actions"><a href="#" id="remScnt" onclick="removes(' + rowCount + ')"><i class="ti-close"></i></a></td></tr>').appendTo('#scentsy');
                    }

                }

            }
        });
    }
    function removes(i)
    {
        $("#" + i).remove();
    }
    function add()
    {

        var rowCount = $('#scentsy tr').length;
        $('<tr id=' + rowCount + '><td><input class="form-control"type="text" name="pname[]" id="pname' + rowCount + '"></td><td><textarea class="form-control" name="pdesc[]" id="pdesc' + rowCount + '"></textarea></td><td><textarea name="pspec[]" id="pspec' + rowCount + '"  required class="form-control"></textarea></td><td><input class="form-control"type="text"name="price[]" id="price' + rowCount + '"></td><td><input class="form-control"type="text"name="pqty[]" id="pqty' + rowCount + '"></td><td><input type="text" name="samnt[]" id="samnt0" class="text0 required form-control" ' + rowCount + '></td><td><input class="form-control"type="text"name="pcgst[]" id="pcgst0' + rowCount + '"></td><td><input class="form-control"type="text"name="sgst[]" id="sgst0' + rowCount + '"></td><td class="actions"><a href="#" id="remScnt" onclick="removes(' + rowCount + ')"><i class="ti-close"></i></a></td></tr>').appendTo('#scentsy');
        $("#idt").val(rowCount);
    }
</script>
<script>
    $("#price0,#pqty0,#samnt0,#pcgst0").keydown(function (e) {
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
</script>
<script>
    $("#userForm1").validate({
        rules: {
            customer:
                    {required: !0
                    },
        },
        messages: {
            customer: "Please select customer"
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