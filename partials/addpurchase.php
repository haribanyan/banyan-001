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
<div class="page-content fade-in-up">
 <div class="ibox none" id="addForm">
    <form id="userForm1" method="POST" >
        <div class="col-md-12">
		
            <div class="ibox-body control-group" >
			
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Supplier</label>
                    <div class="col-sm-5"  id="vendorselect">
                        <select style="width:100%;font-family: Poppins"  class="select2 form-control border-primary" name="vendor" id="vendor">
                            <?php
                            include '../config/DB.php';
                            $db = new DB();
                            $users = $db->getRows('tbl_supplier', array('order_by' => 'supplier_id DESC'));
                            ?>
                            <option value="">-Select-</option>
                            <?php foreach ($users as $user) { ?>     
                                <option value="<?php echo $user['supplier_id']; ?>"><?php echo $user['supplier_cmpny_name']; ?></option>
                            <?php } ?>
                        </select>
						
                    </div> 
					<a href="javascript:void(0);" style="float:right;margin-left:300px" class="btn btn-warning" onclick="$('#addForm').hide();$('#tbl').show();">Back</a>
                </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bill Number</label>
                <div class="col-sm-5">
                    <input class="form-control" style="width:93%" type="text" name="bill" style="font-family: Poppins"  placeholder="Bill Number">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bill Date</label>
                <div class="col-sm-5">
                    <input class="form-control" type="date" name="bill date" style="font-family: Poppins;width:250px" data-date="" data-date-format="DD/MM/YYYY" value="<?php echo date("Y-m-d");?>"  placeholder="Bill Date">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Due Date</label>
                <div class="col-sm-5">
                    <input class="form-control" value="<?php echo date("Y-m-d");?>" type="date" name="due date" data-date="" data-date-format="DD/MM/YYYY" style="font-family: Poppins;width:250px"  placeholder="Due Date">
                </div>
            </div>
            <div id="show_details" name="show_details" >
                <div class="form-group mb-4 row">
                    <table class="table table-bordered"id="mytable">

                        <thead  class="thead-default">
                            <tr>
                                <th>Products</th>
                                <th>Quantity</th>
                                <th>Rate</th>
                                <th>GST</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="scents">
                            <tr>
                                <td scope="row">
                                    <select style="width:100%;font-family: Poppins;" class=" required form-control "  name="item[]" onchange="getValue(this.id,this.value);" id="item0"  >
                                        <?php $users = $db->getRows('tbl_product', array('order_by' => 'product_id DESC')); ?>
                                        <option value="">-Select-</option>
                                        <?php foreach ($users as $user) { ?>     
                                            <option value="<?php echo $user['product_id']; ?>"><?php echo $user['product_name']; ?></option>
                                        <?php } ?>
                                    </select> 
                                </td>          
                                <td>                       
                                    <input  type="text" name="quant[]" id="quant0"  class="required form-control"></td>
                                <td>
                                    <input  type="text" name="rate[]" id="rate0"  class="required form-control"></td>
                                <td>
                                    <input  type="text" name="gst[]" id="gst0" onfocusout="showSubTotal()" class="required form-control"></td>
                                <td>
                                    <input  type="text" name="amount[]" id="amount0"  class="required form-control">
                                    <input  type="hidden" name="ids" id="idt" value="0" class="required form-control"></td>
                                <td class="actions" style="border-color: white;">
                                    <a href="#"  id="addScnt" style="margin-top:20px"><i class="ti-plus"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
                <table class="table table-bordered" cellpadding="0" cellspacing="0" border="1" >
                    <tbody id="mytable">
                    </tbody>
                </table>
                <div class="col-md-6 pull-right" style="margin-top:50px">
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput2"><strong style="font-size:15px;">Sub Total</strong> </label>
                        <div class="col-md-8">
                            <input type="hidden" class="form-control" id="sub_totals" name="sub_totals"  value="" placeholder="Sub Total">
                            <span style="float:left; font-size:15px;margin-left:200px;">RS.</span>
                            <div style="float:left;font-size:15px;" id="sub_total" >0</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput2"><strong style="font-size:15px;">GST %</strong> </label>
                        <div class="col-md-8">
                            <input type="text" style="width:150px;margin-left:-50px"  class="form-control" value=""  id="gst_totals" name="gst_totals" placeholder="Grand Total">
                            <span style="float:left;margin-left:200px; font-size:15px;margin-top:-40px">RS.</span>
                            <div style="float:left;font-size:15px;margin-left:220px;margin-top:-40px" id="gst_total">0</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput2"><strong style="font-size:15px;">Discount (Rs)</strong> </label>
                        <div class="col-md-8">
                            <input type="text" style="width:150px;font-family:poppins;margin-left:-50px" onfocusout="showSubTotal()" class="form-control" id="discount_total" name="discount_total" placeholder="Discount">
                            <span style="float:left;margin-left:200px;margin-top:-40px; font-size:15px;">RS.</span>
                            <div style="float:left;font-family:poppins;font-size:15px;margin-left:220px;margin-top:-40px" id="discount_totals">0</div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row" >
                        <label class="col-md-4 label-control" for="userinput2"><strong style="font-size:15px;">Total</strong> </label>
                        <div class="col-md-8">
                            <input type="hidden" style="width:150px;margin-left:-50px"  class="form-control" value=""  id="grand_totalss" name="grand_totalss" placeholder="Grand Total">
                            <span style="float:left;margin-left:200px; font-size:15px;">RS.</span>
                            <div style="float:left;font-size:15px;" id="grand_total">0</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput2">&nbsp;</label>
                        <div class="col-md-8 pull-right">
                            <input type="hidden" class="form-control" id="tot_qty" name="tot_qty" value="" >
                            <input type="hidden" class="form-control" id="totalsrow" name="totalsrow" value="" >
                            <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('add');">Submit</a>                             
                        </div>
                    </div>
                    </form>
                </div>
            </div>
