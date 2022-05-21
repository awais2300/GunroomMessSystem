<?php
$this->load->view('uto/common/header');
?>

<style>
    .0-occupied {
        background: url('<?= base_url() ?>assets/img/0-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }

    .1-occupied {
        background: url('<?= base_url() ?>assets/img/1-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }
    .2-occupied {
        background: url('<?= base_url() ?>assets/img/2-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }

    .3-occupied {
        background: url('<?= base_url() ?>assets/img/3-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }
    .4-occupied {
        background: url('<?= base_url() ?>assets/img/4-occupied.jpg');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }

    tr {
        height: 100px !important;
        width: 100px !important;
    }

    td {
        height: 100px !important;
        width: 100px !important;
    }

    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container-fluid my-2">
    <div class="form-group row justify-content-center">
        <div class="col-lg-12">
            <h1 style="text-align:center; padding:10px"><strong><?= $gunroom_name ." - ". $gunroom_floor_name?></strong></h1>
        </div>
    </div>
    <table class="">

        <tbody>
          
                 <tr>
                 <?php
                 foreach($rooms_data as $data){?>
                    <td>Room No. <?= $data['Room_no']; ?></td>
                    <?php  }  ?>
                </tr>
                <tr>
                <?php  $count=0;
                 foreach($rooms_data as $data){
                    if($data['allocated_to_1'] != null){
                        $count++;}
                    if($data['allocated_to_2'] != null){
                            $count++;}
                    if($data['allocated_to_3'] != null){
                                $count++;}
                    if($data['allocated_to_4'] != null){
                                    $count++;}
                                   // print_r($count);exit;
                     ?>
                    <td <?php if($count== "0") { echo "class='0-occupied'"; } if($count == '1') { echo "class='1-occupied'";} if($count == '2') { echo "class='2-occupied'";}
                    if($count == '3') { echo "class='3-occupied'";} if($count == '4') { echo "class='4-occupied'";} ?>></td>
                <?php $count=0;
                } 
                 ?>
                </tr>
              
            
        </tbody>
    </table>

    <form class="user" role="form" method="post" id="add_form">
        <div class="form-group row my-2 justify-content-center">
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn" onclick="location.href='<?php echo base_url(); ?>UTO/gunroom1'">
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