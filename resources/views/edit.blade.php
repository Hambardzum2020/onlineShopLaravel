<!doctype html>
<html lang="zxx">

<head>
@include('includes.head')
</head>
<body>
	<!-- <h1>{{$data['name']." ".$data['surname']}}</h1>
    <p>{{$data['age']}}</p>
	<a href="{{url('logout_server')}}"><button>Log Out</button></a>
    <a href="{{url('edit')}}"><button>Edit</button></a> -->

    <!--::header part start::-->
        @include('includes.homeHeader')
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Edit personal information</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- <form action='{{url("/edit_server")}}' method="post" >
    {{csrf_field()}}
        <input type="text" name='name' placeholder="Name" value = {{$data['name']}}>
        <p>{{$errors->first("name")}}</p>
        <br>
        <input type="text" name='surname' placeholder="Surname" value = {{$data['surname']}}>
        <p>{{$errors->first("surname")}}</p>
        <br>
        <input type="text" name='age' placeholder="Age" value = {{$data['age']}}>
        <p>{{$errors->first("age")}}</p>
        <br>
        <input type="text" name='email' placeholder="Email" value = {{$data['email']}}>
        <p>{{$errors->first("email")}}</p>
        <br>
        <button>Save</button>
    </form> -->


    <!--================Edit_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome  edit area!</h3>
                            <form class="row contact_form" action="{{url('/edit_server')}}" method="post" novalidate="novalidate">
                            {{csrf_field()}}
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" name='name' value = "{{$data['name']}}"
                                    placeholder="Name" >
                                        <p style="color: red;">{{$errors->first("name")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" name="surname" value="{{$data['surname']}}"
                                    placeholder="Surname">
                                        <p  style="color: red;">{{$errors->first("surname")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" name="age" value="{{$data['age']}}"
                                        placeholder="Age">
                                        <p  style="color: red;">{{$errors->first("passwordLogin")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" name="email" value="{{$data['email']}}"
                                        placeholder="Email">
                                        <p  style="color: red;">{{$errors->first("email")}}</p>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Save changes
                                    </button>
                                </div>
                            </form>
                            <div class="col-md-12 form-group">
                                <a href="{{url('/settings')}}">
                                    <button  class="btn_3">
                                        Change Password
                                    </button>
                                </a>
                            </div>                            
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
