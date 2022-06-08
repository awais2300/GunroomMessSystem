<?php
$this->load->view('assistantmess/common/header');
?>

<style>
    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container">
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4 my-2">
        <h1 class="h3 mb-0 text-black-800"></h1>
        <a onclick="location.href='<?php echo base_url(); ?>Project_Officer/report_contractor'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print text-white-50"></i> Print Page</a>
    </div> -->

    <div class="card o-hidden my-4 border-0 shadow-lg">
        <div class="modal fade" id="new_contractor">
            <!-- <div class="row"> -->
            <div class="modal-dialog modal-dialog-centered " style="margin-left: 370px;" role="document">
                <div class="modal-content bg-custom3" style="width:1000px;">
                    <div class="modal-header" style="width:400px;">

                    </div>
                    <div class="card-body bg-custom3">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-header bg-custom1">
                                        <h1 class="h4">Add New Menu Item</h1>
                                    </div>

                                    <div class="card-body bg-custom3">
                                        <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>AssistantMess/insert_menu_item">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h6>&nbsp;Menu Name:</h6>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="menu_name" id="menu_name" placeholder="Name">
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn">
                                                        <!-- <i class="fab fa-google fa-fw"></i>  -->
                                                        Add Menu
                                                    </button>
                                                    <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit_material">
            <!-- <div class="row"> -->
            <div class="modal-dialog modal-dialog-centered " style="margin-left: 370px;" role="document">
                <div class="modal-content bg-custom3" style="width:1000px;">
                    <div class="modal-header" style="width:1000px;">

                    </div>
                    <div class="card-body bg-custom3">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-header bg-custom1">
                                        <h1 class="h4">Edit Menu</h1>
                                    </div>

                                    <div class="card-body bg-custom3">
                                        <form class="user" role="form" method="post" id="edit_form" action="<?= base_url(); ?>Project_Officer/edit_officer">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h3 id="weapon_name_heading"></h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Menu Name:</h6>
                                                </div>

                                                <!-- <div class="col-sm-4">
                                                    <h6>&nbsp;P_no:</h6>
                                                </div>

                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Rank</h6>
                                                </div> -->

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-1" style="display:none">
                                                    <input type="text" class="form-control form-control-user" name="id_edit" id="id_edit" placeholder="id" readonly="readonly" style="color:black; font-size:medium; background-color:lightgray; border:1px solid black;">
                                                </div>

                                                <div class="col-sm-4 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="menu_name" id="menu_name" placeholder="Menu">
                                                </div>

                                           
                                            </div>

                                        

                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-primary btn-user btn-block" id="edit_btn">
                                                        <!-- <i class="fab fa-google fa-fw"></i>  -->
                                                        Update
                                                    </button>
                                                    <span id="show_error_update" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="assigned_projects">
            <!-- <div class="row"> -->
            <div class="modal-dialog modal-dialog-centered " style="margin-left: 370px;" role="document">
                <div class="modal-content bg-custom3" style="width:1000px;">
                    <div class="modal-header" style="width:1000px;">

                    </div>
                    <div class="card-body bg-custom3">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-header bg-custom1">
                                        <h1 id="contractor_head" class="h4">Assigned Projects of </h1>
                                    </div>

                                    <div class="card-body bg-custom3">
                                        <form class="user" role="form" method="post" id="edit_form" action="<?= base_url(); ?>Project_Officer/edit_contractor">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h3 id="contractor_heading"></h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h4>List of Projects:</h4>
                                                    <br>
                                                </div>
                                                <div id="show_list" class="col-sm-12">

                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="completed_projects">
            <!-- <div class="row"> -->
            <div class="modal-dialog modal-dialog-centered " style="margin-left: 370px;" role="document">
                <div class="modal-content bg-custom3" style="width:1000px;">
                    <div class="modal-header" style="width:1000px;">

                    </div>
                    <div class="card-body bg-custom3">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-header bg-custom1">
                                        <h1 id="contractor_head_completed" class="h4">Completed Projects of </h1>
                                    </div>

                                    <div class="card-body bg-custom3">
                                        <form class="user" role="form" method="post" id="edit_form" action="">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h3 id="contractor_heading"></h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h4>List of Projects:</h4>
                                                    <br>
                                                </div>
                                                <div id="show_list_completed" class="col-sm-12">

                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body bg-custom3">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card bg-custom3">
                        <div class="card-header bg-custom1">
                            <h1 class="h4">Mess Menu</h1>
                        </div>

                        <div class="card-body">
                            <div id="table_div">
                                <?php if (count($mess_menu) > 0) { ?>
                                    <table id="datatable" class="table table-striped" style="color:black">
                                        <thead>
                                            <tr>
                                                <th scope="col">S.No</th>
                                                <th scope="col">Menu Item</th>
                                                <th scope="col">Edit Record</th>
                                                <th scope="col">Delete Record</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_rows_cont">
                                            <?php $count = 0;
                                            foreach ($mess_menu as $data) { ?>
                                                <tr>
                                                    <td scope="row" id="cont<?= $count; ?>"><?= $data['id']; ?></td>
                                                    <td scope="row"><?= $data['menu_name']; ?></td>
                                                    <td type="button" id="edit<?= $data['id']; ?>" class="edit" scope="row" data-toggle="modal" data-target="#edit_material"><i style="margin-left: 40px;" class="fas fa-edit"></i></td>
                                                    <td scope="row"  class="delete" ><a href="<?= base_url();?>AssistantMess/delete_menu/<?= $data['id']; ?>"><i class="fas fa-trash"></i></a></td>
                                                </tr>
                                            <?php
                                                $count++;
                                            } ?>
                                        </tbody>
                                    </table>
                                <?php } else { ?>
                                    <a> No Data Available yet </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <form class="user" role="form" method="post" id="add_form" action="">
                        <div class="form-group row my-2 justify-content-center">
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn" data-toggle="modal" data-target="#new_contractor">
                                    <i class="fas fa-plus"></i>
                                    Add new Menu
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</div>


<?php $this->load->view('common/footer'); ?>
<script src="<?= base_url('assets/js/chat/chat.js'); ?>"></script>

<script>
    window.onload = function() {
        $.ajax({
            url: '<?= base_url(); ?>Project_Officer/get_total_projects_assigned',
            method: 'POST',
            success: function(data) {

                var result = jQuery.parseJSON(data);
                $count = 0;
                $('#table_rows_cont > tr').each(function(index, tr) {
                    var cp = document.getElementById("assigned_project" + $count);
                    var cont_id = document.getElementById("cont" + $count);

                    for (var i in result) {
                        if (cont_id.innerHTML == result[i].contractor_id) {
                            cp.innerHTML = result[i].count;
                        }
                    }
                    $count++;
                });
            },
            async: true
        });

        $.ajax({
            url: '<?= base_url(); ?>Project_Officer/get_total_projects_completed',
            method: 'POST',
            success: function(data) {

                var result = jQuery.parseJSON(data);
                $count = 0;
                $('#table_rows_cont > tr').each(function(index, tr) {
                    var cp = document.getElementById("completed_project" + $count);
                    var cont_id = document.getElementById("cont" + $count);

                    for (var i in result) {
                        if (cont_id.innerHTML == result[i].contractor_id) {
                            cp.innerHTML = result[i].count;
                        }
                    }
                    $count++;
                });


            },
            async: true
        });

    }

    $('#add_btn').on('click', function() {
        //alert('javascript working');
        $('#add_btn').attr('disabled', true);
        var validate = 0;

        var name = $('#menu_name').val();
        
        if (name == '') {
            validate = 1;
            $('#menu_name').addClass('red-border');
        }

        if (validate == 0) {
            $('#add_form')[0].submit();
            $('#show_error_new').hide();
        } else {
            $('#add_btn').removeAttr('disabled');
            $('#show_error_new').show();
        }
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $('#edit_btn').on('click', function() {
        //alert('javascript working');
        $('#edit_btn').attr('disabled', true);
        var validate = 0;

        //  var material_name = $('#material_name_edit').val();
        // var officer_name_edit = $('#officer_name_edit').val();
        // var p_no_edit = $('#p_no_edit').val();
        var menu_name = $('#menu_name').val();
        

        if (menu_name == '') {
            validate = 1;
            $('#menu_name').addClass('red-border');
        }
 
        if (validate == 0) {
            $('#edit_form')[0].submit();
            $('#show_error_update').hide();
        } else {
            $('#edit_btn').removeAttr('disabled');
            $('#show_error_update').show();
        }
    });

    $('#table_rows_cont').find('tr').click(function(e) {
        var $columns = $(this).find('td');

        $('#weapon_name_edit').val($columns[1].innerHTML);
        $('#weapon_name_heading').html('<strong>' + $columns[1].innerHTML + '</strong>');
        $('#id_edit').val($columns[0].innerHTML);
        $('#officer_name_edit').val($columns[1].innerHTML);
        $('#p_no_edit').val($columns[2].innerHTML);
        $('#rank_edit').val($columns[3].innerHTML);
        $('#branch_edit').val($columns[4].innerHTML);
        $('#phone_edit').val($columns[6].innerHTML);
        $('#email_edit').val($columns[5].innerHTML);

        if ((e.target.id.substr(0, 16) == "assigned_project") || (e.target.id.substr(0, 17) == "completed_project")) {

            var status;
            if (e.target.id.substr(0, 16) == "assigned_project") {
                status = 'ALL';
            } else if (e.target.id.substr(0, 17) == "completed_project") {
                status = 'Completed';
            }

            $.ajax({
                url: '<?= base_url(); ?>Project_Officer/get_list_of_projects',
                method: 'POST',
                data: {
                    'contractor_id': $columns[0].innerHTML,
                    'status': status
                },
                success: function(data) {
                    var result = jQuery.parseJSON(data);

                    if (status == 'ALL') {
                        var plist = document.getElementById("show_list")
                        var innerhtml = "";
                        for (var i in result) {
                            innerhtml = innerhtml + `<li><strong><a style="color:black" href=<?php echo base_url(); ?>Project_Officer/overview/${result[i].ID}>${result[i].Name}</a></strong></li>`;
                        }

                        if (result.length != 0) {
                            plist.innerHTML = innerhtml;
                        } else {
                            plist.innerHTML = `<p>No projects Assigned</p>`;
                        }
                        $('#contractor_head').html("Assigned Projects of " + $columns[1].innerHTML);
                    } else {
                        var plistc = document.getElementById("show_list_completed")
                        var innerhtml = "";
                        for (var i in result) {
                            innerhtml = innerhtml + `<li><strong><a style="color:black" href=<?php echo base_url(); ?>Project_Officer/overview/${result[i].ID}>${result[i].Name}</a></strong></li>`;
                        }
                        if (result.length != 0) {
                            plistc.innerHTML = innerhtml;
                        } else {
                            plistc.innerHTML = `<p>No projects Completed</p>`;
                        }
                        $('#contractor_head_completed').html("Completed Projects of " + $columns[1].innerHTML);
                    }
                },
                async: true
            });
        }
    });
</script>
<!-- <script type="text/javascript">
     $(function() {
         $(".edit").click(function(event) {
             var a = $(this).attr('ID');
             //alert(a);
             var id = a.substr(4, 5);
             var res = "#quant".concat(id);
             //alert(res);

             if ($(this).children("input").length > 0)
                 return false;

             var tdObj = $(res);
             var preText = tdObj.html();
             var inputObj = $("<input type='text' style='width:60px' />");
             tdObj.html("");

             inputObj.css({
                     border: "0px",
                     fontSize: "15px"
                 })
                 .val(preText)
                 .appendTo(tdObj)
                 .trigger("focus")
                 .trigger("select");

             inputObj.keyup(function(event) {
                 if (13 == event.which) { // press ENTER-key
                     var text = $(this).val(); // alert(text);

                     $.ajax({
                         url: '<?= base_url(); ?>SO_STORE/update_inventory',
                         method: 'POST',
                         data: {
                             'id': id,
                             'quantity': text
                         },
                         success: function(data) {
                             tdObj.html(text);

                             $(".alert").show();
                             window.setTimeout(function() {
                                 $(".alert").fadeTo(500, 0).slideUp(500, function() {
                                     $(this).remove();
                                 });
                             }, 2000);
                         },
                         async: false
                     });

                 } else if (27 == event.which) { // press ESC-key
                     tdObj.html(preText);
                 }
             });

             inputObj.click(function() {
                 return false;
             });
         });
     });
 </script> -->
<script type="text/javascript">
    function seen(data) {
        alert('in');
        alert(data);
        // var receiver_id=$(this).attr('id');
        $.ajax({
            url: '<?= base_url(); ?>ChatController/seen',
            method: 'POST',
            data: {
                'id': data
            },
            success: function(data) {
                $('#notification').html(data);
            },
            async: true
        });
    }

    $('#notifications').focusout(function() {
        // alert('notification clicked');
        $.ajax({
            url: '<?= base_url(); ?>ChatController/activity_seen',
            success: function(data) {
                $('#notifications').html(data);
            },
            async: true
        });
    });
</script>