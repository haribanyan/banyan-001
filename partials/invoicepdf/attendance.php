<!-- START PAGE CONTENT-->
<div class="page-content fade-in-up">
    <div class="col-md-12">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title"> Employee Attendance</div>
            </div>	
            <div>
                <form name="attForm">
                    <div class="ibox-body">
                        <div class="form-group mb-4 ">
						<label class="col-sm-2 col-form-label" style="font-family: Poppins">Entry Date</label>
                            <div class="col-sm-3" style="margin-left:90px;margin-top:-32px;font-family: Poppins">
                                <input class="form-control" type="date"  name="date" placeholder="Date"  id="date" required  value="<?php echo date('Y-m-d'); ?>" / >
                            </div>
                        </div>
                        <div class="form-group mb-4 ">
                        </div>
                    </div>
                </form>
                <form method="POST" action="partials/att_action.php">
                    <div id="userData" style="display:none">
                        <table class="table table-responsive" style="margin-left:10px;font-family: Poppins">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Tick (if absent)</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody id="emp_att">
                            </tbody>
                        </table>
                        <input type="button" class="btn btn-primary" style="margin-left:20px;font-family: Poppins;margin-bottom:30px" value="Update" id="actives"/></button>
                        <input type="button" class="btn btn-primary" style="margin-left:20px;font-family: Poppins;margin-bottom:30px" value="Clear"/></button>
                    </div>
                    <div id="userData1" style="display:none;font-family: Poppins">
                        <table class="table table-responsive" style="margin-left:10px;font-family: Poppins">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Tick (if absent)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../config/DB.php';
                                $db = new DB();
                                $users = $db->getRows('tbl_emp', array('order_by' => 'emp_id DESC'));
                                if (!empty($users)): $count = 0;
                                    foreach ($users as $user): $count++;
                                        ?>
                                        <tr id="<?php echo $user['emp_id']; ?>">
                                            <td><?php echo $user['emp_first_name']; ?></td>
                                            <td><input data-item-id="<?php echo $user['emp_id']; ?>" type="checkbox"  class="emp_checkbox"/></td>
                                        </tr>
                                        <?php
                                    endforeach;
                                else:
                                    ?>
                                    <tr><td colspan="5">No user(s) found......</td></tr>
                                <?php endif; ?>
                        </table>
                        <input type="button" class="btn btn-primary"   style="margin-left:20px;font-family: Poppins;margin-bottom:30px" value="Update" id="active"/>
                        <input type="button" class="btn btn-primary"  id="chk" style="margin-left:20px;font-family: Poppins;margin-bottom:30px" value="Clear"/>
						
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
</div>
<script type="text/javascript">

$('#chk').click(function(e) {
   $('input[type=checkbox]').each(function() 
{ 
        this.checked = false; 
});
 });
 
    $(document).ready(function ()
    {
        $('#date').on('change', function ()
        {
				var date = $(this).val();
				
            $.ajax({
                type: 'POST',
                url: 'http://www.intellyticshub.com/svt_crm/dev/partials/empAction.php',
                data: 'action_type=attendance&date=' + date,
                success: function (html) {

                    if (html) {
                        $('#emp_att').html(html);
                        $('#userData').show();
                        $('#userData1').hide();
                        $('#userData1').hide();

                    } else {
                        $('#userData1').show();
                        $('#userData').hide();


                    }
                }
            });


        })
    });
</script>

<script>

    $('#select_all').on('click', function (e) {
        if ($(this).is(':checked', true)) {
            $(".prd_checkbox").prop('checked', true);
        } else {
            $(".prd_checkbox").prop('checked', false);
        }
// set all checked checkbox count
        $("#select_count").html($("input.prd_checkbox:checked").length + " Selected");
    });
// set particular checked checkbox count
    $(".prd_checkbox").on('click', function (e) {
        $("#select_count").html($("input.prd_checkbox:checked").length + " Selected");
    });
</script>
<script>
 $(document).ready(function ()
    {
		alert('hi');
    $('#active').on('click', function (e) {
		alert('hi');
        var customers = [];
        var date = $("#date").val();
        $(".emp_checkbox:checked").each(function () {
            customers.push($(this).data('item-id'));
        });
	alert('HIhihi');
     alert(customers.length); 
	 if (customers.length == 0)			{
            WRN_PROFILE_DELETE = "Are you sure you want to update " + (customers.length > 1 ? "these" : "this") + " row?";
            var checked = confirm(WRN_PROFILE_DELETE);
            if (checked == true) {
                var date = date;

                var selected_values = customers.join(",");
				alert(customer select);
                $.ajax({
                    type: "POST",
                    url: "http://www.intellyticshub.com/svt_crm/dev/partials/att_action.php",
                    cache: false,
                    data: {'emp_id': selected_values, 'date': date},
                    success: function (response) {
                        alert("added Successfully");

                    }
                });
            }
        }
    });
	});
</script>

<script>
    $('#actives').on('click', function (e) {
		alert('hi');
        var customers = [];
        var date = $("#date").val();

        $(".emp_checkboxs:checked").each(function () {
            customers.push($(this).data('item-id'));
        });

        if (customers.length <= 0) {
            alert("Please select records.");
        } else {
            WRN_PROFILE_DELETE = "Are you sure you want to submit " + (customers.length > 1 ? "these" : "this update") + " row?";
            var checked = confirm(WRN_PROFILE_DELETE);
            if (checked == true) {
                var date = date;

                var selected_values = customers.join(",");
                $.ajax({
                    type: "POST",
                    url: "http://www.intellyticshub.com/svt_crm/dev/partials/update_att.php",
                    cache: false,
                    data: {'emp_id': selected_values, 'date': date},
                    success: function (response) {
                        console.log(response);
                        alert("Updated successfully!");

                    }
                });
            }
        }
    });
	
	
</script>

