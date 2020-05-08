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
                        <h2>login</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                                <a href="{{url('signup')}}" class="btn_3">Create an Account</a>
                            </div>
                        </div>
                    </div>
                    <!-- <form action="{{url('/signin')}}" method="post">
                    {{csrf_field()}}
                        <input type="text" value="{{old('emailLogin')}}" name="emailLogin" placeholder="Email">
                        <p>{{$errors->first("emailLogin")}}</p>
                        <br>
                        <input type="text" value="{{old('passwordLogin')}}" name="passwordLogin" placeholder="Password">
                        <p>{{$errors->first("passwordLogin")}}</p>
                        <br>
                        <button>Log In</button>
                    </form> -->
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" action="{{url('/signin')}}" method="post" novalidate="novalidate">
                            {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="emailLogin" value="{{old('emailLogin')}}"
                                        placeholder="Email">
                                        <p style="color: red;">{{$errors->first("emailLogin")}}</p>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="passwordLogin" value="{{old('passwordLogin')}}"
                                        placeholder="Password">
                                        <p  style="color: red;">{{$errors->first("passwordLogin")}}</p>
                                </div>
                                <div class="col-md-12 form-group">
<!--                                     <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div> -->
                                    <button type="submit" value="submit" class="btn_3">
                                        log in
                                    </button>
                                    <a class="lost_pass" href="{{url('/password/recover')}}">forget password?</a>
                                </div>
                            </form>
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
</body>

</html>


