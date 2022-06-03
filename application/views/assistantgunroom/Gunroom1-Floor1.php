<?php
$this->load->view('assistantgunroom/common/header');
?>

<style>
    .hide {
        display: block;
    }

    .occupied0 {
        background: url('<?= base_url() ?>assets/img/0-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
        position: relative;
    }

    /* .occupied0 .hide {
        position: absolute;
        bottom: 0;
        right: 0;
        background: black;
        color: white;
        margin-bottom: 5px;
        font-family: sans-serif;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: visibility 0s, opacity 0.5s linear;
        transition: visibility 0s, opacity 0.5s linear;
    } */

    /* .occupied0:hover .hide {
        display: block;
        color: black;
        border: 2px solid blue;
    } */

    /* .occupied0:hover {
        cursor: pointer;
        width: 150px;
        padding: 8px 15px;
        visibility: visible;
        opacity: 0.3;
        z-index: 150px;
    } */

    .occupied1 {
        background: url('<?= base_url() ?>assets/img/1-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }

    /* .occupied1:hover {
        cursor: pointer;
        width: 150px;
        padding: 8px 15px;
        visibility: visible;
        opacity: 0.3;
    } */

    /* .occupied1:hover+.hide {
        display: block;
        color: black;
        background-color: red;
    } */

    .occupied2 {
        background: url('<?= base_url() ?>assets/img/2-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }

    .occupied3 {
        background: url('<?= base_url() ?>assets/img/3-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }

    .occupied4 {
        background: url('<?= base_url() ?>assets/img/4-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }

    tbody {
        width: 100%;
    }

    tr {
        height: 125px !important;
        width: 125px !important;
    }

    td {
        height: 125px !important;
        width: 125px !important;
    }

    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container">
    <div class="card o-hidden my-4 border-0 shadow-lg">
        <div class="modal fade" id="new_contractor">
            <!-- <div class="row"> -->
            <div class="modal-dialog modal-dialog-centered " style="margin-left: 370px;" role="document">
                <div class="modal-content bg-custom3" style="width:800px;">

                    <div class="modal-header" style="width:800px;" style="text-align:center">
                        <h2 id="room_title"> <strong> </strong></h2>
                    </div>

                    <div class="card-body bg-custom3">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <!-- <div class="card-header bg-custom1"> -->
                                    <h1 class="h3">Allocated Officers</h1>
                                    <!-- </div> -->

                                    <div class="card-body bg-custom3">
                                        <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>Project_Officer/insert_weapon">
                                            <!-- <form class="user" role="form" method="post" id="add_form" action="barcode.php"> -->
                                            <div class="form-group row">
                                                <div class="col-sm-6" id="list_of_officers">

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
        </div>
    </div>
</div>

<div class="container-fluid my-2">
    <div class="form-group row justify-content-center">
        <div class="col-lg-12">
            <h1 style="text-align:center; padding:10px"><strong><?= $gunroom_name . " - " . $gunroom_floor_name ?></strong></h1>
        </div>
    </div>

    <table class="">
        <?php $total_rows = count($rooms_data);
        $loop_break = $total_rows / 2; ?>

        <tbody>

            <tr>
                <?php
                for ($x = 0; $x < $loop_break; $x++) { ?>
                    <td>Room No. <?= $rooms_data[$x]['Room_no']; ?></td>
                <?php } ?>
            </tr>
            <tr>

                <?php
                for ($x = 0; $x < $loop_break; $x++) {
                    $count = 0;
                    if ($rooms_data[$x]['allocated_to_1'] != null) {
                        $count++;
                    }
                    if ($rooms_data[$x]['allocated_to_2'] != null) {
                        $count++;
                    }
                    if ($rooms_data[$x]['allocated_to_3'] != null) {
                        $count++;
                    }
                    if ($rooms_data[$x]['allocated_to_4'] != null) {
                        $count++;
                    }
                ?>
                    <td <?php
                        if ($count == '0') {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id)' class='occupied0'";
                        }
                        if ($count == '1') {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id )' class='occupied1'";
                        }
                        if ($count == '2') {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id)' class='occupied2'";
                        }
                        if ($count == '3') {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id)' class='occupied3'";
                        }
                        if ($count == '4') {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id)' class='occupied4'";
                        } ?>></td>

                <?php $count = 0;
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($x = $loop_break; $x < $total_rows; $x++) { ?>
                    <td>Room No. <?= $rooms_data[$x]['Room_no']; ?></td>
                <?php } ?>
            </tr>
            <tr>
                <?php
                for ($x = $loop_break; $x < $total_rows; $x++) {
                    $count = 0;
                    if ($rooms_data[$x]['allocated_to_1'] != null) {
                        $count++;
                    }
                    if ($rooms_data[$x]['allocated_to_2'] != null) {
                        $count++;
                    }
                    if ($rooms_data[$x]['allocated_to_3'] != null) {
                        $count++;
                    }
                    if ($rooms_data[$x]['allocated_to_4'] != null) {
                        $count++;
                    }
                ?>
                    <td <?php if ($count == "0") {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id)' class='occupied0'";
                        }
                        if ($count == '1') {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id)' class='occupied1'";
                        }
                        if ($count == '2') {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id)' class='occupied2'";
                        }
                        if ($count == '3') {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id)' class='occupied3'";
                        }
                        if ($count == '4') {
                            echo "id='image$x' onmouseover='showofficernames($x, $gunroom_id, $gunroom_floor_id)' class='occupied4'";
                        } ?>></td>
                <?php $count = 0;
                }
                ?>
            </tr>


        </tbody>
    </table>

    <!-- <form class="user" role="form" method="post" id="add_form" action="">
        <div class="form-group row my-2 justify-content-center">
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn" data-toggle="modal" data-target="#new_contractor">
                    <i class="fas fa-plus"></i>
                    Add new Weapon
                </button>
            </div>
        </div>
    </form> -->

    <form class="user" role="form" method="post" id="add_form">
        <div class="form-group row my-2 justify-content-center">
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn" onclick="location.href='<?php echo base_url(); ?>AssistantGunroom/gunroom/<?= $gunroom_name[strlen($gunroom_name) - 1] ?>'">
                    <i class="fas fa-arrow-left"></i>
                    Go Back
                </button>
            </div>
        </div>
    </form>

</div>

</div>

<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
    function showofficernames(image_num, gunroom_id, gunroom_floor_id) {
        $('#new_contractor').modal('show');
        $('#room_title').html("Room No. " + (image_num + 1))

        $.ajax({
            url: '<?= base_url(); ?>AssistantGunroom/get_allocated_officers_name',
            method: 'POST',
            data: {
                'gunroom_id': gunroom_id,
                'gunroom_floor_id': gunroom_floor_id,
                'room_no': image_num + 1
            },
            success: function(data) {

                $("#list_of_officers").empty();

                var result = jQuery.parseJSON(data);
                var len = result.length;

                var isEmpty = true;

                if (result.officer1['allocated_to_1'] != null && result.officer1['allocated_to_1'] != '') {
                    $("#list_of_officers").append(`<h6 style="margin-bottom:20px;"><strong>${result.officer1['allocated_to_1']} </strong></h6>`);
                    isEmpty = false;
                }
                if (result.officer2['allocated_to_2'] != null && result.officer2['allocated_to_2'] != '') {
                    $("#list_of_officers").append(`<h6 style="margin-bottom:20px;"><strong>${result.officer2['allocated_to_2']} </strong></h6>`);
                    isEmpty = false;
                }
                if (result.officer3['allocated_to_3'] != null  && result.officer3['allocated_to_3'] != '') {
                    $("#list_of_officers").append(`<h6 style="margin-bottom:20px;"><strong>${result.officer3['allocated_to_3']} </strong></h6>`);
                    isEmpty = false;
                }
                if (result.officer4['allocated_to_4'] != null && result.officer4['allocated_to_4'] != '') {
                    $("#list_of_officers").append(`<h6 style="margin-bottom:20px;"><strong>${result.officer4['allocated_to_4']} </strong></h6>`);
                    isEmpty = false;
                }

                if(isEmpty) {
                    $("#list_of_officers").append(`<h5 style="margin-bottom:20px; color:red"><strong>ROOM IS VACCANT!!</strong></h5>`);
                }

            },
            async: true
        });
    }


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