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
    <form class="user" role="form"  enctype="multipart/form-data" method="post" id="save_form" action="<?= base_url(); ?>UTO/add_complaint_process">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Name:</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6>&nbsp;P_no:</h6>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-1">
                                        <input type="text" class="form-control form-control-user"  id="name" name="name" placeholder="name*">
                                    </div>
                                    <div class="col-sm-6 mb-1">
                                        <input type="text" class="form-control form-control-user"  id="p_no" name="p_no" placeholder="p_no*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Allocated To:</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Date:</h6>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-1">
                                        <input type="text" class="form-control form-control-user"  id="allocated_to" name="allocated_to" placeholder="allocated to*">
                                    </div>
                                    <div class="col-sm-6 mb-1">
                                        <input type="date" class="form-control form-control-user"  id="date" name="date" placeholder="date*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Type:</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6>&nbsp;Location:</h6>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6 mb-1">
                                    <select class="form-control form-control-user" name="type" id="type" style="height:50px;padding:10px">
                                    <option value="">Account Type</option>
                                    <option value="gunroom">Gunroom</option>
                                    <option value="mess">Mess</option>
                                    </select>
                                    </div>
                                    <div class="col-sm-6 mb-1">
                                        <input type="text" class="form-control form-control-user" id="location"  name="location" placeholder="location*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <h6>&nbsp;Attachement:</h6>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-1">
                                        <input type="file" multiple="multiple"  class="form-control form-control-user" id="attachement"  name="attachement[]" placeholder="attachement*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <h6>&nbsp;Description:</h6>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-1">
                                    <textarea id="description" name="description" class="form-control " rows="4">
                                    </textarea>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-primary btn-user btn-block" id="add_btni">
                                            <!-- <i class="fab fa-google fa-fw"></i>  -->
                                            Add Complaint
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
        if(document.getElementById('attachement').files.length == 0){
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