</div>	
        </div>
    </form>  
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
					<label class="col-sm-3 col-form-label">Serach by Vendor & Bill No</label>
					<label class="col-sm-3 col-form-label">Bill Date</label>
					<label class="col-sm-3 col-form-label">Due Date</label>
					<label class="col-sm-3 col-form-label"></label>
					<div class="col-sm-3">
					 <input type="text" onkeyup="myFunction()" placeholder="Search for Vendors.." style="font-family: Poppins;" class=" form-control" id="myInput">
					</div>
					
					<div class="col-sm-3">
					
					<input type="date" style="font-family: Poppins;" class="form-control" id="bill-date" onchange="getBdate(this.value)">
					
							</div>
					<div class="col-sm-3">
					
						<input type="date" style="font-family: Poppins;" class=" form-control" id="fil-date2" onchange="getDdate(this.value)">
							
							</div>
				           <div class="col-sm-3">
						    <a href="javascript:void(0);" class="btn btn-warning"  onclick="remFilter();">Clear Filter</a>
						   </div>
					 </div>
					
					 </div>
					</div>
                    <table class="table table" id="emp_tbl">
                            <thead>
                                <tr>
                                    
                                    <th>Supplier Name</th>
                                    <th>Bill Number</th>
                                    <th>Bill Date</th>
                                    <th>Due Date</th>
                                    <th>Total Amount</th>
                                    <!--<th>Status</th>-->
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
<script>
function call(pagenum){
//alert(pagenum);
   $("#userData").load("partials/puch_page_data.php?page=" + pagenum +"&status="+ status);


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
   $("#userData").load("partials/puch_page_data.php?page=1", Hide_Load());
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
	function getBdate(val){
		
		 $.ajax({
                type: 'POST',
                url: url+'/purchaseTable.php',
                data: 'bdate='+val,
                success: function (data) {
					$('#emp_tbl').hide();
     $('#dis-tbl').html(data);
    }
     });
	}
	function remFilter(){
		loadpage('addpurchase');
	}
	function getDdate(val){
		
		 $.ajax({
                type: 'POST',
                url: url+'/purchaseTable.php',
                data: 'ddate='+val,
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
                userData = $("#userForm1").serialize() + '&action_type=' + type;

            } else if (type == 'edit') {
                userData = $("#userForm2").serialize() + '&action_type=' + type;
            } else {
				var result = confirm("Are you sure you want to delete this purchase Id?");
               if (result) {
             userData = 'action_type=' + type + '&id=' + id;
             }	
            }
			
            $.ajax({
                type: 'POST',
                url: url+'/purc_action.php',
                data: userData,
                success: function (data) {
					if (data.includes('deleted')) {
                        alert('Purchase data has been ' + statusArr[type] + ' successfully.');
                        loadpage('addpurchase');
                    }else if(data.includes('inserted')){
						alert('Purchase data has been added successfully.');
						loadpage('addpurchase');
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
           
            var s = '<?php $users = $db->getRows('tbl_item', array('order_by' => 'item_id DESC')); ?>  <option value="">-Select-</option><?php foreach ($users as $user) { ?><option value="<?php echo $user['item_id']; ?>"><?php echo $user['item_name']; ?></option><?php } ?>                              </select>';
            $('<tr id=' + rowCount + '><td><select style="width:100%;font-family: Poppins;" onchange="getValue(this.id,this.value);" class=" required form-control "  name="item[]" id="item' + rowCount + '" >' + s + '</select></td><td><input class="form-control"type="text"name="quant[]" id="quant' + rowCount + '"></td><td><input  type="text" name="rate[]" id="rate' + rowCount + '"  required class="form-control"></td><td><input class="form-control"type="text"name="gst[]" onfocusout="showSubTotal()"  id="gst' + rowCount + '"></td><td><input class="form-control"type="text"name="amount[]" id="amount' + rowCount + '"></td><td class="actions" style="border-color:white"><a href="#" id="remScnt" onclick="remove(' + rowCount + ')"><i class="ti-close"></i></a></td></tr>').appendTo('#scents');
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
            var totals = +quantity * +rate;            var totaly = +quantity * +rate;

            //sub total
            total = +totals + +total;
            if (gst > 0) {
              

                var gsts = (+totaly * +gst) / 100;
               
            } else {
                gsts = 0;
            }
           
            var gstmain = $("#gst_totals").val();
            
            gsty = +gsty + +gsts;
            
            var amount = +totals + +gsts;
            main = +main + +amount;
            $("#amount" + i).val(amount);
           
           
        }
         $("#sub_total").html(total);
            $("#sub_totals").val(total);
            $("#gst_total").html(gsty);
            $("#gst_totals").val(gsty);
            if (discount > 0) {
                main = +main - +discount;
            }
            $("#discount_totals").html(discount);
            $("#discount_total").val(discount);
            $("#grand_total").html(main);
            $("#grand_totalss").val(main);
        
    }
    function check(j){
          
           var rows = $("#idt").val();
        for (var i = 0; i <= rows; i++) {
            
              var items = $("#item" + i).val();
             var check_item = $("#item" + j).val();
             if(i!=j){
                 if(items==check_item){
                       alert("already exist");
                $("#item" + j).val('');
                return false;
                 }
             }
        }
    }
	 function getValue(id,val){
		 var id=id;
		 var i=id.match(/[0-9]/);
		 var rate = $("#rate" + i).attr('id');
		 var quant = $("#quant" + i).val('');
		 var amount=$("#amount" + i).val('');
		 $.ajax({
	type: "POST",
	url: "http://www.intellyticshub.com/svt_crm/dev/partials/purc_action.php",
	data:'prod_name='+val,
	success: function(data){
		var data=JSON.parse(data);
		$("#"+rate).val(data.price);
		
	}
	});
	 }
</script>