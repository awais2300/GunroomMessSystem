<?php
$this->load->view('assistantmess/common/header');
?>

<style>
    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container-fluid my-2">
    <div class="form-group row justify-content-center">
        <div class="col-lg-12">
            <h1 style="text-align:center; padding:40px"><strong>Add New Room</strong></h1>
        </div>
    </div>

    <div class="card o-hidden my-4 border-0 shadow-lg">
        <div class="modal fade" id="new_contractor">
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
                                        <h1 class="h4">Add New Room</h1>
                                    </div>

                                    <div class="card-body bg-custom3">
                                        <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>operator/insert_new_room/<?= $gunroom_id; ?>/<?= $floor_id; ?>">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <h6>&nbsp;Room No:</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h6>&nbsp;No. of Beds</h6>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="room_no" id="room_no" placeholder="Room No.">
                                                </div>
                                                <div class="col-sm-6 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="total_beds" id="total_beds" placeholder="No. of Beds">
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn">
                                                        <!-- <i class="fab fa-google fa-fw"></i>  -->
                                                        Add New Gunroom
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





        <div class="card-body bg-custom3">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card bg-custom3">
                        <div class="card-header bg-custom1">
                            <h1 class="h4">Rooms</h1>
                        </div>

                        <div class="card-body">
                            <div id="table_div">
                                <?php if (count($gunrooms_rooms) > 0) { ?>
                                    <table id="datatable" class="table table-striped" style="color:black">
                                        <thead>
                                            <tr>
                                                <th scope="col">S.No</th>
                                                <th scope="col">Gunroom Name</th>
                                                <th scope="col">Floor Name</th>
                                                <th scope="col">Room No.</th>
                                                <th scope="col">Total Beds</th>
                                                <!-- <th scope="col">Edit Record</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="table_rows_cont">
                                            <?php $count = 0;
                                            foreach ($gunrooms_rooms as $data) { ?>
                                                <tr>
                                                    <td scope="row" id="cont<?= $count; ?>"><?= ++$count; ?></td>
                                                    <td scope="row"><?= $data['gunroom_name']; ?></td>
                                                    <td scope="row"><?= $data['gunroom_floor_name']; ?></td>
                                                    <td scope="row"><?= $data['Room_no']; ?></td>
                                                    <td scope="row"><?= $data['total_beds']; ?></td>
                                                    <!-- <td type="button" scope="row"><a type="button" class="btn btn-primary btn-user rounded-pill" href="<?= base_url(); ?>Admin/Delete_user/<?= $data['id']; ?>"> Add Floors</a></td> -->
                                                    <!-- <td type="button" id="edit<?= $data['id']; ?>" class="edit" scope="row" data-toggle="modal" data-target="#edit_material"><i style="margin-left: 40px;" class="fas fa-edit"></i></td> -->
                                                </tr>
                                            <?php
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
                                    Add new Room
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form class="user" role="form" method="post" id="add_form" action="">
                        <div class="form-group row my-2 justify-content-center">
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-primary btn-user btn-block" onclick="location.href='<?php echo base_url(); ?>AssistantMess/add_new_floor/<?= $gunroom_id;?>'">
                                    <i class="fas fa-backward"></i>
                                    Back
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

        var room_no = $('#room_no').val();
        var total_beds = $('#total_beds').val();

        if (room_no == '') {
            validate = 1;
            $('#room_no').addClass('red-border');
        }
        if (total_beds == '') {
            validate = 1;
            $('#total_beds').addClass('red-border');
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
        var officer_name_edit = $('#officer_name_edit').val();
        var p_no_edit = $('#p_no_edit').val();
        var rank_edit = $('#rank_edit').val();
        var branch_edit = $('#branch_edit').val();
        var phone_edit = $('#phone_edit').val();
        var email_edit = $('#email_edit').val();

        if (officer_name_edit == '') {
            validate = 1;
            $('#officer_name_edit').addClass('red-border');
        }
        if (p_no_edit == '') {
            validate = 1;
            $('#p_no_edit').addClass('red-border');
        }
        if (rank_edit == '') {
            validate = 1;
            $('#rank_edit').addClass('red-border');
        }
        if (branch_edit == '') {
            validate = 1;
            $('#branch_edit').addClass('red-border');
        }
        if (phone_edit == '') {
            validate = 1;
            $('#phone_edit').addClass('red-border');
        }
        if (email_edit == '') {
            validate = 1;
            $('#email_edit').addClass('red-border');
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