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

<div class="container-fluid my-2">
    <div class="form-group row justify-content-center">
        <div class="col-lg-12">
            <h1 style="text-align:center; padding:40px"><strong><?= $gunroom_name;  ?></strong></h1>
        </div>
    </div>

    <table class="table table-bordered" style="background-color:white;color:black">
   
    <tbody>
      
      <tr class="table-active">
        <td><b>Total rooms</b></td>
        <td><?=  $total_rooms; ?></td>
       
      </tr>
      <tr>
        <td><b> Total floors</td>
        <td><?=  $total_floors; ?></td>
      
      </tr>
      <tr class="table-active">
        <td><b>Occupied</b></td>
        <td><?=  $room_occupied; ?></td>
       
      </tr>
      <tr>
        <td><b>Empty rooms</b></td>
        <td><?=  $room_vacant; ?></td>
       
      </tr>
      <tr class="table-active">
        <td><b>Total accomodation officers</b></td>
        <td><?=  $counter; ?></td>
       
      </tr>
    </tbody>
  </table>
    <!-- <div class="col-md-12 img">
    </div> -->
 
    
    <form class="user" role="form" method="post" id="add_form">

        <div class="form-group row justify-content-center" style="margin-top:50px;">
        <?php $floors= $this->db->where('gunroom_id',$gunroom)->get('gunrooms_floors')->result_array() ?>
        <?php for($i=0;$i<count($floors);$i++){?>
            <div class="col-sm-4" style="margin-top:30px">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>UTO/gunroom_floor/<?= $gunroom; ?>/<?= $floors[$i]['id'] ?>'">
                    <h5 style="font-weight: bold;"><?= $floors[$i]['gunroom_floor_name']; ?></h5>
                </button>
            </div>
            <?php } ?>

            <!-- <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>UTO/gunroom1_floor2'">
                    <h5 style="font-weight: bold;">Floor 2</h5>
                </button>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>UTO/gunroom1_floor3'">
                    <h5 style="font-weight: bold;">Floor 3</h5>
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