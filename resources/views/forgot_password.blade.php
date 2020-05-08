<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->

<!doctype html>
    <html lang="zxx">

<head>
        @include('includes.head')
</head>

<body>
    <!--::header part start::-->
        @include('includes.signUpOrSignIn')
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>forgot password</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
                <div class="col-lg-6 col-md-12">
                    <div class="login_part_form email_code1">
                        <div class="login_part_form_iner email_code2">
                            <h3>Welcome Back ! <br>
                                Please write your email</h3>
                            <div class="row contact_form">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email_forgot" placeholder="Email">
                                        <p class='error_notif' style="color: red;"></p>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button class="btn_3 btn_forgot_password">
                                        submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" value="{{csrf_token()}}" id="token">
    <!--================login_part end =================-->


    <!--::footer_part start::-->
        @include('includes.footer')
    <!--::footer_part end::-->

    <!-- Script Start -->
        @include('includes.JsScript')
    <!-- Script End -->
    <script src = "{{asset('js/forgotPassword.js')}}"></script>
</body>

</html>


