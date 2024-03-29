<?php
$this->load->view('joto/common/header');
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
        <div class="col-lg-1">

        </div>
        <div class="col-lg-11">
            <h1 style="text-align:center; padding:40px"><strong>Requesting Menu</strong></h1>
        </div>

    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Enter Data</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" enctype="multipart/form-data" method="post" id="save_form" action="<?= base_url(); ?>Joto/update_requesting_menu_process/<?= $update_menu_requests_data['id'] ?>">
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
                                    <input type="text" class="form-control form-control-user" id="name" value="<?= $update_menu_requests_data['name']; ?>" name="name" placeholder="name*" readonly>
                                </div>
                                <div class="col-sm-6 mb-1">
                                    <input type="text" class="form-control form-control-user" id="p_no" name="p_no" placeholder="p_no*" value="<?= $update_menu_requests_data['p_no']; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <h6>&nbsp;No of persons:</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6>&nbsp;Date:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-1">
                                    <input type="number" class="form-control form-control-user" id="no_of_persons" name="no_of_persons" value="<?= $update_menu_requests_data['total_persons'] ?>" placeholder="no of persons*" readonly>
                                </div>
                                <div class="col-sm-6 mb-1">
                                    <input type="date" class="form-control form-control-user" id="date" name="date" placeholder="date*" value="<?= date('Y-m-d', strtotime($update_menu_requests_data['date'])) ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <h6>&nbsp;Menu:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-1">
                                    <?php $arr = explode(',', $update_menu_requests_data['menu']);
                                    $item_string = '';
                                    for ($i = 0; $i < count($arr); $i++) {
                                        $menu_items = $this->db->where('id', $arr[$i])->get('mess_menu')->row_array();
                                        $item_string .= $menu_items['menu_name'] . " , ";
                                    } ?>
                                    <input type="text" class="form-control form-control-user" id="menu" name="menu" placeholder="Menu*" value="<?= $item_string; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <h6>&nbsp;Description:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-1">
                                    <textarea id="description" style="border-radius:20px" name="description" class="form-control " rows="4" readonly><?= $update_menu_requests_data['description'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <h6>&nbsp;Remarks:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-1">
                                    <textarea id="remarks" style="border-radius:20px" name="remarks" class="form-control " rows="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="add_btni">
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

<?php $this->load->view('common/footer');  ?>
<script type="text/javascript">
    $('#add_btni').on('click', function() {
        $('#add_btni').attr('disabled', true);
        var validate = 0;
        var name = $('#name').val();
        var p_no = $('#p_no').val();
        var date = $('#date').val();
        var no_of_persons = $('#no_of_persons').val();
        var menu = $('#menu').val();
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
        if (no_of_persons == '') {
            validate = 1;
            $('#no_of_persons').addClass('red-border');
        }
        if (menu == '') {
            validate = 1;
            $('#menu').addClass('red-border');
        }

        // alert(validate);
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