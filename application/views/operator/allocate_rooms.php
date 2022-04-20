<?php
$this->load->view('operator/common/header');
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

<div class="container-fluid my-2">
    <div class="form-group row justify-content-center">
        <div class="col-lg-12">
            <h1 style="text-align:center; padding:40px"><strong>Room Allocation</strong></h1>
        </div>
    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Allocate Room</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" enctype="multipart/form-data" method="post" id="save_form" action="<?= base_url(); ?>Operator/room_allocation_process">

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <h6>&nbsp;Select Gun Room:</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h6>&nbsp;Select Floor:</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h6>&nbsp;Select Room:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-1">
                                    <select class="form-control form-control-user" name="gunroom" id="gunroom" style="height:50px;padding:10px">
                                        <option value="">Select Gunroom</option>
                                        <?php foreach ($gunrooms as $data){?>
                                        <option value="<?= $data['id']?>"><?= $data['gunroom_name']?></option>
                                       <?php } ?>
                                       
                                    </select>
                                </div>

                                <div class="col-sm-4 mb-1">
                                    <select class="form-control form-control-user" name="floor" id="floor" style="height:50px;padding:10px">
                                        <option value="">Select Floor</option>
                                    
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <select class="form-control form-control-user" name="room" id="room" style="height:50px;padding:10px">
                                        <option value="">Select Room</option>
                                       
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <h6>&nbsp;Allocate Officer 1:</h6>
                                </div>
                                <div class="col-sm-3">
                                    <h6>&nbsp;Allocate Officer 2:</h6>
                                </div>
                                <div class="col-sm-3">
                                    <h6>&nbsp;Allocate Officer 3:</h6>
                                </div>
                                <div class="col-sm-3">
                                    <h6>&nbsp;Allocate Officer 4:</h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" id="name_1" name="name_1" placeholder="Officer 1">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" id="name_2" name="name_2" placeholder="Officer 2">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" id="name_3" name="name_3" placeholder="Officer 3">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" id="name_4" name="name_4" placeholder="Officer 4">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn">
                                        <!-- <i class="fab fa-google fa-fw"></i>  -->
                                        Submit
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

</div>

<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
    $(document).on('change', '#gunroom', function() {
        var value=  $('#gunroom').val();
    //alert(value);
    $.ajax({
                url: '<?= base_url(); ?>Operator/get_floors_of_gunroom',
                method: 'POST',
                data: {
                    'gunroom_id': value
                },
                success: function(data) {
                    var result = jQuery.parseJSON(data);
                    var len = result.length;

                    $("#floor").empty();
                    $("#floor").append("<option value=''>Select Floor</option>");
                for( var i = 0; i<len; i++){
                    var id = result[i]['id'];
                    var name = result[i]['gunroom_floor_name'];
                    
                  
                    $("#floor").append("<option value='"+id+"'>"+name+"</option>");

                }
                   

                },
                async: true
            });
});

$(document).on('change', '#floor', function() {
        var value=  $('#gunroom').val();
        var value2=$('#floor').val();
    //alert(value);
    $.ajax({
                url: '<?= base_url(); ?>Operator/get_rooms_of_floor',
                method: 'POST',
                data: {
                    'gunroom_id': value,
                    'floor_id':value2
                },
                success: function(data) {
                    var result = jQuery.parseJSON(data);
                    var len = result.length;

                    $("#room").empty();
                    $("#room").append("<option value=''>Select Room</option>");
                for( var i = 0; i<len; i++){
                    var id = result[i]['id'];
                    var name = result[i]['Room_no'];
                    
                   
                    $("#room").append("<option value='"+id+"'>"+name+"</option>");

                }
                   

                },
                async: true
            });
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

    $('#add_btn').on('click', function() {
        $('#add_btn').attr('disabled', true);
        var validate = 0;
        var gunroom = $('#gunroom').val();
        var floor = $('#floor').val();
        var room = $('#room').val();
        // var allocated_to = $('#allocated_to').val();
        // var type = $('#type').val();
        // var location = $('#location').val();
        // var description = $('#description').val();

        if (gunroom == '') {
            validate = 1;
            $('#gunroom').addClass('red-border');
        }
        if (floor == '') {
            validate = 1;
            $('#floor').addClass('red-border');
        }
        if (room == '') {
            validate = 1;
            $('#room').addClass('red-border');
        }


        if (validate == 0) {
            $('#save_form')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#add_btni').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });

    $('#room').on('change', function() {
        var validate = 0;
        var gunroom = $('#gunroom').val();
        var floor = $('#floor').val();
        var room = $('#room').val();

        if (gunroom == '') {
            validate = 1;
            $('#gunroom').addClass('red-border');
        }
        if (floor == '') {
            validate = 1;
            $('#floor').addClass('red-border');
        }
        if (room == '') {
            validate = 1;
            $('#room').addClass('red-border');
        }

        if (validate == 0) {
            $.ajax({
                url: '<?= base_url(); ?>Operator/get_rooms_status',
                method: 'POST',
                data: {
                    'gunroom': gunroom,
                    'floor': floor,
                    'room': room
                },
                success: function(data) {
                    var result = jQuery.parseJSON(data);
                    for (var i in result) {
                        
                        $("#name_1").val(result[i].allocated_to_1);
                        $("#name_2").val(result[i].allocated_to_2);
                        $("#name_3").val(result[i].allocated_to_3);
                        $("#name_4").val(result[i].allocated_to_4);
                    }
                },
                async: true
            });
        }
    });
</script>