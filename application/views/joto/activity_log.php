<?php
$this->load->view('joto/common/header');
?>

<style>
    .red-border {
        border: 1px solid red !important;
    }

    .modal {
        display: none;
        position: fixed;
        padding-top: 100px;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        overflow: auto;
        z-index: 9999;
    }

    th {
        color: black;
        font-size: smaller;
        white-space: nowrap;
        padding: 4px !important;
    }

    td {
        color: black;
        font-size: smaller;
        white-space: nowrap;
        padding: 4px !important;
    }
</style>

<div class="container">
    <div class="card o-hidden my-4 border-0 shadow-lg">

        <div class="card-body bg-custom3">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header bg-custom1">
                            <h1 class="h4">Room Allocation List</h1>
                        </div>

                        <table class="table">
                            <thead>
                                <?php $count = 1;
                                if (count($room_allocation_records) > 0) { ?>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Gunroom</th>
                                    <th scope="col">Floor</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Officer 1</th>
                                    <th scope="col">Officer 2</th>
                                    <th scope="col">Officer 3</th>
                                    <th scope="col">Officer 4</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($room_allocation_records as $data) { ?>
                                        <tr>
                                            <td scope="row"><?= $count++; ?></td>
                                            <td scope="row"><?= $data['gunroom_id']; ?></td>
                                            <td scope="row"><?= $data['gunroom_floor_id']; ?></td>
                                            <td scope="row"><?= $data['Room_no']; ?></td>
                                            <td scope="row"><?= $data['allocated_to_1']; ?></td>
                                            <td scope="row"><?= $data['allocated_to_2']; ?></td>
                                            <td scope="row"><?= $data['allocated_to_3']; ?></td>
                                            <td scope="row"><?= $data['allocated_to_4']; ?></td>

                                        </tr>
                                    <?php }
                                } else { ?>
                                    <h5 class="my-3"> There is no Room Allocated to any officer</h5> 
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
<!-- <script src="<?= base_url('assets/js/chat/chat.js'); ?>"></script> -->


<script>
    window.onload = function() {

    }
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<script type="text/javascript">
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