<?php
$this->load->view('uto/common/header');
?>

<style>
    .img {
        background: url('<?= base_url() ?>assets/img/project-banner.jpg');
        background-position: center;
        background-size: cover;
        height: 200px;
        /* filter: blur(1px); */
        border-radius: 25px;
    }

    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container">
    <h1 style="" class="my-4">Complaints</h1>

    <!-- <div class="col-md-12 img">
    </div> -->
    <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>User_Login/edit_profile_process">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Name:</h6>
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-1">
                                        <input type="text" class="form-control form-control-user"  id="name" name="name" placeholder="name*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Full Name:</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Email ID:</h6>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-1">
                                        <input type="text" class="form-control form-control-user"  id="fullname" name="fullname" placeholder="Full Name">
                                    </div>
                                    <div class="col-sm-6 mb-1">
                                        <input type="email" class="form-control form-control-user"  id="email" name="email" placeholder="Email Address*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Contact No:</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Address:</h6>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6 mb-1">
                                        <input type="tel" class="form-control form-control-user"  id="phone" name="phone" pattern="[0-9]{11}" placeholder="Phone No*">
                                    </div>
                                    <div class="col-sm-6 mb-1">
                                        <input type="text" class="form-control form-control-user" id="address"  name="address" placeholder="Address*">
                                    </div>
                                </div>

                         

                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-primary btn-user btn-block" id="add_btni">
                                            <!-- <i class="fab fa-google fa-fw"></i>  -->
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
<!-- 
    <form class="user" role="form" method="post" id="add_form">

        <div class="form-group row justify-content-center" style="margin-top:50px;">
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>Project_Officer/add_weapons'">
                    <h5 style="font-weight: bold;">Gunroom 1</h5>
                </button>
            </div>

            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>Project_Officer/add_officers'">
                    <h5 style="font-weight: bold;">Gunroom 2</h5>
                </button>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>Project_Officer/allocate_weapon'">
                    <h5 style="font-weight: bold;">Gunroom 3</h5>
                </button>
            </div>

        </div>
    </form> -->


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