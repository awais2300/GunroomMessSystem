<?php
$this->load->view('uto/common/header');
?>

<style>
    .img-occupied {
        background: url('<?= base_url() ?>assets/img/room-occupied.png');
        background-position: center;
        background-size: cover;
        height: 10% !important;
        width: 10% !important;
    }

    .img-vacant {
        background: url('<?= base_url() ?>assets/img/room-vacant.png');
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
            <h1 style="text-align:center; padding:10px"><strong>Gunroom 2 - Floor 2</strong></h1>
        </div>
    </div>
    <table class="">

    <tbody>
                 <tr>
                    <td>Room No. 1</td>
                    <td>Room No. 2</td>
                    <td>Room No. 3</td>
                    <td>Room No. 4</td>
                    <td>Room No. 5</td>
                    <td></td>
                    <td>Room No. 6</td>
                    <td>Room No. 7</td>
                    <td>Room No. 8</td>
                    <td>Room No. 9</td>
                    <td>Room No. 10</td>
                </tr>
                <tr>
                    <td <?php if($rooms_data_g2f2r1['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r2['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r3['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r4['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r5['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td></td>
                    <td <?php if($rooms_data_g2f2r6['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r7['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r8['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r9['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r10['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                </tr>
                <tr>
                    <td>Room No. 11</td>
                    <td>Room No. 12</td>
                    <td>Room No. 13</td>
                    <td>Room No. 14</td>
                    <td>Room No. 15</td>
                    <td></td>
                    <td>Room No. 16</td>
                    <td>Room No. 17</td>
                    <td>Room No. 18</td>
                    <td>Room No. 19</td>
                    <td>Room No. 20</td>
                </tr>
                <tr>
                    <td <?php if($rooms_data_g2f2r11['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r12['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r13['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r14['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r15['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td></td>
                    <td <?php if($rooms_data_g2f2r16['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r17['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r18['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r19['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                    <td <?php if($rooms_data_g2f2r20['status']=='Vacant') { echo "class='img-vacant'"; } else { echo "class='img-occupied'";} ?>></td>
                </tr>
            
        </tbody>
    </table>
    </table>

    <form class="user" role="form" method="post" id="add_form">
        <div class="form-group row my-2 justify-content-center">
            <div class="col-sm-4">
                <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn" onclick="location.href='<?php echo base_url(); ?>UTO/gunroom2'">
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