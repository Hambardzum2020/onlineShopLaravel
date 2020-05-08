<!doctype html>
<html lang="zxx">

<head>
    @include('includes.head')
</head>

<body>    
    <!--::header part start::-->
    @include('includes.homeHeader')
    <!-- Header part end-->


    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Change Password</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->



    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome  edit area!</h3>
                            <form class="row contact_form" action="{{url('/updatePwd')}}"
                             method="post" id="updatePasswordForm" name="uptadePasswordForm" novalidate="novalidate">
                            {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" value="{{$userData->name}}" readonly>
                                </div>                            
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" value="{{$userData->email}}" readonly>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name='current_pwd' 
                                    id="current_pwd" placeholder="Enter Current Password">
                                        <p style="color: red;">{{$errors->first("current_pwd")}}</p>
                                        <p id='chkCurrentPwd'></p>
                                </div>                                
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="new_pwd" id="new_pwd"
                                    placeholder="Enter New Password">
                                        <p style="color: red;">{{$errors->first("new_pwd")}}</p>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" name="comfirm_pwd" id="comfirm_pwd"
                                        placeholder="Comfirm Password">
                                        <p  style="color: red;">{{$errors->first("comfirm_pwd")}}</p>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Save changes
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
    <!--================Edit_part end =================-->







    <!--::footer_part start::-->
        @include('includes.footer')
    <!--::footer_part end::-->

    <!-- Script Start -->
     @include('includes.JsScript')
    <!-- Script End -->
</body>
</html>