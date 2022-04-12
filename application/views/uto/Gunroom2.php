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
    <h1 style="" class="my-4">Gunroom 2</h1>
    <table class="table table-bordered" style="background-color:white;color:black">
    <!-- <thead class="thead-dark">
      <tr  class="table-primary">
       <th>dfsdfd</th>
      </tr>
    </thead> -->
    <tbody>
      
      <tr class="table-active">
        <td><b>Total rooms</b></td>
        <td>10</td>
       
      </tr>
      <tr>
        <td><b> Total floors</td>
        <td>3</td>
      
      </tr>
      <tr class="table-active">
        <td><b>Occupied</b></td>
        <td><?=  $room_occupied_2; ?></td>
       
      </tr>
      <tr>
        <td><b>Empty rooms</b></td>
        <td><?=  $room_vacant_2; ?></td>
       
      </tr>
      <tr class="table-active">
        <td><b>Total accomodation officers</b></td>
        <td>30</td>
       
      </tr>
    </tbody>
  </table>
    <!-- <div class="col-md-12 img">
    </div> -->
 
    <form class="user" role="form" method="post" id="add_form">

  
        <div class="form-group row justify-content-center" style="margin-top:50px;">
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>Project_Officer/add_weapons'">
                    <h5 style="font-weight: bold;">Floor 1</h5>
                </button>
            </div>

            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>Project_Officer/add_officers'">
                    <h5 style="font-weight: bold;">Floor 2</h5>
                </button>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_material" onclick="location.href='<?php echo base_url(); ?>Project_Officer/allocate_weapon'">
                    <h5 style="font-weight: bold;">FLoor 3</h5>
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