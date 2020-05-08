<!doctype html>
<html lang="zxx">
<head>
    @include('includes.head')
</head>

<body>
    <!--::Header part start::-->
        @include('includes.signUpOrSignIn')
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Sign Up</h2>
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
                    <div class="login_part_text text-center" id="signup_height">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                                <a href="{{url('login')}}" class="btn_3">Log In</a>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                                <!-- <form action="{{url('/register')}}" method="post">
		{{csrf_field()}}
		<input type="text" value="{{old('name')}}" name="name" placeholder="name">
		<p>{{$errors->first("name")}}</p>
		<br> -->
                            <form class="row contact_form" action="{{url('/register')}}" method="post" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                                        placeholder="Name">
                                        <p style="color: red;">{{$errors->first("name")}}</p>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="surname" name="surname" value="{{old('surname')}}"
                                        placeholder="Surname">
                                        <p style="color: red;">{{$errors->first("surname")}}</p>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="age" name="age" value="{{old('age')}}"
                                        placeholder="age">
                                        <p style="color: red;">{{$errors->first("age")}}</p>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"
                                        placeholder="email">
                                        <p style="color: red;">{{$errors->first("email")}}</p>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="password" name="password" value="{{old('password')}}"
                                        placeholder="Password">
                                        <p style="color: red;">{{$errors->first("password")}}</p>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="comfirm_password" name="comfirm_password" value="{{old('comfirm_password')}}"
                                        placeholder="Comfirm_password">
                                        <p style="color: red;">{{$errors->first("comfirm_password")}}</p>
                                </div>
                                <div class="col-md-12 form-group">

                                    <button type="submit" value="submit" class="btn_3">
                                        Sign Up
                                    </button>
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


