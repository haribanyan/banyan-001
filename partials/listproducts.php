<!-- START PAGE CONTENT-->
<!-- START PAGE CONTENT-->
<?php include"dbconfig.php"; ?>
<div class="page-content fade-in-up">
    <div class="col-md-12">

    </div>
    <div class="ibox none" id="addForm">
        <div class="ibox-head">
            <div class="ibox-title">Add Product</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm1" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Name *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="pname" name="pname" placeholder="Product Name" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alias Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="aliasname" name="aliasname" placeholder="Alias Name" style="font-family: Poppins">
                    </div>
                </div>
               
 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Type *</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="type" id="type">
												<option value="">Select Product Type</option>

						<option value="Plugging">Plugging</option>
						<option value="Non Plugging">Non-Plugging</option></select>
                    </div>
                </div>
 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cost  type *</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="costtype" id="costtype">
																		<option value="">Select Cost Type</option>

						<option value="costing">Costing</option>
						<option value="Non Costing">Non Costing</option>
						</select>
                    </div>
                </div> 


                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="loadpage('listproducts');">Back</a>
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('add');">Add Product</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="ibox none" id="display">
        <div class="ibox-head">
            <div  class="ibox-title"><table><tr><td><h4 id="productname"></h4></td></tr></table></div>
            <div style="float:right;">
                <input type="hidden" name="product_id" value="" id="dis-product_id">
                <a href="javascript:void(0);" id="emp_id" class="btn btn-primary" onclick="editUser(document.getElementById('dis-product_id').value);$('#display').hide();">Edit</a>
                <span id="active_btn">
                    <a href="javascript:void(0);" style="background-color:#2cc4cb;border-color:#2cc4cb" class="btn btn-primary" onclick="return confirm('Are you sure to update data?') ? userAction('updateactive', document.getElementById('dis-product_id').value) : false;" style="max-width:50%;">Mark as Active</a>
                </span> 
                <span id="inactive_btn">
                    <a href="javascript:void(0);" style="background-color:#2cc4cb;border-color:#2cc4cb" class="btn btn-primary" onclick="return confirm('Are you sure to update data?') ? userAction('updateinactive', document.getElementById('dis-product_id').value) : false;" style="max-width:50%">Mark as InActive</a>
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
                                <b><span><p id="alias"></p></span></b>
<p id="view_type"></p>
<p id="view_costtype"></p>
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
            <div class="ibox-title">Edit Products</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm2" method="post" novalidate="novalidate">
                                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Name *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="pname"  id="edit_pname" placeholder="Product Name" style="font-family: Poppins">
                        <input class="form-control" type="hidden" name="id" id="product_idEdit">
                  
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alias Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="aliasname" id="edit_aliasname" placeholder="Alias Name" style="font-family: Poppins">
                    </div>
                </div>
               
 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Type *</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="type" id="edit_type">
												<option value="">Select Product Type</option>

						<option value="Plugging">Plugging</option>
						<option value="Non Plugging">Non-Plugging</option></select>
                    </div>
                </div>
 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cost  type *</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="costtype" id="edit_costtype">
																		<option value="">Select Cost Type</option>

						<option value="costing">Costing</option>
						<option value="Non Costing">Non Costing</option>
						</select>
                    </div>
                </div> 

                <div class="form-group row">
                    <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('edit');">Update Product</a>
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
                            <option value="">All products</option>
                            <option value="1">Active Products</option>
                            <Option value="0">Inactive Products</option>
                        </select>
                        <span class="rows_selected" id="select_count"style="margin-left:10px">0 Selected</span>
                    </div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Products.." title="Type in a name" style="font-family: Poppins;margin-left:-104px;height:27px">
                    <div style="float:right;">
                        <span><input  class="btn btn-primary" style="background-color:#2cc4cb;border-color:#2cc4cb" value="Mark as Active" name="active" id="active" type="button"></span> 
                        <span><input  class="btn btn-primary" style="background-color:#2cc4cb;border-color:#2cc4cb" value="Mark as Inactive" name="inactive" id="inactive" type="button"></span> 
                        <span><a href="javascript:void(0);"  class="btn btn-primary" onclick="$('#addForm').show();$('#tbl').hide();">+ NEW</a></span>                            
                    </div>                           
                </div>
                <div  id="show1">
 <?php
                           
                              ?>
							  
                    <table class="table table" id="emp_tbl">
                        <thead>
                            <tr>
                                <td><input id="select_all" type="checkbox" /></td>
                                <th>Product Name</th>
                                <th>Alias Name</th>
                                <th>Type</th>
                                <th>Cost Type</th>
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

