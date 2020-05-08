$(document).ready(function(){
    var token = $("#token").val();
    $(document).on('click', '.btn_forgot_password', function(){
        var userEmail = $("#email_forgot").val();
        $.ajax({
            type: 'post',
            url: '/forgotPassword',
            data: {userEmail: userEmail, "_token": token},
            success: function(r){
                if(r == 'required'){
                    $(".error_notif").html('*The email field is required.');
                }
                if(r == 'error_email'){
                    $(".error_notif").html('*The email must be a valid email address.');
                }
                if(r == 'exists'){
                    $(".error_notif").html('*Email does not exists!');
                }
                else if(r != 'exists' && r != 'required' && r != 'error_email'){
                    var inp = $("#email_forgot").val();
                    $(".error_notif").html('');
                    $(".email_code2").remove();
                    $(".email_code1").append(`
                        <div class="row contact_form">
                        <h3 class='error_empty'>Welcome Back ! <br>
                        Please write your email</h3>

                        <h3 class='email_disNone' style='display: none;'>${inp}</h3>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="code_forgot" placeholder="Code">
                                    <p class='error_code_forgot' style="color: red;"></p>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="nPwd_forgot" placeholder="New password">
                                    <p class='error_nPwd_forgot' style="color: red;"></p>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="cPwd_forgot" placeholder="Comfirm password">
                                    <p class='error_cPwd_forgot' style="color: red;"></p>
                            </div>
                            <div class="col-md-12 form-group">
                                <button class="btn_3 forgot_password_code">
                                    submit
                                </button>
                            </div>
                        </div>
                    `)

                }
            },
            error: function(){
                alert('Error');
            }
        })
    })

    $(document).on('click', '.forgot_password_code', function(){
        var code_forgot = $('#code_forgot').val();
        var nPwd_forgot = $('#nPwd_forgot').val();
        var cPwd_forgot = $("#cPwd_forgot").val();
        var userEmail = $(".email_disNone").html();
        $.ajax({
            type: 'post',
            url: '/upNewPwd',
            data: {
                code_forgot: code_forgot,
                nPwd_forgot: nPwd_forgot,
                cPwd_forgot: cPwd_forgot,
                userEmail: userEmail,
                "_token": token,
            },
            success: function(r){
                if(r == 'error_empty'){
                    $(".error_empty").html('*Lracreq bolor dashter@.');
                    $(".error_empty").css('color', 'red')
                }
                else{
                    $(".error_empty").html('Welcome Back ! <br> Please write your email');
                    $(".error_empty").css('color', 'black');
                }
                if(r == 'error_min_6'){
                    $('.error_nPwd_forgot').html('*The password must be at least 6 characters.')
                }
                else{
                    $('.error_nPwd_forgot').html('');
                }
                if(r == 'error_same_comf'){
                    $(".error_cPwd_forgot").html('*The comfirm password and password must match.')
                }
                else{
                    $(".error_cPwd_forgot").html('');
                }
                if(r == 'error_same_code'){
                    $('.error_code_forgot').html('*The code and mail code must match.')
                }
                else{
                    $('.error_code_forgot').html('');
                }
                if(r == 'ok'){
                    location.href = "/login";
                }
            },
            error: function(){
                alert("Error");
            }
        })
    });

});
