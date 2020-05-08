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
                        <h2>Edit Product</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

<!--================AddProduct_part Area =================-->
<section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome  add product area!</h3>
                            <form class="row contact_form" action="{{url('/edit_prod')}}" method="post" novalidate="novalidate">
                            {{csrf_field()}}
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="name" name='name' value = "{{$prod['name']}}"
                                    placeholder="Name" >
                                        <p style="color: red;">{{$errors->first("name")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="count" name="count" value="{{$prod['count']}}"
                                    placeholder="Count">
                                        <p  style="color: red;">{{$errors->first("count")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="price" name="price" value="{{$prod['price']}}"
                                        placeholder="Price">
                                        <p  style="color: red;">{{$errors->first("price")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="description" name="description" value="{{$prod['description']}}"
                                        placeholder="Description">
                                        <p  style="color: red;">{{$errors->first("description")}}</p>
                                </div>
                                <!-- <div class="col-md-6 form-group p_star">
                                    <input type="file" name='photo[]' multiple>
                                    <p  style="color: red;"></p>
                                </div> -->
                                <div class="col-md-6 form-group">
                                    <button  class="btn_3 edit_prod">
                                        Save Changes
                                    </button>
                                </div>
                                <div class="col-md-6 form-group">
                                    <a class="btn_3" style="text-align: center;" href="{{url('Edit/Products/Photos/'.$prod->id)}}">
                                        <!-- <button  class="btn_3"> -->
                                            Edit Product's Photos
                                        <!-- </button> -->
                                    </a>
                                </div>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" value="{{csrf_token()}}" id="token">
    <!--================AddProduct_part end =================-->







    <!--::footer_part start::-->
        @include('includes.footer')
    <!--::footer_part end::-->

    <!-- Script Start -->
     @include('includes.JsScript')
    <!-- Script End -->
</body>

</html>
