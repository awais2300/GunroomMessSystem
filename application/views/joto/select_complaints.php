<?php $this->load->view('joto/common/header'); ?>

<style>
    .dot {
        height: 25px;
        width: 25px;
        background-color: red;
        border-radius: 50%;
        display: inline-block !important;
    }


    span {
        color: black;
        font-size: 15px !important;
    }

    .fas {
        color: black !important;
        font-size: 15px !important
    }

    .img-gunroom {
        background: url('<?= base_url() ?>assets/img/gunroom.jpeg');
        background-position: center;
        background-size: cover;
        height: 300px;
        /* filter: blur(1px); */
        border-radius: 25px;
    }

    .img-mess {
        background: url('<?= base_url() ?>assets/img/mess.jpeg');
        background-position: center;
        background-size: cover;
        height: 300px;
        /* filter: blur(1px); */
        border-radius: 25px;
    }

    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container-fluid my-4">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h1 class="h3 mb-0 text-black-800"><strong>Welcome to joto Dashboard</strong></h1> -->
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#all_projects"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->

    <form class="user" role="form" method="post" id="add_form">
        <div class="form-group row justify-content-center" style="margin-top:10px;padding:15px">
            <div class="col-sm-5 img-gunroom" >

            </div>
            <div class="col-sm-1" >

            </div>
            <div class="col-sm-5 img-mess" >

            </div>

        </div>
        <div class="form-group row justify-content-center" style="margin-top:50px;padding:15px">
            <div class="col-sm-5">
                <?php $unseen_complaints = $this->db->where('admin_seen', 'no')->where('account_type', 'gunroom')->from('complaints')->count_all_results(); ?>
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>joto/show_complaint/gunroom'">
                    <h5 style="font-weight: bold;"><span>Gunroom Complaints</span>
                        <?php if ($unseen_complaints != '0') { ?>
                            <span class="dot"><?= $unseen_complaints; ?></span>
                        <?php } ?>
                    </h5>
                </button>
            </div>
            <div class="col-sm-1" >

            </div>
            <div class="col-sm-5">
                <?php $unseen_complaints = $this->db->where('admin_seen', 'no')->where('account_type', 'mess')->from('complaints')->count_all_results(); ?>
                <button type="button" class="btn btn-primary btn-user btn-block" style="height:55px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>joto/show_complaint/mess'">
                    <h5 style="font-weight: bold;"><span>Mess Complaints</span>
                        <?php if ($unseen_complaints != '0') { ?>
                            <span class="dot"><?= $unseen_complaints; ?></span>
                        <?php } ?>
                    </h5>
                </button>
            </div>

        </div>

    </form>

</div>

</div>

<?php $this->load->view('common/footer'); ?>
<script>
    function seen(data) {
        // alert('in');
        // alert(data);
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