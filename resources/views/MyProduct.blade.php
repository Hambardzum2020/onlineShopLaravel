<!doctype html>
<html lang="zxx">

<head>
    @include('includes.head')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
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
                        <h2>My Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

<!-- product list start-->
<section class="single_product_list">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-12" id="ham1">
                    @if(isset($myproduct))
                    @foreach ($myproduct as $k)
                        @if($k["user_id"] == $data["id"])
                            <div class="single_product_iner" id="ham">
                                <h4>By {{$k->Seller->name}} {{$k->Seller->surname}}</h4>
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_product_img">
                                            @if(isset($k->Photos[0]->url))
                                            <img src="{{asset('img/'.$k->Photos[0]->url)}}"  alt="#" class="img-fluid withAndHeight">
                                            <img src="img/product_overlay.png" class="product_overlay img-fluid" alt="#">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-6">
                                        <div class="single_product_content">
                                            <h5>Started from {{$k['price']}}$</h5>
                                            <h2> <a href="single-product.html">{{$k['name']}}<br>
                                            {{$k['description']}}<br>{{$k['count']}} hat.</a> </h2>
                                            <a href="product_list.html" class="btn_3">Explore Now</a>
                                            <button class="del_prod btn_3" value="{{$k->id}}">Delete</button>
                                            <a href="{{url('product/item/'.$k->id)}}">
                                            <button class="btn_3" value="{{$k->id}}">Detalis</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @else
                    <h1>EMPTY</h1>
                    @endif
                </div>
            </div>
        </div>
        <input type="hidden" value="{{csrf_token()}}" id="token">
    </section>
    <!-- product list end-->


    <!--::footer_part start::-->
        @include('includes.footer')
    <!--::footer_part end::-->

    <!-- Script Start -->
     @include('includes.JsScript')
    <!-- Script End -->

</body>

</html>
