<?php
$this->load->view('chiefmess/common/header');
?>

<style>
    #attachement {
        position: relative;
        /*  top: 150px;*/
        font-family: calibri;
        width: 100%;
        padding: 10px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border: 1px dashed #BBB;
        border-radius: 20px;
        text-align: center;
        background-color: #DDD;
        cursor: pointer;
    }

    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container-fluid my-2">
    <div class="form-group row justify-content-center">
        <div class="col-lg-12">
            <h1 style="text-align:center; padding:40px"><strong>Guest Reservation Records</strong></h1>
        </div>
    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->
        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4 my-2">
            <h1 class="h3 mb-0 text-black-800"></h1>
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?= base_url(); ?>uto/guest_reservation" style="margin-block-end: 10px; ">+ Guest Reservation</a>
        </div> -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Guest Reservation</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <table id="example" class="table table-striped table-bordered" style="width:100%;color:black">
                            <?php if ($reservation_data != null) { ?>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Request By</th>
                                        <th>P No.</th>
                                        <th>Total guests</th>
                                        <th>Description</th>
                                        <th>Menu Requested</th>
                                        <th>Location</th>
                                        <th>Date Added</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $count = 0;
                                    foreach ($reservation_data as $data) {
                                        $count++;
                                        $item_string = ''; ?>
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <?php $arr = explode(',', $data['menu']); ?>
                                            <?php for ($i = 0; $i < count($arr); $i++) {
                                                $menu_items = $this->db->where('id', $arr[$i])->get('mess_menu')->row_array();
                                                if(!empty($menu_items['menu_name'])){
                                                $item_string .= $menu_items['menu_name'] . " , ";
                                            }
                                            } ?>
                                            <td><?= $data['name']; ?></td>
                                            <td><?= $data['p_no']; ?></td>
                                            <td><?= $data['total_guests']; ?></td>
                                            <td><?= $data['description']; ?></td>
                                            <td><?= $item_string ?></td>
                                            <td><?= $data['location']; ?></td>
                                            <td><?= date('Y-m-d', strtotime($data['date'])) ?></td>
                                            <td><?= $data['remarks'] ?></td>

                                        </tr>

                                    <?php } ?>
                                <?php } else { ?>
                                    <tr><strong> No reservation available </strong> </tr>
                                <?php } ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $('#add_btni').on('click', function() {
        $('#add_btni').attr('disabled', true);
        var validate = 0;
        var name = $('#name').val();
        var p_no = $('#p_no').val();
        var date = $('#date').val();
        var allocated_to = $('#allocated_to').val();
        var type = $('#type').val();
        var location = $('#location').val();
        var description = $('#description').val();



        if (name == '') {
            validate = 1;
            $('#name').addClass('red-border');
        }
        if (p_no == '') {
            validate = 1;
            $('#p_no').addClass('red-border');
        }
        if (date == '') {
            validate = 1;
            $('#date').addClass('red-border');
        }
        if (allocated_to == '') {
            validate = 1;
            $('#allocated_to').addClass('red-border');
        }
        if (type == '') {
            validate = 1;
            $('#type').addClass('red-border');
        }
        if (location == '') {
            validate = 1;
            $('#location').addClass('red-border');
        }
        if (document.getElementById('attachement').files.length == 0) {
            validate = 1;
            $('#attachement').addClass('red-border');
        }

        if (validate == 0) {
            $('#save_form')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#add_btni').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });

    //  window.onload = function exampleFunction() {
    //      //alert('HIii');
    //      $.ajax({
    //          url: '<?= base_url(); ?>Project_Officer/update_notification',
    //          method: 'POST',
    //          datatype: 'json',
    //          data: {
    //         'id': '<?php echo $this->session->userdata('user_id'); ?>'
    //          },
    //          success: function(data) {
    //              $('#notification').html(data);
    //          },
    //          async: true
    //      });
    //  }

    function seen(data) {
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