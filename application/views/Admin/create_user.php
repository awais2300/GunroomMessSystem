<?php $this->load->view('Admin/common/header'); ?>
<style>
    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container">

    <div class="card o-hidden my-4 sborder-0 shadow-lg">
        <div class="card-body bg-custom3">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header bg-custom1">
                            <h1 class="h4 text-white">Create New User</h1>
                        </div>

                        <div class="card-body bg-custom3">
                            <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>Admin/add_user">
                               

                                <h4 style="text-decoration:underline; margin-left:5px;padding:5px">Personal Information (optional)</h4>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-1">
                                        <input type="email" class="form-control form-control-user" id="name" name="name" placeholder="Enter Full Name">
                                    </div>

                                    <div class="col-sm-6 mb-1">
                                        <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Address*">
                                    </div>
                                </div>
                                

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-1">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email*">
                                    </div>

                                    <div class="col-sm-6 mb-1">
                                        <input type="tel" class="form-control form-control-user" id="phone" name="phone" pattern="[0-9]{11}" placeholder="Phone No*">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-1">
                                        <select class="form-control rounded-pill" name="secret_question" id="secret_question" data-placeholder="Select Secret Question" style="font-size: 0.8rem; height:50px;">\
                                        <option class="form-control form-control-user" value="">Select your secret question</option>
                                        <?php foreach($secret_questions as $data) { ?>
                                        <option class="form-control form-control-user" value="<?= $data['question'] ?>"><?= $data['question'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="ans_div" style="display:none">
                                    <div class="col-sm-12 mb-1">
                                    <input type="text" class="form-control form-control-user" id="secret_question_ans" name="secret_question_ans"  placeholder="Secret Question Answer*">
                                    </div>
                                </div>

                                <hr>

                                <h4 style="text-decoration:underline; margin-left:5px;padding:5px">Login Information</h4>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-1">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="username*">
                                    </div>

                                    <div class="col-sm-6 mb-1">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password*">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-1">
                                        <select class="form-control rounded-pill" name="acct_type" id="acct_type" data-placeholder="Select Account Type" style="font-size: 0.8rem; height:50px;">\
                                            <option class="form-control form-control-user" value="">Select Account Type</option>
                                            <option class="form-control form-control-user" value="UTO">UTO</option>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-primary btn-user btn-block" id="add_btni">
                                            <!-- <i class="fab fa-google fa-fw"></i>  -->
                                            Submit Data
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

</div>
<?php $this->load->view('common/footer'); ?>
<script>
    $(document).on('change', '#secret_question', function() {
        document.getElementById("ans_div").style.display = "block";
    });
    $('#status').on('focusout', function() {
        var status = $('#status').val();

        if (status == "typecdr") {
            $("#Ship_ID").prop("disabled", true);
        } else {
            $("#Ship_ID").prop("disabled", false);
        }
    });

    $('#add_btni').on('click', function() {
        //alert('javascript working');
        $('#add_btn').attr('disabled', true);
        var validate = 0;

        var username = $('#username').val();
        var password = $('#password').val();
       var sec_q=$('#secret_question').val();
       var sec_q_ans=$('#secret_question_ans').val();
        // var email = $('#email').val();
        // var phone = $('#phone').val();
        // var address = $('#address').val();



        if (username == '') {
            validate = 1;
            $('#username').addClass('red-border');
        }
        if (password == '') {
            validate = 1;
            $('#password').addClass('red-border');
        }
        if (sec_q == '') {
            validate = 1;
            $('#secret_question').addClass('red-border');
        }
        if (sec_q_ans == '') {
            validate = 1;
            $('#secret_question_ans').addClass('red-border');
        }

        // if (email == '') {
        //     validate = 1;
        //     $('#email').addClass('red-border');
        // }
        // if (phone == '') {
        //     validate = 1;
        //     $('#phone').addClass('red-border');
        // }
        // if (address == '') {
        //     validate = 1;
        //     $('#address').addClass('red-border');
        // }
        if (validate == 0) {
            $('#add_form')[0].submit();
        } else {
            $('#add_btni').removeAttr('disabled');
        }
    });


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