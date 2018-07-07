<!-- START PAGE CONTENT-->
<?php include"dbconfig.php"; ?>
<div class="page-content fade-in-up">
    <div class="col-md-12">

    </div>
    <div class="ibox none" id="addForm">
        <div class="ibox-head">
            <div class="ibox-title">Add Division</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm1" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Division Name *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="division" placeholder="Division Name" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Acres *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="acres" placeholder="Acres" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="loadpage('listdivision');">Back</a>
                        <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('add');">Add Division</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="ibox none" id="display">
        <div class="ibox-head">
            <div  class="ibox-title"><table><tr><td><h4 id="division_name"></h4></td></tr></table></div>
            <div style="float:right;">
                <input type="hidden" name="emp_id" value="" id="division_id">
                <a href="javascript:void(0);" id="emp_id" class="btn btn-primary" onclick="editUser(document.getElementById('division_id').value);$('#display').hide();">Edit</a>
                <span id="active_btn">
                    <a href="javascript:void(0);" style="background-color:#2cc4cb;border-color:#2cc4cb" class="btn btn-primary" onclick="return confirm('Are you sure to update data?') ? userAction('updateactive', document.getElementById('division_id').value) : false;" style="max-width:50%;">Mark as Active</a>
                </span> 
                <span id="inactive_btn">
                    <a href="javascript:void(0);" style="background-color:#2cc4cb;border-color:#2cc4cb" class="btn btn-primary" onclick="return confirm('Are you sure to update data?') ? userAction('updateinactive', document.getElementById('division_id').value) : false;" style="max-width:50%">Mark as InActive</a>
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
                                <b><span><p id="division_acres"></p></span></b>
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
            <div class="ibox-title">Edit Division</div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="userForm2" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Division Name *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="division" id="division_nameEdit" style="font-family: Poppins">
                        <input class="form-control" type="hidden" name="id" id="division_idEdit">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Acres *</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="acres" id="division_acresEdit" style="font-family: Poppins">
                    </div>
                </div>
                <div class="form-group row">
                    <a href="javascript:void(0);" class="btn btn-primary" onclick="userAction('edit');">Update Division</a>
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
                            <option value="">All Divisions</option>
                            <option value="1">Active Divisions</option>
                            <Option value="0">Inactive Divisions</option>
                        </select>
                        <span class="rows_selected" id="select_count"style="margin-left:10px">0 Selected</span>
                    </div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Division.." title="Type in a name" style="font-family: Poppins;margin-left:-104px;height:27px">
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
                              $query="select * from tbl_division";
                              $result = mysqli_query($conn, $query);
                              $count = mysqli_num_rows($result);
                              $pages = ceil($count/$per_page)
                              ?>
							  
                    <table class="table table" id="emp_tbl">
                        <thead>
                            <tr>
                                <td><input id="select_all" type="checkbox" /></td>
                                <th>Division Name</th>
                                <th>Acres</th>
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
   $("#userData").load("partials/division_pagination.php?page=" + pagenum +"&status="+ status);


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
   $("#userData").load("partials/division_pagination.php?page=1&status=", Hide_Load());
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
 td2 = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > - 1 ) {
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
                        url: url+'/empAction.php',
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
                url: url+'/division_action.php',
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
                url: url+'/division_action.php',
                data: userData,
                success: function (msg) {
                    console.log(msg);
                    if (msg == 'ok') {
                        alert('Division has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        $('#userForm1')[0].reset();
                        //$('#addForm').hide();
                        loadpage('listdivision');
                    } else if (msg == 'updated') {
                        alert('Division has been ' + statusArr[type] + ' successfully.');
                        getUsers();
                        //$('#editForm').hide();
                        //$('#display').hide();
                        //$('#header').show();
                        //$('#show1').show();
                        loadpage('listdivision');

                    } else if (msg == 'update') {
                        alert('Division has been ' + statusArr[type] + ' successfully.');
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
                url: url+'/division_action.php',
                data: 'action_type=data&id=' + id,
                success: function (data) {
					console.log(data);
                    $('#division_idEdit').val(data.division_id);
                    $('#division_nameEdit').val(data.division_name);
                    $('#division_acresEdit').val(data.division_acres);
                    
                    $('#editForm').show();
                }
            });
        }
        function viewuser(id) {
            $.ajax({
                type: 'POST',
                url: url+'/division_action.php',
                data: 'action_type=singleview&id=' + id,
                success: function (data) {
                    console.log(data);
                    var data = JSON.parse(data);
                    $('#division_id').val(data.division_id);
                    $('#division_name').html(data.division_name);
                    $('#division_acres').html(data.division_acres);

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
                        alert(id);
                        post_arr.push(id);

                    }
                });

                if (post_arr.length > 0) {
                    // AJAX Request
                    $.ajax({
                        url: url+'/inactive_division.php',
                        type: 'POST',
                        data: {division_id: post_arr},
                        success: function (response) {
                            getUsers();
                            loadpage('listdivision');

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
                        url: url+'/active_division.php',
                        type: 'POST',
                        data: {division_id: post_arr},
                        success: function (response) {
                            getUsers();
                            loadpage('listdivision');

                        }
                    });
                }
            });

        });
    </script>
    <script>
        $("#userForm1").validate({

            rules: {
                division: {

                    required: !0

                },
                acres: {

                    required: !0
                },
            },
            messages: {
                division: "Please enter Division name",
                acres: "Please enter Acres",
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