//pagination start
function call(pagenum,status){
  var mm= $("#userData").load("partials/products_data.php?page=" + pagenum +"&status="+ status);

};
function getval(pageNum){
//alert(pageNum);
   //CSS Styles
   $("#pagination li").css({'border' : 'solid #dddddd 1px'}).css({'color' : '#0063DC'});
   $(this).css({'color' : '#FF0084'}).css({'border' : 'none'});
   //Loading Data
   //var pageNum = this.id;
   
   var status = $('#emp_status').val();
   //alert(status)
call(pageNum,status);
   };

   $(document).ready(function() {
   //Hide Loading Image
   function Hide_Load() {
   $("#loading").fadeOut('slow');
   };
   //Default Starting Page Results
   $("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
   var mm=$("#userData").load("partials/products_data.php?page=1&status=", Hide_Load());
   //Pagination Click
   
   });
        $(document).ready(function ()
        {
            $('#emp_status').on('change', function ()
            {

                var status = $(this).val();
page=1;
call(page,status);

                
                  
           });
        });
    
//pagination end

</script>
<script>
//search start
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
//search end

</script>
<script type="text/javascript">
var url = "<?php echo $homeDir; ?>";
    
    </script>

    <script>
//view
        function getUsers() {
            $.ajax({
                type: 'POST',
                url: url+'/empAction.php',
                data: 'action_type=view&' + $("#userForm1").serialize(),
                success: function (html) {
                    $('#userData').html(html);
 $('#select_count').html('0 Selected');
                }
            });
        }
      //add,update
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
                url: url+'/productAction.php',
                data: userData,
                success: function (msg) {
					
                    if (msg == 'ok') {
                        alert('Product has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        $('#userForm1')[0].reset();
                        //$('#addForm').hide();
                        loadpage('listproducts');
                    } else if (msg == 'updated') {
                        alert('Product has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        //$('#editForm').hide();
                        //$('#display').hide();
                        //$('#header').show();
                        //$('#show1').show();
                        loadpage('listproducts');

                    } else if (msg == 'update') {
                        alert('Product has been ' + statusArr[type] + ' successfully.');
viewuser();
                    }
                }
            });
        }
       //edit update
 function editUser(id) {
$.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: url+'/productAction.php',
                data: 'action_type=data&id=' + id,
                success: function (data) {
                    $('#editForm').show();
console.log(data);
                    $('#product_idEdit').val(data.product_id);
                    $('#edit_pname').val(data.product_name);
                    $('#edit_aliasname').val(data.product_alias_name);
$('#edit_type').val(data.product_type);
                    $('#edit_costtype').val(data.cost_type);
                }
            });
        }
//view
        function viewuser(id) {
            $.ajax({
                type: 'POST',
                url: url+'/productAction.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
                    var data = JSON.parse(data);
                    $('#dis-product_id').val(data.product_id);
                    $('#product_id').val(data.product_id);
                    $('#productname').html(data.product_name);
                    $('#alias').html(data.product_alias_name);
$('#view_type').html(data.product_type);
                    $('#view_costtype').html(data.cost_type);

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
  
//checkbox
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
  //active and in active

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
                        url: url+'/inactive_action_product.php',
                        type: 'POST',
                        data: {prod_id: post_arr},
                        success: function (response) {
                            getUsers();
                            loadpage('listproducts');

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
                        url: url+'/active_action_product.php',
                        type: 'POST',
                        data: {prod_id: post_arr},
                        success: function (response) {
                            getUsers();
                            loadpage('listproducts');

                        }
                    });
                }
            });

        });
    </script>
    <script>
        $("#userForm1").validate({

            rules: {
                pname: {

                    required: !0

                },
               

                aliasname: {

                    required: !0
                },

                type: {
                    required: !0

                },

                costtype: {
                    required: !0

                },

            },
            messages: {
                pname: "Please enter Product Name",
                /*   
                 lname: "Please enter employee last name",*/
                aliasname: "Please enter Product Alias name",
                type: "Please enter type",
                costtype: "Please enter cost type",


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

