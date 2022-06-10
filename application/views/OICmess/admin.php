<?php $this->load->view('OICmess/common/header'); ?>

<style>
    .img {
        background: url('<?= base_url() ?>assets/img/project-banner.jpg');
        background-position: center;
        background-size: cover;
        height: 300px;
        /* filter: blur(1px); */
        border-radius: 25px;
    }

    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container-fluid my-4">

   
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-black-800"><strong>Welcome to OICmess Dashboard</strong></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#all_projects"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->

    <div class="col-md-12 img">
    </div>

    <form class="user" role="form" method="post" id="add_form">

        <div class="form-group row justify-content-center" style="margin-top:50px;padding:15px">
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>OICmess/complaint'">
                <!-- <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" > -->
                    <h5 style="font-weight: bold;">Complaints</h5>
                    <!-- <h6>(Mess)</h6> -->
                </button>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>OICmess/reservation'">
                    <h5 style="font-weight: bold;">Guest Reservation</h5>
                </button>
            </div>

            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>OICmess/show_request_menu_list'">
                    <h5 style="font-weight: bold;">Requested Menu</h5>
                </button>
            </div>
            <!-- <div class="col-sm-3"> -->
                <!-- <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>UTO/complaint'"> -->
                <!-- <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" >
                    <h5 style="font-weight: bold;">Current Mess Menu</h5>
                </button> -->
            <!-- </div> -->

        </div>

    </form>
    
</div>

</div>

<?php $this->load->view('common/footer'); ?>
<script>
    function seen(data) {
        // alert('in');
        // alert(data);
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