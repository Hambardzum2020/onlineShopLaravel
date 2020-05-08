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
                        <h2>Add Product</h2>
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
                            <form class="row contact_form" enctype="multipart/form-data" action="{{url('/addProduct_server')}}" method="post" novalidate="novalidate">
                            {{csrf_field()}}
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" name='name' value = "{{old('name')}}"
                                    placeholder="Name" >
                                        <p style="color: red;">{{$errors->first("name")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" name="count" value="{{old('count')}}"
                                    placeholder="Count">
                                        <p  style="color: red;">{{$errors->first("count")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" name="price" value="{{old('price')}}"
                                        placeholder="Price">
                                        <p  style="color: red;">{{$errors->first("price")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" name="description" value="{{old('description')}}"
                                        placeholder="Description">
                                        <p  style="color: red;">{{$errors->first("description")}}</p>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="file" name='photo[]' multiple>
                                    <p  style="color: red;"></p>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Add Product
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
    <!--================AddProduct_part end =================-->







    <!--::footer_part start::-->
        @include('includes.footer')
    <!--::footer_part end::-->

    <!-- Script Start -->
     @include('includes.JsScript')
    <!-- Script End -->
</body>

</html>
