<?php
$this->load->view('assistantmess/common/header');
?>

<style>
    .img {
        background: url('<?= base_url() ?>assets/img/mess.jpeg');
        background-position: center;
        /* position:absolute; */
        /* background-size:auto; */
        background-size: contain;
        background-repeat:no-repeat;
        height: 250px;
        /* filter: blur(1px); */
        border-radius: 25px;
    }

    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container">
    <h2 class="my-4">Welcome, <?php if (!empty($this->session->userdata('full_name'))) {
                                    echo $this->session->userdata('full_name');
                                } else {
                                    echo $this->session->userdata('username');
                                } ?>!</h2>

    <div class="col-md-12 img">
    </div>

    <form class="user" role="form" method="post" id="add_form">

        <div class="form-group row justify-content-center" style="margin-top:50px;padding:15px">
            <!-- <div class="col-sm-3">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>AssistantMess/allocate_rooms'">
                    <h5 style="font-weight: bold;">Room Allocation</h5>
                </button>
            </div> -->

            <div class="col-sm-3">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>AssistantMess/complaint'">
                    <h5 style="font-weight: bold;">Complaints</h5>
                </button>
            </div>

            <div class="col-sm-3">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>AssistantMess/reservation'">
                    <h5 style="font-weight: bold;">Guest Reservation</h5>
                </button>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>AssistantMess/show_request_menu_list'">
                    <h5 style="font-weight: bold;">Requested Menu</h5>
                </button>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>AssistantMess/update_menu'">
                    <h5 style="font-weight: bold;">Update Mess Menu</h5>
                </button>
            </div>

            <!-- <div class="col-sm-3">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>AssistantMess/add_new_gunroom'">
                    <h5 style="font-weight: bold;">Add New Gunroom</h5>
                </button>
            </div> -->

        </div>

    </form>


</div>

</div>

<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
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