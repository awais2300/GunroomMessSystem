<?php $this->load->view('OICmess/common/header'); ?>
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
                            <h1 class="h4 text-white">Update Password</h1>
                        </div>
                        <div class="card-body bg-custom3" id="pre_req">
                            <form class="user" role="form" method="post" id="add_form1" action="<?= base_url(); ?>OICmess/add_user">
                                <h4 style="text-decoration:underline; margin-left:5px;padding:5px">Enter Username</h4>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-1">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="username*">
                                    </div>


                                </div>
                                <label id="username_error" style="color:red;display:none">Username doesn't exist</label>
                                <div class="form-group row" style="display:none" id="ques_div">
                                    <div class="col-sm-12 mb-1">
                                        <input type="text" class="form-control form-control-user" id="secret_question" name="secret_question">
                                    </div>
                                </div>
                                <div class="form-group row" style="display:none" id="ans_div">
                                    <div class="col-sm-12 mb-1">
                                        <input type="text" class="form-control form-control-user" id="secret_question_ans" name="secret_question_ans" placeholder="Secret Question Answer">
                                    </div>
                                </div>
                                <label id="wrong_error" style="color:red;display:none">User Authentication failed !</label>
                        </div>
                        </form>
                    </div>

                    <div class="card-body bg-custom3" style="display:none" id="update_form">
                        <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>OICmess/change_password">
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-1">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password*">
                                </div>

                                <div class="col-sm-6 mb-1">
                                    <input type="password" class="form-control form-control-user" id="confirm_pass" name="confirm_pass" placeholder="Confirm password*">
                                </div>
                                <input type="hidden" name="username_need" id="username_need">
                            </div>

                            <br>
                            <label id="error" style="color:red;display:none">Password doesn't match !</label>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="update_btn">
                                        <!-- <i class="fab fa-google fa-fw"></i>  -->
                                        Update
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
<script>
    var username;
    $(document).on('change', '#secret_question', function() {
        document.getElementById("ans_div").style.display = "block";
    });
    $("#username").blur(function() {
        var username = $('#username').val();

        // alert(username);
        $.ajax({
            url: '<?= base_url(); ?>OICmess/get_secret_question',
            method: 'POST',
            data: {
                'username': username
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);

                if (result != null) {

                    document.getElementById("ques_div").style.display = "block";
                    $("#secret_question").val(result['secret_question']);
                    document.getElementById("ans_div").style.display = "block";
                    document.getElementById("username_error").style.display = "none";
                    $('#username_need').val(username);
                } else {
                    document.getElementById("username_error").style.display = "block";
                }
            },
            async: true
        });
    });
    $("#secret_question_ans").blur(function() {
        var ans = $('#secret_question_ans').val();
        var username = $('#username').val();
        var ques = $('#secret_question').val();
        // alert(ans);
        $.ajax({
            url: '<?= base_url(); ?>OICmess/get_update_password_form',
            method: 'POST',
            data: {
                'username': username,
                'ques': ques,
                'ans': ans

            },
            success: function(data) {
                var result = jQuery.parseJSON(data);

                if (result != null) {

                    document.getElementById("update_form").style.display = "block";

                    document.getElementById("pre_req").style.display = "none";
                    document.getElementById("wrong_error").style.display = "none";

                } else {
                    document.getElementById("wrong_error").style.display = "block";
                }
            },
            async: true
        });
    });


    $('#add_btni').on('click', function() {
        //alert('javascript working');
        $('#add_btn').attr('disabled', true);
        var validate = 0;

        var username = $('#username').val();
        var password = $('#password').val();
        var sec_q = $('#secret_question').val();
        var sec_q_ans = $('#secret_question_ans').val();
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

    $('#update_btn').on('click', function() {
        //alert('javascript working');
        $('#update_btn').attr('disabled', true);
        var validate = 0;

        var password = $('#password').val();
        var confirm_password = $('#confirm_pass').val();

        if (password == '') {
            validate = 1;
            $('#password').addClass('red-border');
        }

        if (confirm_password == '') {
            validate = 1;
            $('#confirm_pass').addClass('red-border');
        }
        if (password != '' && confirm_password != '') {
            if (confirm_password == password) {
                validate = 0;
            } else {
                validate = 1;
                document.getElementById("error").style.display = "block";
            }
        }
        if (validate == 0) {
            $('#add_form')[0].submit();
        } else {
            $('#update_btn').removeAttr('disabled');
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